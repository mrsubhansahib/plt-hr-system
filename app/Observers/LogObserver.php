<?php

namespace App\Observers;

use App\Log;
use Illuminate\Database\Eloquent\Model;
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
        if ($model->isDirty('status')) {
            $newStatus = $model->getAttribute('status');
            if ($newStatus === 'active' && session('is_acceptance')) {
                $this->logAction($model, 'accepted');
            } else {
                $statusActions = [
                    'active'    => 'active',
                    'rejected'  => 'rejected',
                    'left'      => 'left',
                    'accepted'  => 'accepted',
                    'deleted'   => 'deleted'
                ];
                $action = $statusActions[$newStatus] ?? 'unknown_action';
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
        $this->logAction($model, 'delete');
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
        $userId = $model->user_id ?? $model->id;
        Log::create([
            'admin_id' => Auth::id(),  // Assuming you use Laravel's default Auth
            'module_id' => $model->id,  // The ID of the affected model
            'module_type' => class_basename($model),  // The name of the model (e.g., Job, Capability)
            'action' => $action,  // The action type (create, update, delete)
            'user_id' => $userId,
        ]);
    }
}
