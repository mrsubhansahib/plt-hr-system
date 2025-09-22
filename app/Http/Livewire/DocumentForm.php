<?php

namespace App\Http\Livewire;

use App\User;
use App\Job;
use App\Template;
use App\Document;
use App\Sickness;
use App\Disclosure;
use Livewire\Component;
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

    public $showMissingFieldsAlert = false;

    public function mount()
    {
        $this->templates = Template::orderBy('created_at', 'desc')->get();
        $this->employees = User::where('role', 'employee')->where('status', 'active')->latest()->get();
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

        // Reset all dynamic fields when template changes
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

        $this->showMissingFieldsAlert = false;
    }

    public function updatedSelectedEmployee()
    {
        $this->loadEmployeeData();
        $this->showMissingFieldsAlert = false;
    }

    private function loadEmployeeData()
    {
        $user = User::find($this->selectedEmployee);
        if (!$user || empty($this->templateFlags)) {
            return;
        }

        if ($this->templateFlags['job']) $this->userJobs = $user->jobs;
        if ($this->templateFlags['sickness']) $this->sicknesses = $user->sicknesses;
        if ($this->templateFlags['disclosure']) $this->disclosures = $user->disclosures;
        if ($this->templateFlags['capability']) $this->capabilities = $user->capabilities;
        if ($this->templateFlags['disciplinary']) $this->disciplinaries = $user->disciplinaries;
        if ($this->templateFlags['lateness']) $this->latenesses = $user->latenesses;
        if ($this->templateFlags['training']) $this->trainings = $user->trainings;
    }

    public function save()
    {
        // Build dynamic validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'selectedTemplate' => 'required|exists:templates,id',
            'selectedEmployee' => 'required|exists:users,id',
        ];

        if (!empty($this->templateFlags['job'])) $rules['selectedJob'] = 'required|exists:jobs,id';
        if (!empty($this->templateFlags['sickness'])) $rules['selectedSickness'] = 'required|exists:sicknesses,id';
        if (!empty($this->templateFlags['disclosure'])) $rules['selectedDisclosure'] = 'required|exists:disclosures,id';
        if (!empty($this->templateFlags['capability'])) $rules['selectedCapability'] = 'required|exists:capabilities,id';
        if (!empty($this->templateFlags['disciplinary'])) $rules['selectedDisciplinary'] = 'required|exists:disciplinaries,id';
        if (!empty($this->templateFlags['lateness'])) $rules['selectedLateness'] = 'required|exists:latenesses,id';
        if (!empty($this->templateFlags['training'])) $rules['selectedTraining'] = 'required|exists:trainings,id';

        try {
            $this->validate($rules);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->showMissingFieldsAlert = true;
            throw $e;
        }

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

        // $content = Blade::render($template->content, $variables);
        $content = Blade::render(html_entity_decode($template->content), $variables);

        Document::create([
            'template_title' => $template->title,
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
