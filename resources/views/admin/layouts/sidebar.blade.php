 <div id="layoutSidenav">
     <div id="layoutSidenav_nav">
         <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
             <div class="sb-sidenav-menu">
                 <div class="nav">
                     <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                     <a class="nav-link" href="{{url('/home')}}">
                         <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                         Dashboard
                     </a>
                     <div class="sb-sidenav-menu-heading">Interface</div>
                     @if (isset(auth()->user()->role->permission['name']['department']['can-add']) || isset(auth()->user()->role->permission['name']['department']['can-list']))
                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                         <div class="sb-nav-link-icon"><i class="fa-solid fa-building-user"></i></div>
                         <!-- fas fa-columns -->
                         Departments
                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                         <nav class="sb-sidenav-menu-nested nav">
                             @if (isset(auth()->user()->role->permission['name']['department']['can-add']) )
                             <a class="nav-link" href="{{route('departments.create')}}">Create Department</a>
                             @endif
                             @if (isset(auth()->user()->role->permission['name']['department']['can-list']) )
                             <a class="nav-link" href="{{route('departments.index')}}">View departments</a>
                             @endif
                         </nav>
                     </div>
                     @endif
                     @if (isset(auth()->user()->role->permission['name']['role']['can-add']) || isset(auth()->user()->role->permission['name']['role']['can-list']))
                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                         <div class="sb-nav-link-icon"><i class="fa-solid fa-id-card-clip"></i></div>
                         Roles
                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                         <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                             @if (isset(auth()->user()->role->permission['name']['role']['can-add']))
                             <a class="nav-link " href="{{route('roles.create')}}">
                                 Create role
                             </a>
                             @endif
                             @if (isset(auth()->user()->role->permission['name']['role']['can-list']))
                             <a class="nav-link " href="{{route('roles.index')}}">
                                 View roles

                             </a>
                             @endif
                             <!-- <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                 <nav class="sb-sidenav-menu-nested nav">
                                     <a class="nav-link" href="401.html">401 Page</a>
                                     <a class="nav-link" href="404.html">404 Page</a>
                                     <a class="nav-link" href="500.html">500 Page</a>
                                 </nav>
                             </div> -->
                         </nav>
                     </div>
                     @endif
                     @if (isset(auth()->user()->role->permission['name']['user']['can-add']) || isset(auth()->user()->role->permission['name']['user']['can-list']))
                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapsePages">
                         <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-user"></i></div>
                         Users
                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseUsers" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                         <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                             @if (isset(auth()->user()->role->permission['name']['user']['can-add']))
                             <a class="nav-link " href="{{route('users.create')}}">
                                 Create user
                             </a>
                             @endif
                             @if (isset(auth()->user()->role->permission['name']['user']['can-list']))
                             <a class="nav-link " href="{{route('users.index')}}">
                                 View users
                             </a>
                             @endif
                             <!-- <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                 <nav class="sb-sidenav-menu-nested nav">
                                     <a class="nav-link" href="401.html">401 Page</a>
                                     <a class="nav-link" href="404.html">404 Page</a>
                                     <a class="nav-link" href="500.html">500 Page</a>
                                 </nav>
                             </div> -->
                         </nav>
                     </div>
                     @endif
                     @if (isset(auth()->user()->role->permission['name']['permission']['can-add']) || isset(auth()->user()->role->permission['name']['permission']['can-list']))
                     <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePermissions" aria-expanded="false" aria-controls="collapsePages">
                         <div class="sb-nav-link-icon"><i class="fa-solid fa-shield-halved"></i></div>
                         Permissions
                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapsePermissions" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                         <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                             @if (isset(auth()->user()->role->permission['name']['permission']['can-add']))
                             <a class="nav-link " href="{{route('permissions.create')}}">
                                 Assign permission
                             </a>
                             @endif
                             @if (isset(auth()->user()->role->permission['name']['permission']['can-list']))
                             <a class="nav-link " href="{{route('permissions.index')}}">
                                 View permissions
                             </a>
                             @endif
                             <!-- <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                 <nav class="sb-sidenav-menu-nested nav">
                                     <a class="nav-link" href="401.html">401 Page</a>
                                     <a class="nav-link" href="404.html">404 Page</a>
                                     <a class="nav-link" href="500.html">500 Page</a>
                                 </nav>
                             </div> -->
                         </nav>
                     </div>
                     @endif
                     <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                     <a class="nav-link" href="charts.html">
                         <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                         Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a> -->

                     <a class="nav-link collapsed" href="{{route('leaves.index')}}" data-bs-toggle="collapse" data-bs-target="#collapseLeaves" aria-expanded="false" aria-controls="collapsePages">
                         <div class="sb-nav-link-icon"><i class="fa-solid fa-person-hiking"></i></div>
                         Leaves
                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseLeaves" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                         <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                             <a class="nav-link " href="{{route('leaves.create')}}">
                                 Request a leave
                             </a>

                             @if (isset(auth()->user()->role->permission['name']['leave']['can-list']))
                             <a class="nav-link " href="{{route('leaves.index')}}">
                                 Leaves
                             </a>
                             @endif
                         </nav>
                     </div>
                     <a class="nav-link collapsed" href="{{route('notices.index')}}" data-bs-toggle="collapse" data-bs-target="#collapseNotices" aria-expanded="false" aria-controls="collapsePages">
                         <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                         Notices
                         <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                     </a>
                     <div class="collapse" id="collapseNotices" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                         <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                             @if (isset(auth()->user()->role->permission['name']['notice']['can-add']))
                             <a class="nav-link " href="{{route('notices.create')}}">
                                 Create a notice
                             </a>
                             @endif
                             @if (isset(auth()->user()->role->permission['name']['notice']['can-list']))
                             <a class="nav-link " href="{{route('notices.index')}}">
                                 View notices
                             </a>
                             @endif
                         </nav>
                     </div>
                     @if (isset(auth()->user()->role->permission['name']['mail']['can-add']))
                     <a class="nav-link" href="{{url('/mail')}}">
                         <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                         Mail
                     </a>
                     @endif
                 </div>
             </div>
             <!-- <div class="sb-sidenav-footer">
                 <div class="small">Logged in as:</div>
                 Start Bootstrap
             </div> -->
         </nav>
     </div>