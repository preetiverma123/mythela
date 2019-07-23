<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ Request::is('dashboard')?'active':'' }}">
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{pathinfo(route('all.booking'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('ongoing.booking'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('completed.booking'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('cancelled.booking'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="javascript:void(0)">
                    <i class="fa fa-ticket"></i>
                    <span>Manage Bookings</span>
                    <span class="pull-right-container">
                        <!--<span class="label label-primary pull-right">4</span>-->
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('all.booking')}}"><i class="fa {{pathinfo(route('all.booking'), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i> All Booking</a></li>
                    <li><a href="{{route('ongoing.booking')}}"><i class="fa {{pathinfo(route('ongoing.booking'), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i> Ongoing</a></li>
                    <li><a href="{{route('completed.booking')}}"><i class="fa {{pathinfo(route('completed.booking'), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i> Completed</a></li>
                    <li><a href="{{route('cancelled.booking')}}"><i class="fa {{pathinfo(route('cancelled.booking'), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i> Cancelled</a></li>
                </ul>
            </li>
            <li class="{{pathinfo(route('manage.partners'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('detail.partner', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.partners')}}">
                    <i class="fa fa-handshake-o"></i> <span>Manage Partners</span>
                </a>
            </li>
            <li class="{{pathinfo(route('manage.vehicle'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('vehicle.detail', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.vehicle')}}">
                    <i class="fa fa-car"></i> <span>Manage Vehicle</span>
                </a>
            </li>
           @if(role(Auth::user()['role_id'])!='admin')
            <li class="{{pathinfo(route('manage.admins', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.admins', ['id'=>''])}}">
                    <i class="fa fa-user"></i> <span>Manage Admins</span>
                </a>
            </li>
             <li class="{{pathinfo(route('manage.partner.commission', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.partner.commission', ['id'=>''])}}">
                    <i class="fa fa-percent"></i> <span>Manage Commission</span>
                </a>
            </li>
            <li class="treeview {{pathinfo(route('state', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('city', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="javascript:void(0)">
                    <i class="fa fa-map-marker"></i>
                    <span>Manage Location</span>
                    <span class="pull-right-container">
                        <!--<span class="label label-primary pull-right">4</span>-->
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('state', ['id'=>''])}}"><i class="fa {{pathinfo(route('state', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i> States</a></li>
                    <li><a href="{{route('city', ['id'=>''])}}"><i class="fa {{pathinfo(route('city', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i> Cities</a></li>
                </ul>
            </li>
            <li class="{{pathinfo(route('manage.insurance', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.insurance', ['id'=>''])}}">
                    <i class="fa fa-shield"></i> <span>Manage Insurance</span>
                </a>
            </li>
            @endif
            <li class="treeview " style="display: none;">
                <a href="#">
                    <i class="fa fa-truck"></i> <span>Manage Fleets</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="manage-fleets.php"><i class="fa fa-circle-o"></i> All Fleets
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> INCITY</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> OUTCITY</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> RENTALS</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> TRANSPORT</a></li>
                        </ul>
                    </li>
                    <li><a href="add-new-fleet.php"><i class="fa fa-circle-o"></i> Add New Fleet</a></li>
                </ul>
            </li>
            <li class="{{pathinfo(route('manage.customers'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.customers')}}">
                    <i class="fa fa-users"></i> <span>Manage Customers</span>
                </a>
            </li>
            <li class="{{pathinfo(route('manage.accounts'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('detail.earning', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.accounts')}}">
                    <i class="fa fa-money"></i> <span>Manage Accounts</span>
                </a>
            </li>
            <li class="{{pathinfo(route('manage.surround', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.surround', ['id'=>''])}}">
                    <i class="fa fa-sliders"></i> <span>Surround area</span>
                </a>
            </li>

             @if(role(Auth::user()['role_id'])!='admin')
             <li class="{{pathinfo(route('manage.credit.limit', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('manage.credit.limit', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.credit.limit', ['id'=>''])}}">
                    <i class="fa fa-level-down"></i> <span>Credit Limit</span>
                </a>
            </li>
            <li class="treeview {{pathinfo(route('manage.gst', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('manage.service.tax', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="javascript:void(0)">
                    <i class="fa fa-tag"></i>
                    <span>Manage Gst</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('manage.gst', ['id'=>''])}}"><i class="fa {{pathinfo(route('manage.gst', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i> Manage Gst</a></li>
                    <li><a href="{{route('manage.service.tax', ['id'=>''])}}"><i class="fa {{pathinfo(route('manage.service.tax', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i> Manage Service Tax</a></li>
                </ul>
            </li>
            <li class="{{pathinfo(route('manage.trip', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.trip', ['id'=>''])}}">
                    <i class="fa fa-tripadvisor"></i> <span>Manage Trip</span>
                </a>
            </li>
            <li class="{{pathinfo(route('manage.vehicle.list', ['id'=>'']), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.vehicle.list', ['id'=>''])}}">
                    <i class="fa fa-cab"></i> <span>Manage Vehicle -list</span>
                </a>
            </li>
            <li class="{{pathinfo(route('manage.insurance.email'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="{{route('manage.insurance.email')}}">
                    <i class="fa fa-cab"></i> <span>Manage Insurance Email</span>
                </a>
            </li>
            <li class="treeview {{pathinfo(route('manage.exp.licence'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}} {{pathinfo(route('manage.exp.fitness'), PATHINFO_BASENAME)==Request::segment(2)?'active':''}}">
                <a href="javascript:void(0)">
                    <i class="fa fa-warning"></i>
                    <span>Expiry Document</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('manage.exp.licence')}}"><i class="fa {{pathinfo(route('manage.exp.licence'), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i>Expiry Licence Alert</a></li>
                    <li><a href="{{route('manage.exp.fitness')}}"><i class="fa {{pathinfo(route('manage.exp.fitness'), PATHINFO_BASENAME)==Request::segment(2)?'fa-circle':'fa-circle-o'}}"></i>Expiry Fitness Alert</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>