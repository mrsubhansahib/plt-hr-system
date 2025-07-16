    <form wire:submit.prevent="save">
        <div class="row">

            <div class="col-12 mt-3">
                <label class="form-label">New Title<span class="text-danger">*</span></label>
                <input class="form-control" required type="text" wire:model="title" />
            </div>

            <div class="col-6 mt-3">
                <label class="form-label">Template<span class="text-danger">*</span></label>
                <select class="form-control form-select" required wire:model="selectedTemplate" id="template">
                    <option value="" selected>Select Template</option>
                    @foreach ($templates as $template)
                        <option value="{{ $template->id }}">
                            {{ $template->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 mt-3">
                <label class="form-label">Employee<span class="text-danger">*</span></label>
                <select class="form-control form-select" required wire:model="selectedEmployee" id="employeeSelect">
                    <option value="" selected>Select Employee</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">
                            {{ $employee->first_name . ' ' . $employee->surname }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if ( !empty($templateFlags['job']) && !empty($userJobs))
                <div class="col-6 mt-3">
                    <label class="form-label">Job<span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="selectedJob">
                        <option value="">Select Job</option>
                        @foreach ($userJobs as $job)
                            <option value="{{ $job->id }}">{{ $job->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            {{-- Other Modules Dynamic data --}}
            @if (!empty($templateFlags['sickness']) && !empty($sicknesses))
                <div class="col-6 mt-3">
                    <label class="form-label">Sickness<span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="selectedSickness">
                        <option value="">Select Sickness</option>
                        @foreach ($sicknesses as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->reason ?? 'N/A' }} - {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($templateFlags['disclosure']) && !empty($disclosures))
                <div class="col-6 mt-3">
                    <label class="form-label">Disclosure<span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="selectedDisclosure">
                        <option value="">Select Disclosure</option>
                        @foreach ($disclosures as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->type ?? 'N/A' }} - {{ Str::limit($item->notes, 30) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($templateFlags['capability']) && !empty($capabilities))
                <div class="col-6 mt-3">
                    <label class="form-label">Capability<span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="selectedCapability">
                        <option value="">Select Capability</option>
                        @foreach ($capabilities as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($templateFlags['disciplinary']) && !empty($disciplinaries))
                <div class="col-6 mt-3">
                    <label class="form-label">Disciplinary<span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="selectedDisciplinary">
                        <option value="">Select Disciplinary</option>
                        @foreach ($disciplinaries as $item)
                            <option value="{{ $item->id }}">{{ $item->reason ?? 'N/A' }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($templateFlags['lateness']) && !empty($latenesses))
                <div class="col-6 mt-3">
                    <label class="form-label">Lateness<span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="selectedLateness">
                        <option value="">Select Lateness</option>
                        @foreach ($latenesses as $item)
                            <option value="{{ $item->id }}">
                                {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }} - {{ $item->reason ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (!empty($templateFlags['training']) && !empty($trainings))
                <div class="col-6 mt-3">
                    <label class="form-label">Training<span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="selectedTraining">
                        <option value="">Select Training</option>
                        @foreach ($trainings as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endif


        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
