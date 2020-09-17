 @include('my_layout.header')

  <body>
      
 <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
            <a href="/home"><img class="main-logo" src="{{ asset('app-assets/img/logo/logo.png')}}" alt="" style="width: 120px;"  / ></a>
            </div>
          
             
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                                   <li class="active">
                            <li><a title="" href="/home"><span class="mini-sub-pro">Dashboard</span></a></li>
                        </li>
                                     <li>
                            <a title="all branch anouncement  Page" href="/companies" aria-expanded="false"><span class="fa fa-home icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Companies</span></a>
                        </li>
                         <li>
                            <a title="Our branches  Page" href="/projects" aria-expanded="false"><span class="fa fa-book icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Projects</span></a>
                        </li>
                         <li>
                            <a title="Expenses  Page" href="/users" aria-expanded="false"><span class="fa fa-group  icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Users</span></a>
                        </li>
                         <li>
                            <a title="Gallery  Page" href="/tasks" aria-expanded="false"><span class="fa fa-folder-open icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Tasks</span></a>
                        </li>
                         <li>
                            <a title="Gallery  Page" href="/roles" aria-expanded="false"><span class="fa fa-folder icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Roles</span></a>
                        </li>
                        
                        <li>
                            <a title="SMS Page" href="/comments" aria-expanded="false"><span class="fa fa-comment" aria-hidden="true"></span> <span class="mini-click-non">Comments</span></a>
                        </li>
                    
                       </ul>

                </nav>
            </div>
        </nav>
    </div>


 <div class="all-content-wrapper">
       
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                                
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                        <p id="date"></p>
                                         <p id="time" class="bold"></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" data-target="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                      															
                      															<span class="admin-name"> {{ Auth::user()->lastname }}</span>
															                       <!-- <i class="fa fa-angle-down edu-icon edu-down-arrow"></i> -->
														                        </a>
                                                    <ul role="menu" id="dropdown" class="dropdown dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                         <li><a href="/profile"><span class="edu-icon edu-settings author-log-ic"></span>profile</a>
                                                        </li>
                                                     <li>  
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="edu-icon edu-locked author-log-ic"></span>
                                        {{ __('Logout') }}
                                                         </a></li>
                                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                                    </form>

                                                        
                                                    </ul>
                                                </li>
                                                </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown" class="animated zoomIn">
                               <ul class="metismenu" id="menu1">
                              <li class="active">
                            <li><a title="" href="/home"><span class="mini-sub-pro">Dashboard</span></a></li>
                        </li>
                                     <li>
                            <a title="all branch anouncement  Page" href="/companies" aria-expanded="false"><span class="fa fa-home icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Companies</span></a>
                        </li>
                         <li>
                            <a title="Our branches  Page" href="/projects" aria-expanded="false"><span class="fa fa-book icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Projects</span></a>
                        </li>
                         <li>
                            <a title="Expenses  Page" href="/users" aria-expanded="false"><span class="fa fa-group  icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Users</span></a>
                        </li>
                         <li>
                            <a title="Gallery  Page" href="/tasks" aria-expanded="false"><span class="fa fa-folder-open icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Tasks</span></a>
                        </li>
                         <li>
                            <a title="Gallery  Page" href="/roles" aria-expanded="false"><span class="fa fa-folder icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Roles</span></a>
                        </li>
                        
                        <li>
                            <a title="SMS Page" href="/comments" aria-expanded="false"><span class="fa fa-comment" aria-hidden="true"></span> <span class="mini-click-non">Comments</span></a>
                        </li>
                    
                       </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  

                @yield('content')
                
    

     @include('my_layout.footer')
</body>
