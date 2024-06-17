<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fe-airplay"></i>
                        
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-briefcase"></i>
                        <span> Properties </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.properties')}}"> All Properties</a></li>
                        
                        <li><a href="{{ route('admin.property.create')}}"> Add Property</a></li>
                         
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user"></i>
                        <span> Booking </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin.booked')}}"> Booking List </a></li>
                        
                    
                         
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user"></i>
                        <span> Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{route('admin.landlords')}}"> Landlords </a></li>
                        
                        <li><a href="{{route('admin.tenants')}}"> Tenants </a></li>
                         
                    </ul>
                </li>

             
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>