<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="https://img.freepik.com/premium-vector/cartoon-man-with-beard-orange-shirt_101266-50141.jpg" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
              <img class="wd-80 ht-80 rounded-circle"  src="https://img.freepik.com/premium-vector/cartoon-man-with-beard-orange-shirt_101266-50141.jpg" alt="">
            </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ auth()->user()->surname }}</p>
                            <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <a href="{{ route('show.profile') }}" class="text-body ms-0">
                            <li class="dropdown-item py-2">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Profile</span>
                            </li>
                        </a>
                        <a href="{{ route('edit.profile') }}" class="text-body ms-0">
                            <li class="dropdown-item py-2">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Edit Profile</span>
                            </li>
                        </a>
                        <a href="{{ route('edit.password') }}" class="text-body ms-0">
                            <li class="dropdown-item py-2">
                                <i class="me-2 icon-md" data-feather="lock"></i>
                                <span>Edit Password</span>
                            </li>
                        </a>
                        <li class="dropdown-item py-2" style="cursor: pointer" onclick="document.getElementById('logout').submit()">
                            <form action="{{ route('logout') }}" method="POST" id="logout" class="text-body ms-0">
                                @csrf
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Log Out</span>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
