<?php

namespace App\Observers;

use App\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class LogObserver
{
    /**
     * Handle the created event for any model.
     *
     * @param Model $model
     * @return void
     */
    public function created(Model $model)
    {
        $this->logAction($model, 'create');
    }

    /**
     * Handle the updated event for any model.
     *
     * @param Model $model
     * @return void
     */
    public function updated(Model $model)
    {
        $dirtyAttributes = $model->getDirty();
        unset($dirtyAttributes['updated_at']);
        if (array_keys($dirtyAttributes) === ['notes']) {
            $this->logAction($model, 'Notes Updated');
            return;
        }
        if (isset($dirtyAttributes['status'])) {
            $newStatus = $model->getAttribute('status');
            if ($newStatus === 'active' && session('is_acceptance')) {
                $this->logAction($model, 'accepted');
            } else {
                $statusActions = [
                    'active'    => 'active',
                    'rejected'  => 'rejected',
                    'left'      => 'left',
                    'accepted'  => 'accepted',
                    'deleted'   => 'deleted',
                    'terminated' => 'terminated',
                ];
                $action = $statusActions[$newStatus] ?? $newStatus;
                $this->logAction($model, $action);
            }
        } else {
            $this->logAction($model, 'updated');
        }
    }
    /**
     * Handle the deleted event for any model.
     *
     * @param Model $model
     * @return void
     */
    public function deleted(Model $model)
    {
        $this->logAction($model, 'deleted');
    }

    /**
     * Log the action to the Log model.
     *
     * @param Model $model
     * @param string $action
     * @return void
     */
    private function logAction(Model $model, string $action)
    {
        if (App::runningInConsole()) {
            return; 
        }
        $adminId = Auth::id() ?? 1;
        $userId = $model->user_id ?? $model->id;
        Log::create([
            'admin_id' => $adminId,
            'module_id' => $model->id,
            'module_type' => class_basename($model),
            'action' => $action,
            'user_id' => $userId,
        ]);
    }
}
