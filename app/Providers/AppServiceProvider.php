<?php

namespace App\Providers;

use App\Job;
use App\Capability;
use App\Disciplinary;
use App\Disclosure;
use App\Dropdown;
use App\Lateness;
use App\Sickness;
use App\Training;
use App\User;
use App\Observers\LogObserver;
use App\Observers\NotesObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Register LogObserver
        Job::observe(LogObserver::class);
        Capability::observe(LogObserver::class);
        Disciplinary::observe(LogObserver::class);
        Disclosure::observe(LogObserver::class);
        Lateness::observe(LogObserver::class);
        Sickness::observe(LogObserver::class);
        Training::observe(LogObserver::class);
        User::observe(LogObserver::class);
        Dropdown::observe(LogObserver::class);

        // Register NotesObserver for the same models
        Job::observe(NotesObserver::class);
        Capability::observe(NotesObserver::class);
        Disciplinary::observe(NotesObserver::class);
        Disclosure::observe(NotesObserver::class);
        Lateness::observe(NotesObserver::class);
        Sickness::observe(NotesObserver::class);
        Training::observe(NotesObserver::class);
        User::observe(NotesObserver::class);
        Dropdown::observe(NotesObserver::class);
    }
}