<aside id="left-panel" class="left-panel">
<nav class="navbar navbar-expand-sm navbar-default">

    <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{route('admin.tasks.index')}}"><img src="{{asset('frontend-admin/images/logo.png')}}" alt="Logo"></a>
        <a class="navbar-brand hidden" href="{{route('admin.tasks.index')}}"><img src="{{asset('frontend-admin/images/logo2.png')}}" alt="Logo"></a>
    </div>

    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            @if(Auth::user()->position == 1)
            <li class="{{ Route::currentRouteNamed('admin.tasks.*') ? 'active' : '' }}">
                <a href="{{route('admin.tasks.index')}}"> <i class="menu-icon fas fa-tasks"></i>Tasks to do </a>
            </li>
            @endif
            <!-- <li class="{{ Route::currentRouteNamed('get.index.admin') ? 'active' : '' }}">
                <a href="{{route('get.index.admin')}}"> <i class="menu-icon fa fa-tachometer-alt"></i>Dashboard </a>
            </li> -->
            <li class="{{ Route::currentRouteNamed('admin.customers.*') ? 'active' : '' }}">
                <a href="{{ route('admin.customers.index') }}"> <i class="menu-icon fa fa-user"></i>Customer</a>
            </li>
            @if(Auth::user()->position == 1)
            <li class="{{ Route::currentRouteNamed('admin.house.*') ? 'active' : '' }}">
                <a href="{{route('admin.house.index')}}"><i class="menu-icon fa fa-home"></i>House</a>      
            </li>
            @endif
            <li class="menu-item-has-children dropdown {{ Route::currentRouteNamed('admin.partner.*') ? 'active' : '' }}">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-handshake"></i>Partner</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-puzzle-piece"></i><a href="{{ route('admin.partner.editview') }}">Edit View Partner</a></li>
                    <li><i class="fa fa-id-badge"></i><a href="{{route('admin.partner.index')}}">List Partners</a></li>
                </ul>
            </li>
            <li class="{{ Route::currentRouteNamed('admin.aboutus.*') ? 'active' : '' }}">
                <a href="{{ route('admin.aboutus.edit') }}"> <i class="menu-icon fa fa-male"></i>About Us</a>
            </li>
            <li class="{{ Route::currentRouteNamed('admin.setups.*') ? 'active' : '' }}">
                <a href="{{ route('admin.setups.edit', ['id' => 1]) }}"> <i class="menu-icon fa fa-cog"></i>Set up</a>
            </li>
            @if(Auth::user()->position == 1)
            <li class="{{ Route::currentRouteNamed('admin.user.*') ? 'active' : '' }}">
                <a href="{{route('admin.user.index')}}"><i class="menu-icon fa fa-user"></i>Account</a>
            </li>
            @endif
            <!-- <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Task to do</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                    <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                    <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                    <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                </ul>
            </li>

            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Set up</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                    <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                    <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                    <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a></li>
                    <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                </ul>
            </li> -->

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

<!-- Header-->
<header id="header" class="header">

    <div class="header-menu">

        <div class="col-sm-7">
            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
                @if(Auth::user()->position == 1)
                <div class="dropdown for-notification">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="count bg-danger">{{ $data['noti'] + $data['noti_cus'] + $data['noti_par']}}</span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="notification">
                    <p class="red">You have {{ $data['noti'] + $data['noti_cus'] + $data['noti_par']}} Notification</p>
                    @foreach($data['tasks'] as $task)
                    <a class="dropdown-item media bg-flat-color-5" href="{{route('admin.tasks.show',['task'=>$task->id])}}">
                        <i class="fa fa-warning"></i>
                        <p><b>{{$task->title}}</b><span> - Time : {{$task->deadline}}</span></p>
                    </a>
                    @endforeach
                    @foreach($data['tasks_cus'] as $task)
                    <a class="dropdown-item media bg-flat-color-4" href="{{route('admin.customerTasks.show',['customerTask'=>$task->id])}}">
                        <i class="fa fa-warning"></i>
                        <p><b>{{$task->title}}</b><span> - Time : {{$task->deadline}}</span></p>
                    </a>
                    @endforeach
                    @foreach($data['tasks_par'] as $task)
                    <a class="dropdown-item media bg-flat-color-1" href="{{route('admin.partnerTasks.show',['partnerTask' => $task->id])}}">
                        <i class="fa fa-warning"></i>
                        <p><b>{{$task->title}}</b><span> - Time : {{$task->deadline}}</span></p>
                    </a>
                    @endforeach
                  </div>
                </div>
                @endif
                <!-- <div class="dropdown for-message">
                  <button class="btn btn-secondary dropdown-toggle" type="button"
                        id="message"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti-email"></i>
                    <span class="count bg-primary">9</span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="message">
                    <p class="red">You have 4 Mails</p>
                    <a class="dropdown-item media bg-flat-color-1" href="#">
                        <span class="photo media-left"><img alt="avatar" src="{{asset('frontend-admin/images/avatar/1.jpg')}}"></span>
                        <span class="message media-body">
                            <span class="name float-left">Jonathan Smith</span>
                            <span class="time float-right">Just now</span>
                                <p>Hello, this is an example msg</p>
                        </span>
                    </a>
                    <a class="dropdown-item media bg-flat-color-4" href="#">
                        <span class="photo media-left"><img alt="avatar" src="{{asset('frontend-admin/images/avatar/2.jpg')}}"></span>
                        <span class="message media-body">
                            <span class="name float-left">Jack Sanders</span>
                            <span class="time float-right">5 minutes ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                        </span>
                    </a>
                    <a class="dropdown-item media bg-flat-color-5" href="#">
                        <span class="photo media-left"><img alt="avatar" src="{{asset('frontend-admin/images/avatar/3.jpg')}}"></span>
                        <span class="message media-body">
                            <span class="name float-left">Cheryl Wheeler</span>
                            <span class="time float-right">10 minutes ago</span>
                                <p>Hello, this is an example msg</p>
                        </span>
                    </a>
                    <a class="dropdown-item media bg-flat-color-3" href="#">
                        <span class="photo media-left"><img alt="avatar" src="{{asset('frontend-admin/images/avatar/4.jpg')}}"></span>
                        <span class="message media-body">
                            <span class="name float-left">Rachel Santos</span>
                            <span class="time float-right">15 minutes ago</span>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                        </span>
                    </a>
                  </div>
                </div> -->
            </div>
        </div>

        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{asset('frontend-admin/images/admin.jpg')}}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#changePass"><i class="fa fa -cog"></i>Change Password</a>

                        <a class="nav-link" href="{{route('get.logout')}}"><i class="fa fa-power -off"></i>Logout</a>
                </div>
            </div>

            <div class="language-select dropdown" id="language-select">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                    <i class="flag-icon flag-icon-us"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="language" >
                    <div class="dropdown-item">
                        <span class="flag-icon flag-icon-fr"></span>
                    </div>
                    <div class="dropdown-item">
                        <i class="flag-icon flag-icon-es"></i>
                    </div>
                    <div class="dropdown-item">
                        <i class="flag-icon flag-icon-us"></i>
                    </div>
                    <div class="dropdown-item">
                        <i class="flag-icon flag-icon-it"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
<div id="changePass" class="modal" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" style="margin: 0; padding: 0;">&times;</button> -->
          <h4 class="modal-title">Change password</h4>
        </div>
        <form id="change-pass-form" action="" method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="current_pwd">Current password:</label>
                    <input type="password" name="current_password" class="form-control" id="current_password">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Re-type password:</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
      </div>
  
    </div>
</div>

</header><!-- /header -->
<!-- Header-->