<?php

namespace App\Observers;

use App\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NotesObserver
{
    /**
     * Handle the created event for any model.
     */
    public function created(Model $model)
    {
        if (!empty($model->notes)) {
            $this->saveNote($model, 'created');
        }
    }

    /**
     * Handle the updated event for any model.
     */
    public function updated(Model $model)
    {
        if ($model->isDirty('notes')) {
            $this->saveNote($model, 'updated');
        }
    }

    /**
     * Save the actual 'notes' field from the model.
     */
    private function saveNote(Model $model, string $action)
    {
        $userId = $model->user_id ?? ($model->id ?? null);
        Note::create([
            'user_id' => $userId,  
            'admin_id' => Auth::id() ?? 1, 
            'module_name' => class_basename($model), 
            'module_id' => $model->id, 
            'notes' => $model->notes,  
        ]);
    }
}
