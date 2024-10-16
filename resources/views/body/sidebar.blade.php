<div class="left-side-menu">

<div class="h-100" data-simplebar>

    <!-- User box -->
    <div class="user-box text-center">
        <img src="{{ asset('backend/assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
            class="rounded-circle avatar-md">
        <div class="dropdown">
            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                data-bs-toggle="dropdown">Geneva Kennedy</a>
            <div class="dropdown-menu user-pro-dropdown">

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user me-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings me-1"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-lock me-1"></i>
                    <span>Lock Screen</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-log-out me-1"></i>
                    <span>Logout</span>
                </a>

            </div>
        </div>
        <p class="text-muted">Admin Head</p>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul id="side-menu">

            <li class="menu-title">Navigation</li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="mdi mdi-view-dashboard-outline"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li>
                <a href="{{ route('pos') }}">
                    <span class="badge bg-pink float-end">Hot</span>
                <i class="mdi mdi-view-dashboard-outline"></i>
                    <span> POS </span>
                </a>
            </li>
            <li class="menu-title mt-2">Apps</li>
            <li>
                <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                    <i class="mdi mdi-account-multiple-outline"></i>
                    <span> Employee </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="nav-second-level">
                        <li>
                        <a href="{{ route('all.employee') }}">All Employee</a>
                        </li>
                        <li>
                            <a href="{{ route('add.employee') }}">Add Employee</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a href="#sidebarCrm" data-bs-toggle="collapse">
                    <i class="mdi mdi-account-multiple-outline"></i>
                    <span> CRM </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCrm">
                    <ul class="nav-second-level">
                        <li>
                            <a href="crm-dashboard.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="crm-contacts.html">Contacts</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a href="#sidebarEmail" data-bs-toggle="collapse">
                    <i class="mdi mdi-email-multiple-outline"></i>
                    <span> Manage Category </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                <ul class="nav-second-level">
                        <li>
                        <a href="{{ route('all.category') }}">All Category</a>
                        </li>
                        <li>
                        </li>
                    </ul>
                </div>
            </li>

        <li>
            <a href="#product" data-bs-toggle="collapse">
                <i class="mdi mdi-email-multiple-outline"></i>
                <span> Products  </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="product">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ route('all.product') }}">All Product </a>
                    </li>

                     <li>
                        <a href="{{ route('add.product') }}">Add Product </a>
                    </li>
                     <li>
                        <a href="{{ route('import.product') }}">Import Product </a>
                    </li>
                
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarAuth" data-bs-toggle="collapse">
                <i class="mdi mdi-account-circle-outline"></i>
                <span>Expense </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarAuth">
            <ul class="nav-second-level">
                <li>
                    <a href="{{ route('add.expense') }}">Add Expense</a>
                </li>
                <li>
                    <a href="{{ route('today.expense') }}">Today Expense</a>
                </li>
                <li>
                    <a href="{{ route('month.expense') }}">Monthly Expense</a>
                </li>
                <li>
                    <a href="{{ route('year.expense') }}">Yearly Expense</a>
                </li>
                
            </ul>
            </div>
        </li>
        
            <li class="menu-title mt-2">Custom</li>

            <li>
                <a href="#sidebarAuth" data-bs-toggle="collapse">
                    <i class="mdi mdi-account-circle-outline"></i>
                    <span> Auth Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAuth">
                    <ul class="nav-second-level">
                        <li>
                            <a href="auth-login.html">Log In</a>
                        </li>
                        <li>
                            <a href="auth-login-2.html">Log In 2</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a href="#sidebarExpages" data-bs-toggle="collapse">
                    <i class="mdi mdi-text-box-multiple-outline"></i>
                    <span> Extra Pages </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarExpages">
                    <ul class="nav-second-level">
                        <li>
                            <a href="pages-starter.html">Starter</a>
                        </li>
                        <li>
                            <a href="pages-timeline.html">Timeline</a>
                        </li>
                        <li>
                            <a href="pages-sitemap.html">Sitemap</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>