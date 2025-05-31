<?php

namespace App\Http\Livewire;

use App\Disclosure;
use Livewire\Component;
use App\User;
use App\Job;
use App\Template;
use App\Document;
use App\Sickness;
use Illuminate\Support\Facades\Blade;

class DocumentForm extends Component
{
    public $templates;
    public $employees;
    public $userJobs = [];
    public $sicknesses = [];
    public $disclosures = [];
    public $capabilities = [];
    public $disciplinaries = [];
    public $latenesses = [];
    public $trainings = [];
    public $templateFlags = [];

    public $title;
    public $selectedTemplate;
    public $selectedEmployee;
    public $selectedJob;
    public $selectedSickness;
    public $selectedDisclosure;
    public $selectedCapability;
    public $selectedDisciplinary;
    public $selectedLateness;
    public $selectedTraining;

    public function mount()
    {
        $this->templates = Template::all();
        $this->employees = User::all();
    }
    public function updatedSelectedTemplate($templateId)
    {
        $template = Template::find($templateId);
        if ($template) {
            $this->templateFlags = [
                'job' => $template->job_info,
                'sickness' => $template->sickness_info,
                'disclosure' => $template->disclosure_info,
                'capability' => $template->capability_info,
                'disciplinary' => $template->disciplinary_info,
                'lateness' => $template->lateness_info,
                'training' => $template->training_info,
            ];
        }

        // Clear dynamic data when template changes

        // Reset selected employee and dependent data
        $this->selectedEmployee = null;
        $this->selectedJob = null;
        $this->selectedSickness = null;
        $this->selectedDisclosure = null;
        $this->selectedCapability = null;
        $this->selectedDisciplinary = null;
        $this->selectedLateness = null;
        $this->selectedTraining = null;

        $this->userJobs = [];
        $this->sicknesses = [];
        $this->disclosures = [];
        $this->capabilities = [];
        $this->disciplinaries = [];
        $this->latenesses = [];
        $this->trainings = [];
    }

    public function updatedSelectedEmployee($employeeId)
    {

        $user = User::find($employeeId);
        if (!$user || empty($this->templateFlags)) {
            return;
        }

        if ($this->templateFlags['job']) {
            $this->userJobs = $user->jobs;
        }

        if ($this->templateFlags['sickness']) {
            $this->sicknesses = $user->sicknesses;
        }

        if ($this->templateFlags['disclosure']) {
            $this->disclosures = $user->disclosures;
        }

        if ($this->templateFlags['capability']) {
            $this->capabilities = $user->capabilities;
        }

        if ($this->templateFlags['disciplinary']) {
            $this->disciplinaries = $user->disciplinaries;
        }

        if ($this->templateFlags['lateness']) {
            $this->latenesses = $user->latenesses;
        }

        if ($this->templateFlags['training']) {
            $this->trainings = $user->trainings;
        }
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'selectedTemplate' => 'required|exists:templates,id',
            'selectedEmployee' => 'required|exists:users,id',
            'selectedJob' => 'nullable|exists:jobs,id',
            'selectedSickness' => 'nullable|exists:sicknesses,id',
            'selectedDisclosure' => 'nullable|exists:disclosures,id',
            'selectedCapability' => 'nullable|exists:capabilities,id',
            'selectedDisciplinary' => 'nullable|exists:disciplinaries,id',
            'selectedLateness' => 'nullable|exists:latenesses,id',
            'selectedTraining' => 'nullable|exists:trainings,id',

        ]);

        $template = Template::find($this->selectedTemplate);
        $user = User::find($this->selectedEmployee);
        $job = $this->selectedJob ? Job::find($this->selectedJob) : null;

        $variables = [
            'user' => $user,
            'job' => $job,
            'sickness' => $this->selectedSickness ? \App\Sickness::find($this->selectedSickness) : null,
            'disclosure' => $this->selectedDisclosure ? \App\Disclosure::find($this->selectedDisclosure) : null,
            'capability' => $this->selectedCapability ? \App\Capability::find($this->selectedCapability) : null,
            'disciplinary' => $this->selectedDisciplinary ? \App\Disciplinary::find($this->selectedDisciplinary) : null,
            'lateness' => $this->selectedLateness ? \App\Lateness::find($this->selectedLateness) : null,
            'training' => $this->selectedTraining ? \App\Training::find($this->selectedTraining) : null,
        ];

        $content = Blade::render($template->content, $variables);

        Document::create([
            'template_id' => $template->id,
            'user_id' => $user->id,
            'title' => $this->title,
            'content' => $content,
        ]);

        session()->flash('success', 'Document created successfully.');
        return redirect()->route('show.documents');
    }

    public function render()
    {
        return view('livewire.document-form');
    }
}
