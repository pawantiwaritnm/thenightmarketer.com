<div class="mobile-search">
    <form class="search-form">
        <span data-feather="search"></span>
        <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
    </form>
</div>

<div class="mobile-author-actions"></div>
<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="#" class="sidebar-toggle">
                <img class="svg" src="{{ asset('admin/img/Frame.png') }}" alt="img">
            </a>
            <img src="{{ asset('admin/img/tnm-logo.png') }}" class="h-70">

            <!-- <a class="navbar-brand" href="#">ADF</a>
            <form action="https://demo.jsnorm.com/" class="search-form">
                <span data-feather="search"></span>
                <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
            </form> -->
        </div>
        <!-- ends: navbar-left -->

        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-search d-none">
                    <a href="#" class="search-toggle">
                        <i class="la la-search"></i>
                        <i class="la la-times"></i>
                    </a>
                    <form action="https://demo.jsnorm.com/" class="search-form-topMenu">
                        <span class="search-icon" data-feather="search"></span>
                        <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
                    </form>
                </li>
                <!-- <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('admin/img/author-nav.jpg') }}"
                                alt="" class="rounded-circle"></a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="{{ asset('admin/img/author-nav.jpg') }}" alt="" class="rounded-circle">
                                </div>
                                <div>
                                    <h6>Abdullah Bin Talha</h6>
                                    <span>UI Designer</span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span data-feather="user"></span> Profile</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span data-feather="settings"></span> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span data-feather="key"></span> Billing</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span data-feather="users"></span> Activity</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span data-feather="bell"></span> Help</a>
                                    </li>
                                </ul>
                                <a href="#" class="nav-author__signout">
                                    <span data-feather="log-out"></span> Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li> -->
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                <a href="#" class="btn-search">
                    <span data-feather="search"></span>
                    <span data-feather="x"></span></a>
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>

<aside class="sidebar-wrapper">
    <div class="sidebar sidebar-collapse" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
            @if (session('role') == 'Admin')
                <li>
                    <a href="#" class="">
                        <span data-feather="home" class="nav-icon"></span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <!--  <li>
                        <a href="add-funds.php" class="">
                            <span data-feather="alert-circle" class="nav-icon"></span>
                            <span class="menu-text">Fund Create</span>
                        </a>
                    </li>    -->
                    
                <li class="has-child">
                    <a href="#" class="">
                        <span data-feather="grid" class="nav-icon"></span>
                        <span class="menu-text">Category</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('categories.create') }}" class="">Add Category</a>
                        </li>
                        <li>
                            <a href="{{ route('categories.index') }}" class="">Category List</a>
                        </li>
                        <li>
                            <a href="{{ route('blog-category-create') }}" class="">Add Blog Category</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if (session('role') == 'Admin' || session('role') == 'Author'  )
                <li class="has-child">
                    <a href="#" class="">
                        <span data-feather="file-text" class="nav-icon"></span>
                        <span class="menu-text">Blogs</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('blog-create') }}" class="">Add Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('blog-list') }}" class="">Blog List</a>
                        </li>
                        {{--@if (session('role') == 'Admin')--}}
                        <li>
                            <a href="{{ route('pending-blogs') }}" class="">Pending Blogs</a>
                        </li>
                        <li>
                            <a href="{{ route('blog-category-list') }}" class="">Blog Category List</a>
                        </li>
                        {{--@endif--}}
                    </ul>
                </li>
                @endif
                @if (session('role') == 'Admin')
                <li class="has-child">
                    <a href="#" class="">
                        <span data-feather="target" class="nav-icon"></span>
                        <span class="menu-text">Services</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('services.create') }}" class="">Add Service</a>
                        </li>
                        <li>
                            <a href="{{ route('services.index') }}" class="">Service List</a>
                        </li>
                    </ul>
                </li>
                @endif
               
                @if (session('role') == 'Admin' )
                <li class="has-child">
                    <a href="#" class="">
                        <span data-feather="file-text" class="nav-icon"></span>
                        <span class="menu-text">Manage Career</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('job.listings.create') }}" class="">Add Career</a>
                        </li>
                        <li>
                            <a href="{{ route('job.listings.index') }}" class="">Career List</a>
                        </li>
                        <li>
                            <a href="{{ route('departments.index') }}" class="">Departments</a>
                        </li>
                        <li>
                            <a href="{{ route('types.index') }}" class="">Types</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('pagemeta.index') }}" class="">
                        <span data-feather="folder" class="nav-icon"></span>

                        <span class="menu-text">Pages Meta</span>
                    </a>
                </li>  
                <li>
                    <a href="{{ route('team.index') }}" class="">
                        <span data-feather="folder" class="nav-icon"></span>

                        <span class="menu-text">Team</span>
                    </a>
                </li>  
                <li>
                    <a href="{{ route('industries.index') }}" class="">
                        <span data-feather="folder" class="nav-icon"></span>

                        <span class="menu-text">Industries</span>
                    </a>
                </li>  
                <li>
                    <a href="{{ route('clients.index') }}" class="">
                        <span data-feather="user" class="nav-icon"></span>

                        <span class="menu-text">Clients</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact-list') }}" class="">
                        <span data-feather="database" class="nav-icon"></span>

                        <span class="menu-text">Contact Forms</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('career-list') }}" class="">
                        <span data-feather="database" class="nav-icon"></span>

                        <span class="menu-text">Career Forms</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('career-list') }}" class="">
                        <span data-feather="send" class="nav-icon"></span>

                        <span class="menu-text">Career Forms</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('userservices') }}" class="">
                        <span data-feather="send" class="nav-icon"></span>

                        <span class="menu-text">Services Forms</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('servicespage') }}" class="">
                        <span data-feather="send" class="nav-icon"></span>

                        <span class="menu-text">Services Page</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payments') }}" class="">
                        <span data-feather="send" class="nav-icon"></span>

                        <span class="menu-text">Payments List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('testimonials-list') }}" class="">
                        <span data-feather="send" class="nav-icon"></span>

                        <span class="menu-text">Testimonials List</span>
                    </a>
                </li> --}}
                <li class="has-child">
                    <a href="#" class="">
                        <span data-feather="users" class="nav-icon"></span>
                        <span class="menu-text">Role Management</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('user-create') }}" class="">Add Admin</a>
                        </li>
                        <li>
                            <a href="{{ route('user-list') }}" class="">Admin List</a>
                        </li>
                        <!-- <li>
                                <a href="author-blog.php" class="">Author Blogs</a>
                            </li> -->
                    </ul>
                </li>
                @endif

                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('nav-logout-form').submit();" class="">
                        <span data-feather="power" class="nav-icon"></span>
                        <span class="menu-text">Logout</span>
                    </a>
                    <form id="nav-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</aside>
