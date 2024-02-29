<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('backend/img/logo/logo.png') }}" rel="icon">
    <title>{{config('app_name')}}- Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}"
          rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/ruang-admin.min.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body id="page-top">
<div id="app">
    <div id="wrapper">
        <!-- Sidebar -->

        <nav id="sidebar"
             v-show="$router.path==='/'|| $router.path==='/signup'|| $router.path==='forgot'|| $router.path==='/logout'?false:true"
             style="display: none;"
        >
            <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-icon">
                        <img src="img/logo/logo2.png">
                    </div>
                    <div class="sidebar-brand-text mx-3">Inventory System</div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/home">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <hr class="sidebar-divider">
                <div class="sidebar-heading">
                    Features
                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
                       aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="far fa-fw fa-window-maximize"></i>
                        <span>Employee</span>
                    </a>
                    <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{--<h6 class="collapse-header">Bootstrap UI</h6>--}}
                            <router-link class="collapse-item" to="/store-employee">Add Employee</router-link>
                            <router-link class="collapse-item" to="/employees">All Employees</router-link>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
                       aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="far fa-fw fa-window-maximize"></i>
                        <span>Categories</span>
                    </a>
                    <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{--<h6 class="collapse-header">Bootstrap UI</h6>--}}
                            <router-link class="collapse-item" to="/store-category">Add Category</router-link>
                            <router-link class="collapse-item" to="/categories">All Categories</router-link>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                       aria-expanded="true" aria-controls="collapseBootstrap">
                        <i class="far fa-fw fa-window-maximize"></i>
                        <span>Suppliers</span>
                    </a>
                    <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            {{--<h6 class="collapse-header">Bootstrap UI</h6>--}}
                            <router-link class="collapse-item" to="/store-supplier">Add Supplier</router-link>
                            <router-link class="collapse-item" to="/suppliers">All Suppliers</router-link>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1"
                       aria-expanded="true" aria-controls="collapseTable">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Products</span>
                    </a>
                    <div id="collapseTable1" class="collapse" aria-labelledby="headingTable"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <router-link class="collapse-item" to="/store-product">Add Product</router-link>
                            <router-link class="collapse-item" to="/products">All Products</router-link>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable4"
                       aria-expanded="true" aria-controls="collapseProduct">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Expense</span>
                    </a>
                    <div id="collapseTable4" class="collapse" aria-labelledby="headingTable"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <router-link class="collapse-item" to="/store-expenses">Add Expenses</router-link>
                            <router-link class="collapse-item" to="/expenses">All Expenses</router-link>
                        </div>
                    </div>
                </li>

{{--                <hr class="sidebar-divider">--}}
{{--                <div class="sidebar-heading">--}}
{{--                    Examples--}}
{{--                </div>--}}
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                       aria-expanded="true" aria-controls="collapsePage">
                        <i class="fas fa-fw fa-columns"></i>
                        <span>Customer</span>
                    </a>
                    <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <router-link class="collapse-item" to="/store-customer">Add Customer</router-link>
                            <router-link class="collapse-item" to="/customers">All Customers</router-link>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage1"
                       aria-expanded="true" aria-controls="collapsePage">
                        <i class="fas fa-fw fa-columns"></i>
                        <span>Salary</span>
                    </a>
                    <div id="collapsePage1" class="collapse" aria-labelledby="headingPage"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <router-link class="collapse-item" to="/store-salary">Add Salary</router-link>
                            <router-link class="collapse-item" to="/given-salary">Salaries</router-link>
                        </div>
                    </div>
                </li>

                                <hr class="sidebar-divider">
                                <div class="sidebar-heading">
                                    Order Management
                                </div>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage7"
                       aria-expanded="true" aria-controls="collapsePage">
                        <i class="fas fa-fw fa-columns"></i>
                        <span>Orders</span>
                    </a>
                    <div id="collapsePage7" class="collapse" aria-labelledby="headingPage"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <router-link class="collapse-item" to="/orders_today">Orders Today</router-link>
                            <router-link class="collapse-item" to="/orders">All Orders</router-link>
                            <router-link class="collapse-item" to="/search_order">Search</router-link>
                            <router-link class="collapse-item" to="/pos">POS</router-link>
                        </div>
                    </div>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="charts.html">--}}
{{--                        <i class="fas fa-fw fa-chart-area"></i>--}}
{{--                        <span>Charts</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <hr class="sidebar-divider">
                <div class="version" id="version-ruangadmin"></div>
            </ul>
        </nav>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- TopBar -->
                <nav id="topnavbar"
                     v-show="$router.path === '/'|| $router.path === '/register'|| $router.path==='/forgot'|| $router.path === '/logout'?false:true"
                     class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top"
                     style="display: none">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">

                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                 aria-labelledby="searchDropdown">
                                <form class="navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-1 small"
                                               placeholder="What do you want to look for?" aria-label="Search"
                                               aria-describedby="basic-addon2" style="border-color: #3f51b5;">
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
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                                {{-- <span class="ml-2 d-none d-lg-inline text-white small">Maman Ketoprak</span> --}}
                                <router-link to="/logout" class="ml-2 d-none d-lg-inline text-white small">Logout
                                </router-link>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Topbar -->

                <router-view></router-view>
                <!-- <app-component></app-component> -->


            </div>
            <!-- Footer -->
            <footer id="footerbar" style="display: none;" class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                            <span>copyright &copy;

                                - developed by
                                <b><a href="https://github.com/FrancisOwusu" target="_blank">Francis Owusu</a></b>
                            </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>
</div>
<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@vite('resources/js/app.js')
{{--        <script src="{{ asset('resources/js/app.js?time=') }}{{ time() }}" defer></script>--}}
<script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
    const token = localStorage.getItem('token')
    if (token) {
        $("#sidebar").css("display", "");
        $("#footerbar").css("display", "");
        $("#topnavbar").css("display", "");
    }

    // <!--<script>
    // document.write(new Date().getFullYear());

    {{--</script>--!>--}}
</script>
<script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('backend/js/ruang-admin.min.js') }}"></script>
<script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/js/demo/chart-area-demo.js') }}"></script>
</body>

</html>
<script>
    import Topnavbar from "../js/layouts/topnavbar";

    export default {
        components: {Topnavbar}
    }
</script>
