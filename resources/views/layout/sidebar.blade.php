<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
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
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>
            {{-- <li class="nav-item {{ active_class(['email/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button"
                    aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['email/*']) }}" id="email">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/email/inbox') }}"
                                class="nav-link {{ active_class(['email/inbox']) }}">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/email/read') }}"
                                class="nav-link {{ active_class(['email/read']) }}">Read</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/email/compose') }}"
                                class="nav-link {{ active_class(['email/compose']) }}">Compose</a>
                        </li>
                    </ul>
                </div>
            </li> --}}



            {{-- admin added by haider --}}

            <li class="nav-item {{ active_class(['admin/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#Admin" role="button"
                    aria-expanded="{{ is_active_route(['admin/*']) }}" aria-controls="Admin">
                    <i class="link-icon" data-feather="user-plus"></i>
                    <span class="link-title">Admin</span>
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
                        {{-- <li class="nav-item">
              <a href="{{ url('/email/compose') }}" class="nav-link {{ active_class(['email/compose']) }}"></a>
            </li> --}}
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['employee/temp/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#TempEmployee" role="button"
                    aria-expanded="{{ is_active_route(['temp/*']) }}" aria-controls="TempEmployee">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Temp Employee</span>
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
            <li class="nav-item {{ active_class(['employee/list'])||active_class(['employee/create'])||active_class(['employee/update']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#Employee" role="button"
                    aria-expanded="{{ is_active_route(['employee/list*']) }}" aria-controls="Employee">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Employee</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['employee/list']) }}" id="Employee">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('show.employees') }}"
                                class="nav-link {{ active_class(['employee/list']) }}">List</a>
                        </li>
                 
                    </ul>
                </div>
            </li>

            {{-- Left Employees --}}
            <li class="nav-item {{ active_class(['employee/left*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#LeftEmployee" role="button"
                    aria-expanded="{{ is_active_route(['employee/left*']) }}" aria-controls="LeftEmployee">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Left Employee</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['employee/left*']) }}" id="LeftEmployee">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('left.employees') }}" 
                               class="nav-link {{ active_class(['employee/left']) }}">List</a>
                        </li>
                    </ul>
                </div>
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
                    <i class="link-icon" data-feather="user-minus"></i>
                    <span class="link-title">Sickness</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['sickness/*']) }}" id="sickness">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('show.sicknesses') }}" class="nav-link {{ active_class(['sickness/list']) }}">List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create.sickness') }}" class="nav-link {{ active_class(['sickness/create']) }}">Create</a>
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
                            <a href="{{ route('show.disciplinaries') }}" class="nav-link {{ active_class(['disciplinary/list']) }}">List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('create.disciplinary') }}" class="nav-link {{ active_class(['disciplinary/create']) }}">Create</a>
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
            

            {{-- <li class="nav-item {{ active_class(['apps/chat']) }}">
                <a href="{{ url('/apps/chat') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['apps/calendar']) }}">
                <a href="{{ url('/apps/calendar') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Calendar</span>
                </a>
            </li> --}}
            <li class="nav-item nav-category">Components</li>
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
            </li>
            {{-- <li class="nav-item nav-category">Pages</li>
            <li class="nav-item {{ active_class(['general/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#general" role="button"
                    aria-expanded="{{ is_active_route(['general/*']) }}" aria-controls="general">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Special Pages</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['general/*']) }}" id="general">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/general/blank-page') }}"
                                class="nav-link {{ active_class(['general/blank-page']) }}">Blank page</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/faq') }}"
                                class="nav-link {{ active_class(['general/faq']) }}">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/invoice') }}"
                                class="nav-link {{ active_class(['general/invoice']) }}">Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/profile') }}"
                                class="nav-link {{ active_class(['general/profile']) }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/pricing') }}"
                                class="nav-link {{ active_class(['general/pricing']) }}">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/general/timeline') }}"
                                class="nav-link {{ active_class(['general/timeline']) }}">Timeline</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['auth/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#auth" role="button"
                    aria-expanded="{{ is_active_route(['auth/*']) }}" aria-controls="auth">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Authentication</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['auth/*']) }}" id="auth">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/auth/login') }}"
                                class="nav-link {{ active_class(['auth/login']) }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/auth/register') }}"
                                class="nav-link {{ active_class(['auth/register']) }}">Register</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_class(['error/*']) }}">
                <a class="nav-link" data-bs-toggle="collapse" href="#error" role="button"
                    aria-expanded="{{ is_active_route(['error/*']) }}" aria-controls="error">
                    <i class="link-icon" data-feather="cloud-off"></i>
                    <span class="link-title">Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse {{ show_class(['error/*']) }}" id="error">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('/error/404') }}"
                                class="nav-link {{ active_class(['error/404']) }}">404</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/error/500') }}"
                                class="nav-link {{ active_class(['error/500']) }}">500</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/laravel/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
{{-- <nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted mb-2">Sidebar:</h6>
        <div class="mb-3 pb-3 border-bottom">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                        value="sidebar-light" checked>
                    Light
                </label>
            </div>
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                        value="sidebar-dark">
                    Dark
                </label>
            </div>
        </div>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Version:</h6>
            <a class="theme-item active" href="https://www.nobleui.com/laravel/template/demo1/">
                <img src="{{ url('assets/images/screenshots/light.jpg') }}" alt="light version">
            </a>
            <h6 class="text-muted mb-2">Dark Version:</h6>
            <a class="theme-item" href="https://www.nobleui.com/laravel/template/demo2/">
                <img src="{{ url('assets/images/screenshots/dark.jpg') }}" alt="light version">
            </a>
        </div>
    </div>
</nav> --}}
