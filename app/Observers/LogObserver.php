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
        $this->logAction($model, 'update');
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
        Log::create([
            'admin_id' => Auth::id(),  // Assuming you use Laravel's default Auth
            'module_id' => $model->id,  // The ID of the affected model
            'module_type' => class_basename($model),  // The name of the model (e.g., Job, Capability)
            'action' => $action,  // The action type (create, update, delete)
        ]);
    }
}
