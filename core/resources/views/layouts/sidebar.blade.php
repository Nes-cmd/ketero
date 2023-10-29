<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box d-flex" >
       
        <!-- Light Logo-->
        <a href="index" class="logo">
            
            <span class="logo">
                <img src="{{ URL::asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span >@lang('translation.menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link" href="index">
                        <i class="ri-dashboard-2-line"></i> <span >@lang('translation.dashboards')</span>
                    </a>
                </li> 
                
                <li class="menu-title"><i class="ri-more-fill"></i> <span >@lang('translation.pages')</span></li>

                <li class="nav-item">
                    <a class="nav-link" href="events">
                        <i class="ri-dashboard-2-line"></i> <span >Events</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link" href="calendar">
                        <i class="ri-dashboard-2-line"></i> <span >Calendar</span>
                    </a>
                </li> 
                
                <li class="nav-item">
                    <a class="nav-link" href="create-event">
                        <i class="ri-dashboard-2-line"></i> <span >Create event</span>
                    </a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link" href="availability">
                        <i class="ri-dashboard-2-line"></i> <span >Availability</span>
                    </a>
                </li> 

               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
     <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
