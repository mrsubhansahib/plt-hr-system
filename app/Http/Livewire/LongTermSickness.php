<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Sickness;
use App\Capability;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class LongTermSickness extends Component
{
    public $start_date = '';
    public $end_date = '';
    public $successMsg;
    public $errorMsg;
    public EloquentCollection $sickUsers;

    public function mount()
    {
        // Initialize sickUsers with an empty Eloquent collection
        $this->sickUsers = new EloquentCollection();
    }

    public function filterSickness()
    {
        $this->successMsg = $this->errorMsg = '';
        $this->sickUsers = new EloquentCollection();

        if (!$this->start_date || !$this->end_date) {
            $this->errorMsg = 'Both start date and end date are required.';
            return;
        }

        if ($this->start_date > $this->end_date) {
            $this->errorMsg = 'Start date cannot be greater than end date.';
            return;
        }

        $start = Carbon::parse($this->start_date);
        $end = Carbon::parse($this->end_date);
        // Get users on capability
        $usersOnCapability = Capability::where('on_capability_procedure', 'yes')->pluck('user_id');
        // Get sicknesses for those users, ordered by user and date
        $sicknesses = Sickness::with('user', 'user.jobs')
            ->whereIn('user_id', $usersOnCapability)
            ->where(function ($query) use ($start, $end) {
                $query->whereBetween('date_from', [$start, $end])
                    ->orWhereBetween('date_to', [$start, $end])
                    ->orWhere(function ($q) use ($start, $end) {
                        $q->where('date_from', '<=', $start)
                            ->where('date_to', '>=', $end);
                    });
            })
            ->orderBy('user_id')
            ->orderBy('date_from')
            ->get()
            ->groupBy('user_id');

        $qualifiedUsers = new EloquentCollection();
        foreach ($sicknesses as $userId => $records) {
            $consecutiveDays = 0;
            $lastEnd = null;

            foreach ($records as $record) {
                $from = Carbon::parse($record->date_from);
                $to = Carbon::parse($record->date_to);

                // Trim range to filter boundaries
                if ($to < $start || $from > $end) continue;

                $from = $from->greaterThan($start) ? $from : $start;
                $to = $to->lessThan($end) ? $to : $end;

                if ($lastEnd === null || $lastEnd->copy()->addDay()->equalTo($from)) {
                    $consecutiveDays += $from->diffInDays($to) + 1;
                    $lastEnd = $to;
                } else {
                    $consecutiveDays = $from->diffInDays($to) + 1;
                    $lastEnd = $to;
                }

                if ($consecutiveDays >= 28) {
                    $qualifiedUsers->push($record->user->load('jobs'));
                    break;
                }
            }
        }

        if ($qualifiedUsers->isEmpty()) {
            $this->errorMsg = 'No long-term sickness records found in the selected date range.';
        } else {
            // Reindex and ensure it's EloquentCollection
            $this->sickUsers = new EloquentCollection($qualifiedUsers->unique('id')->values()->all());
            $this->successMsg = 'Records found: ' . $this->sickUsers->count();
        }
        $this->resetFilters();
    }

    public function resetFilters()
    {
        $this->start_date = '';
        $this->end_date = '';
    }

    public function render()
    {
        return view('livewire.long-term-sickness');
    }
}
