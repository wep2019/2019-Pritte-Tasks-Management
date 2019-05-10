<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Management System</title>
    {{-- font style --}}
    <link rel="stylesheet" href="{{asset('css/font.css')}} ">
    {{-- css --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialsicon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}" />
    {{-- Datatables --}}
    <link rel="stylesheet" href="{{asset('datatables/dataTables.bootstrap4.min.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand bg-light d-flex align-items-center justify-content-center" href="{{url('/')}}">
                <img class="logo" width="100%" src="{{asset('images/tlogo.png')}} " alt="Logo">
                <img class="slogo" width="100%" src="{{asset('images/tasklogo.png')}} " alt="Logo">
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}} ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-diagnoses"></i>
                    <span>Tasks</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage the tasks:</h6>
                        <a class="collapse-item" href="{{url('private')}}">Private Task</a>
                        <a class="collapse-item" href="{{url('task')}}">Individual & Collective</a>
                    </div>
                </div>
            </li>
            @auth
            @if (\Auth::user()->role_id==1)
            <!-- Category Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('category')}}">
                    <i class="fas fa-list-ul"></i>
                    <span>Categories</span>
                </a>
            </li>
            @endif

            <!-- Group Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('group')}}">
                    <i class="fas fa-users"></i>
                    <span>Groups</span>
                </a>
            </li>
            @if (\Auth::user()->role_id==1)
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('user')}} ">
                    <i class="fas fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            @endif
            @endauth
            <!-- User Menu -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-gradient-primary topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="text-light btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-light small">
                                    {{ Auth::user()->name }}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('storage/storage/profiles/'.Auth::user()->avatar)}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('users/profile')}} ">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#}} " data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="container-fluid">

                    @yield('template')

                </div>
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Are you sure to logout from the system?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('js/script.js')}} "></script>


    <!-- Page level plugins -->
    <script src={{asset('charts/Chart.min.js')}}></script>
    <script src="{{asset('charts/utils.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('charts/chart-area-demo.js')}}"></script>
    <script src="{{asset('charts/chart-pie-demo.js')}}"></script>


    {{-- Datatable JS --}}
    <script src="{{asset('datatables/jquery.dataTables.js')}} "></script>
    <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}} "></script>
    <script src="{{asset('datatables/dataTables-demo.js')}} "></script>

</body>

</html>