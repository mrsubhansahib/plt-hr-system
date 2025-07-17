<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            PLT<span>HR System</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>


            {{-- <li class="nav-item nav-category">web apps</li> --}}

            {{-- admin added by haider --}}
            @if (auth()->user()->role !== 'manager')
                <li class="nav-item {{ active_class(['admin/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Admin" role="button"
                        aria-expanded="{{ is_active_route(['admin/*']) }}" aria-controls="Admin">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Users</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['admin/*']) }}" id="Admin">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('show.admins') }}"
                                    class="nav-link {{ active_class(['admin/list']) }}">List</a>
                            </li>
                            @if (auth()->user()->role == 'super_admin')
                                <li class="nav-item">
                                    <a href="{{ url('/admin/create') }}"
                                        class="nav-link {{ active_class(['admin/create']) }}">Create</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            @endif
            <li class="nav-item {{ active_class(['employee/temp/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#TempEmployee" role="button"
                    aria-expanded="{{ is_active_route(['temp/*']) }}" aria-controls="TempEmployee">
                    <i class="link-icon" data-feather="user-plus"></i>
                    <span class="link-title">New Entrants</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['employee/temp/*']) }}" id="TempEmployee">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('show.temp.employees') }}"
                                class="nav-link {{ active_class(['employee/temp/list']) }}">List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/employee/temp/create') }}"
                                class="nav-link {{ active_class(['employee/temp/create']) }}">Create</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['templates/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#Template" role="button"
                    aria-expanded="{{ is_active_route(['templates/*']) }}" aria-controls="Template">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">Templates</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['templates/*']) }}" id="Template">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('show.templates') }}"
                                class="nav-link {{ active_class(['template/list']) }}">List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create.template') }}"
                                class="nav-link {{ active_class(['template/create']) }}">Create</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['documents/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#Document" role="button"
                    aria-expanded="{{ is_active_route(['documents/*']) }}" aria-controls="Document">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Documents</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['documents/*']) }}" id="Document">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('show.documents') }}"
                                class="nav-link {{ active_class(['document/list']) }}">List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create.document') }}"
                                class="nav-link {{ active_class(['document/create']) }}">Create</a>
                        </li>
                    </ul>
                </div>
            </li>
            @if (auth()->user()->role !== 'manager')
                <li class="nav-item {{ active_class(['employee/list']) }}">
                    <a href="{{ route('show.employees') }}" class="nav-link">
                        <i class="link-icon" data-feather="user-check"></i>
                        <span class="link-title">Employees</span>
                    </a>
                </li>
                <li class="nav-item {{ active_class(['employee/terminated/list']) }}">
                    <a href="{{ route('show.left.employees') }}" class="nav-link">
                        <i class="link-icon" data-feather="user-x"></i>
                        <span class="link-title">Terminated</span>
                    </a>
                </li>
                {{-- Changes --}}
                <li class="nav-item {{ active_class(['activities/list']) }}">
                    <a href="{{ route('logs.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="refresh-cw"></i>
                        <span class="link-title">Activities</span>
                    </a>
                </li>
                {{-- Job added by Wasi --}}
                <li class="nav-item {{ active_class(['job/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Jobs" role="button"
                        aria-expanded="{{ is_active_route(['job/*']) }}" aria-controls="Jobs">
                        <i class="link-icon" data-feather="briefcase"></i>
                        <span class="link-title">Job</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['job/*']) }}" id="Jobs">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('show.jobs') }}"
                                    class="nav-link {{ active_class(['job/list']) }}">List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create.job') }}"
                                    class="nav-link {{ active_class(['job/create']) }}">Create</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Disclosure Section --}}
                <li class="nav-item {{ active_class(['disclosure/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Disclosures" role="button"
                        aria-expanded="{{ is_active_route(['disclosure/*']) }}" aria-controls="Disclosures">
                        <i class="link-icon" data-feather="file-text"></i>
                        <span class="link-title">Disclosure</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['disclosure/*']) }}" id="Disclosures">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('show.disclosures') }}"
                                    class="nav-link {{ active_class(['disclosure/list']) }}">List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create.disclosure') }}"
                                    class="nav-link {{ active_class(['disclosure/create']) }}">Create</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- sickness Section --}}
                <li class="nav-item {{ active_class(['sickness/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#sickness" role="button"
                        aria-expanded="{{ is_active_route(['sickness/*']) }}" aria-controls="sickness">
                        <i class="link-icon" data-feather="frown"></i>
                        <span class="link-title">Sickness</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['sickness/*']) }}" id="sickness">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('show.sicknesses') }}"
                                    class="nav-link {{ active_class(['sickness/list']) }}">List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create.sickness') }}"
                                    class="nav-link {{ active_class(['sickness/create']) }}">Create</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Capability Procedure Section --}}
                <li class="nav-item {{ active_class(['capability/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Capabilities" role="button"
                        aria-expanded="{{ is_active_route(['capability/*']) }}" aria-controls="Capabilities">
                        <i class="link-icon" data-feather="settings"></i> <!-- Updated icon -->
                        <span class="link-title">Capability</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['capability/*']) }}" id="Capabilities">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('show.capabilities') }}"
                                    class="nav-link {{ active_class(['capability/list']) }}">List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create.capability') }}"
                                    class="nav-link {{ active_class(['capability/create']) }}">Create</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- disciplinary Section --}}
                <li class="nav-item {{ active_class(['disciplinary/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#disciplinary" role="button"
                        aria-expanded="{{ is_active_route(['disciplinary/*']) }}" aria-controls="disciplinary">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Disciplinary</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['disciplinary/*']) }}" id="disciplinary">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('show.disciplinaries') }}"
                                    class="nav-link {{ active_class(['disciplinary/list']) }}">List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create.disciplinary') }}"
                                    class="nav-link {{ active_class(['disciplinary/create']) }}">Create</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- lateness section --}}
                <li class="nav-item {{ active_class(['lateness/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Lateness" role="button"
                        aria-expanded="{{ is_active_route(['lateness/*']) }}" aria-controls="Lateness">
                        <i class="link-icon" data-feather="minus-circle"></i>
                        <span class="link-title">Lateness</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['lateness/*']) }}" id="Lateness">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('show.latenesses') }}"
                                    class="nav-link {{ active_class(['lateness/list']) }}">List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create.lateness') }}"
                                    class="nav-link {{ active_class(['lateness/create']) }}">Create</a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- Training Record Section --}}
                <li class="nav-item {{ active_class(['training/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Trainings" role="button"
                        aria-expanded="{{ is_active_route(['training/*']) }}" aria-controls="Trainings">
                        <i class="link-icon" data-feather="book"></i> <!-- Updated icon -->
                        <span class="link-title">Training</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['training/*']) }}" id="Trainings">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('show.trainings') }}"
                                    class="nav-link {{ active_class(['training/list']) }}">List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('create.training') }}"
                                    class="nav-link {{ active_class(['training/create']) }}">Create</a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- Dropdowns --}}
                <li class="nav-item {{ active_class(['dropdowns/*']) }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="#Dropdowns" role="button"
                        aria-expanded="{{ is_active_route(['dropdowns/*']) }}" aria-controls="Dropdowns">
                        <i class="link-icon" data-feather="menu"></i> <!-- Updated icon -->
                        <span class="link-title">Dropdowns</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse {{ show_class(['dropdowns/*']) }}" id="Dropdowns">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('create.dropdown') }}"
                                    class="nav-link {{ active_class(['dropdowns/create']) }}">Create</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dropdown.user') }}"
                                    class="nav-link {{ active_class(['dropdowns/user']) }}">User</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dropdown.job') }}"
                                    class="nav-link {{ active_class(['dropdowns/job']) }}">Job</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dropdown.capability') }}"
                                    class="nav-link {{ active_class(['dropdowns/capability']) }}">Capability</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dropdown.lateness') }}"
                                    class="nav-link {{ active_class(['dropdowns/lateness']) }}">Lateness</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dropdown.training') }}"
                                    class="nav-link {{ active_class(['dropdowns/training']) }}">Training</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <!-- <li class="nav-item {{ active_class(['hr_list/list']) }}">
                <a href="{{ route('hr_list') }}" class="nav-link">
                    <i class="link-icon" data-feather="check-square"></i>
                    <span class="link-title">HR Checklist</span>
                </a>
            </li> -->
            {{-- <li class="nav-item nav-category">Components</li>
            <li class="nav-item {{ active_class(['ui-components/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button"
                    aria-expanded="{{ is_active_route(['ui-components/*']) }}" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">UI Kit</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['ui-components/*']) }}" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/accordion') }}"
                                class="nav-link {{ active_class(['ui-components/accordion']) }}">Accordion</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/alerts') }}"
                                class="nav-link {{ active_class(['ui-components/alerts']) }}">Alerts</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/badges') }}"
                                class="nav-link {{ active_class(['ui-components/badges']) }}">Badges</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/breadcrumbs') }}"
                                class="nav-link {{ active_class(['ui-components/breadcrumbs']) }}">Breadcrumbs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/buttons') }}"
                                class="nav-link {{ active_class(['ui-components/buttons']) }}">Buttons</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/button-group') }}"
                                class="nav-link {{ active_class(['ui-components/button-group']) }}">Button group</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/cards') }}"
                                class="nav-link {{ active_class(['ui-components/cards']) }}">Cards</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/carousel') }}"
                                class="nav-link {{ active_class(['ui-components/carousel']) }}">Carousel</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/collapse') }}"
                                class="nav-link {{ active_class(['ui-components/collapse']) }}">Collapse</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/dropdowns') }}"
                                class="nav-link {{ active_class(['ui-components/dropdowns']) }}">Dropdowns</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/list-group') }}"
                                class="nav-link {{ active_class(['ui-components/list-group']) }}">List group</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/media-object') }}"
                                class="nav-link {{ active_class(['ui-components/media-object']) }}">Media object</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/modal') }}"
                                class="nav-link {{ active_class(['ui-components/modal']) }}">Modal</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/navs') }}"
                                class="nav-link {{ active_class(['ui-components/navs']) }}">Navs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/navbar') }}"
                                class="nav-link {{ active_class(['ui-components/navbar']) }}">Navbar</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/pagination') }}"
                                class="nav-link {{ active_class(['ui-components/pagination']) }}">Pagination</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/popovers') }}"
                                class="nav-link {{ active_class(['ui-components/popovers']) }}">Popvers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/progress') }}"
                                class="nav-link {{ active_class(['ui-components/progress']) }}">Progress</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/scrollbar') }}"
                                class="nav-link {{ active_class(['ui-components/scrollbar']) }}">Scrollbar</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/scrollspy') }}"
                                class="nav-link {{ active_class(['ui-components/scrollspy']) }}">Scrollspy</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/spinners') }}"
                                class="nav-link {{ active_class(['ui-components/spinners']) }}">Spinners</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/tabs') }}"
                                class="nav-link {{ active_class(['ui-components/tabs']) }}">Tabs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ui-components/tooltips') }}"
                                class="nav-link {{ active_class(['ui-components/tooltips']) }}">Tooltips</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['advanced-ui/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#advanced-ui" role="button"
                    aria-expanded="{{ is_active_route(['advanced-ui/*']) }}" aria-controls="advanced-ui">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Advanced UI</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['advanced-ui/*']) }}" id="advanced-ui">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/advanced-ui/cropper') }}"
                                class="nav-link {{ active_class(['advanced-ui/cropper']) }}">Cropper</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/advanced-ui/owl-carousel') }}"
                                class="nav-link {{ active_class(['advanced-ui/owl-carousel']) }}">Owl Carousel</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/advanced-ui/sortablejs') }}"
                                class="nav-link {{ active_class(['advanced-ui/sortablejs']) }}">SortableJs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/advanced-ui/sweet-alert') }}"
                                class="nav-link {{ active_class(['advanced-ui/sweet-alert']) }}">Sweet Alert</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['forms/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button"
                    aria-expanded="{{ is_active_route(['forms/*']) }}" aria-controls="forms">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Forms</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['forms/*']) }}" id="forms">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/forms/basic-elements') }}"
                                class="nav-link {{ active_class(['forms/basic-elements']) }}">Basic Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/advanced-elements') }}"
                                class="nav-link {{ active_class(['forms/advanced-elements']) }}">Advanced
                                Elements</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/editors') }}"
                                class="nav-link {{ active_class(['forms/editors']) }}">Editors</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/forms/wizard') }}"
                                class="nav-link {{ active_class(['forms/wizard']) }}">Wizard</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['charts/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button"
                    aria-expanded="{{ is_active_route(['charts/*']) }}" aria-controls="charts">
                    <i class="link-icon" data-feather="pie-chart"></i>
                    <span class="link-title">Charts</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['charts/*']) }}" id="charts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/charts/apex') }}"
                                class="nav-link {{ active_class(['charts/apex']) }}">Apex</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/chartjs') }}"
                                class="nav-link {{ active_class(['charts/chartjs']) }}">ChartJs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/flot') }}"
                                class="nav-link {{ active_class(['charts/flot']) }}">Flot</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/peity') }}"
                                class="nav-link {{ active_class(['charts/peity']) }}">Peity</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/charts/sparkline') }}"
                                class="nav-link {{ active_class(['charts/sparkline']) }}">Sparkline</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['tables/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button"
                    aria-expanded="{{ is_active_route(['tables/*']) }}" aria-controls="tables">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Tables</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['tables/*']) }}" id="tables">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/tables/basic-tables') }}"
                                class="nav-link {{ active_class(['tables/basic-tables']) }}">Basic Tables</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/tables/data-table') }}"
                                class="nav-link {{ active_class(['tables/data-table']) }}">Data Table</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['icons/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button"
                    aria-expanded="{{ is_active_route(['icons/*']) }}" aria-controls="icons">
                    <i class="link-icon" data-feather="smile"></i>
                    <span class="link-title">Icons</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['icons/*']) }}" id="icons">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/icons/feather-icons') }}"
                                class="nav-link {{ active_class(['icons/feather-icons']) }}">Feather Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/icons/mdi-icons') }}"
                                class="nav-link {{ active_class(['icons/mdi-icons']) }}">Mdi Icons</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="nav-item {{ active_class(['reports/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#reports" role="button"
                    aria-expanded="{{ is_active_route(['reports/*']) }}" aria-controls="reports">
                    <i class="link-icon" data-feather="filter"></i>
                    <span class="link-title">Reports</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['reports/*']) }}" id="reports">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/reports/current-colleagues') }}"
                                title="Current Colleagues on Specific Date"
                                class="nav-link {{ active_class(['reports/current-colleagues']) }}">Current
                                Colleagues</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/currrent-colleagues-all-contracts') }}"
                                title="Current Colleagues All Contracts"
                                class="nav-link {{ active_class(['reports/currrent-colleagues-all-contracts']) }}">Current
                                Colleagues All...</a>

                        </li>


                        <li class="nav-item">
                            <a href="{{ url('/reports/retirement') }}" title="Retirement Report"
                                class="nav-link {{ active_class(['reports/retirement']) }}">Retirement Report</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/sickness') }}" title="Sickness on 3 Occasions"
                                class="nav-link {{ active_class(['reports/sickness']) }}">Sickness Report</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/long-term-sickness') }}"
                                title="On Capability Procedure – Long Term Sick Indicator"
                                class="nav-link {{ active_class(['reports/long-term-sickness']) }}">Long Term
                                Sickness </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/sickness-indicator') }}"
                                title="On Capability any further absence"
                                class="nav-link {{ active_class(['reports/sickness-indicator']) }}">Sickness
                                Indicator</a>
                        </li>
                        <li class="nav-item">
                            <a title="On Capability Procedure – Full Sickness and Capability Details Report"
                                href="{{ url('/reports/full-sickness-capability') }}"
                                class="nav-link {{ active_class(['reports/full-sickness-capability']) }}">Full
                                Sickness & Capability</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/colleague-terms') }}"
                                class="nav-link {{ active_class(['reports/colleague-terms']) }}">Current Colleagues
                                by Type</a>

                        </li>
                        <li class="nav-item" title="Current Casual Colleagues by Facility">
                            <a href="{{ url('/reports/casual-colleagues-by-site') }}"
                                class="nav-link {{ active_class(['reports/casual-colleagues-by-site']) }}">Casual
                                Colleagues by Fac..</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/current-contracted-colleagues') }}"
                                title="Current Contracted Colleagues"
                                class="nav-link {{ active_class(['reports/current-contracted-colleagues']) }}">Current
                                Contracted Coll...</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/hours-by-site') }}" title="Current Contracted Hours by Site"
                                class="nav-link {{ active_class(['reports/hours-by-site']) }}">Current Contracted
                                Hours</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/temp-fix-colleagues') }}" title="Temp/Fix Term Colleagues"
                                class="nav-link {{ active_class(['reports/temp-fix-colleagues']) }}">Temp/Fix Term
                                Colleagues</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/emergency-info') }}" title="Emergency Contact Information"
                                class="nav-link {{ active_class(['reports/emergency-info']) }}">Emergency Info</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/national-statistics') }}"
                                title="National Statistics – male / female, 30 hours and under / over 30 hours, per facility – casuals and contracted"
                                class="nav-link {{ active_class(['reports/national-statistics']) }}">National
                                Statistics</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/dbs-check') }}"
                                title="DBS – outstanding / missed – double check for admin"
                                class="nav-link {{ active_class(['reports/dbs-check']) }}">DBS Check</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/full-time-equivalent') }}"
                                title="Full Time Equivalent? Running amount"
                                class="nav-link {{ active_class(['reports/full-time-equivalent']) }}">Full Time
                                Equivalent</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/outstanding-new-starter-docs') }}"
                                title="Outstanding New Starter Docs – Contract, JD, DBS, Medical, etc"
                                class="nav-link {{ active_class(['reports/outstanding-new-starter-docs']) }}">Outstanding
                                New Start...</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/new-colleagues') }}" title="New Colleagues each month"
                                class="nav-link {{ active_class(['reports/new-colleagues']) }}">Joinees Each Month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/left-colleagues') }}" title="Leavers each month"
                                class="nav-link {{ active_class(['reports/left-colleagues']) }}">Leavers Each
                                Month</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/reports/turnover-monthly') }}"
                                title="Turnover – Monthly – Total, Casuals and Contracted, by role and by centre"
                                class="nav-link {{ active_class(['reports/turnover-monthly']) }}">Turnover
                                Monthly</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/reports/turnover-yearly') }}"
                                title="Turnover – for last 12 month period – updated each month - Total, Casuals and Contracted"
                                class="nav-link {{ active_class(['reports/turnover-yearly']) }}">Turnover Yearly</a>
                        </li>

                        {{-- Training Report --}}
                        <li class="nav-item">
                            <a href="{{ url('/reports/training-individual') }}" title="Training Individual Report"
                                class="nav-link {{ active_class(['reports/training-individual']) }}">
                                Training Individual </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/reports/disciplinary-individual') }}"
                                title="Disciplinary Individual Report"
                                class="nav-link {{ active_class(['reports/disciplinary-individual']) }}">
                                Disciplinary Individual</a>
                        </li>
                        <li class="nav-item" title="Disciplinary Capability Lateness">
                            <a href="{{ url('/reports/disciplinary-capability-lateness') }}"
                                title="Disciplinaries, Capabilities, Lates – combined report for individuals"
                                class="nav-link {{ active_class(['reports/disciplinary-capability-lateness']) }}">Disci..
                                Capabi.. Late..</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</nav>
