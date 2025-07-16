<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Sickness;
use App\Capability;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class SicknessIndicator extends Component
{
    public $start_date = '';
    public $end_date = '';
    public $successMsg = '';
    public $errorMsg = '';
    public Collection $sickUsers;

    public function mount()
    {
        $this->sickUsers = collect();
    }

    public function filterSickness()
    {
        $this->successMsg = '';
        $this->errorMsg = '';
        $this->sickUsers = collect();

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

        $this->sickUsers = Capability::where('on_capability_procedure', 'yes')
            ->whereNotNull('capability_procedure_date')
            ->get()
            ->filter(function ($capability) use ($start, $end) {
                $capDate = Carbon::parse($capability->capability_procedure_date);
                return Sickness::where('user_id', $capability->user_id)
                    ->whereBetween('date_from', [$start, $end])
                    ->whereDate('date_from', '>=', $capDate)
                    ->exists();
            })
            ->map(fn($capability) => $capability->user->load('jobs'))
            ->unique('id')
            ->values();

        if ($this->sickUsers->isEmpty()) {
            $this->errorMsg = 'No sickness records found in the selected date range after capability procedure.';
        } else {
            $this->successMsg = 'Records found: ' . $this->sickUsers->count();
        }

        $this->resetFilters();
    }

    public function resetFilters(): void
    {
        $this->start_date = '';
        $this->end_date = '';
    }

    public function updated($propertyName): void
    {
        if (in_array($propertyName, ['start_date', 'end_date'])) {
            $this->successMsg = '';
            $this->errorMsg = '';
        }
    }

    public function render()
    {
        return view('livewire.sickness-indicator');
    }
}
