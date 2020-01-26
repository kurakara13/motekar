<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{route('home')}}">
          <h1 class="green" style="color:#038207"><strong>MOTEKAR</strong></h1>
        </a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong> {{Auth::user()->name}} </strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="#"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="#"><i class="icon-envelope-open"></i>Messages</a></li>
                    <!-- <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li> -->
                    <li class="divider"></li>
                    <li>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          <i class="icon-power"></i>Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- SIDE  BAR MENU -->
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
            @if(Auth::guard('admin')->check())
            <li class=""><a href="{{route('admin.inovator.list')}}"><i class="fa fa-smile-o"></i><span>The Innovators</span></a></li>
            <li class=""><a href="{{route('admin.unit.list')}}"><i class="fa fa-archive"></i><span>Units</span></a></li>
            @else
            <li class=""><a href="{{route('home')}}"><i class="fa fa-home"></i><span>Home</span></a></li>
            <li class="{{ Request::segment(1) === 'problem' ? 'active open' : null }}">
                <a href="#Project" class="has-arrow"><i class="fa fa-fire"></i><span>Problem</span></a>
                <ul>
                    <li class="{{ Request::segment(2) === 'newproblem' ? 'active' : null }}"><a href="{{route('problem.newproblem')}}">Submit New Problem</a></li>
                    <li class="{{ Request::segment(2) === 'myproblemlist' ? 'active' : null }}"><a href="{{route('problem.myproblemlist')}}">My Problem List</a></li>
                    <li class="{{ Request::segment(2) === 'problempool' ? 'active' : null }}"><a href="{{route('problem.problempool')}}">Problem Pool</a></li>
                </ul>
            </li>
            <li class="{{ Request::segment(1) === 'project' ? 'active open' : null }}">
              <a href="#" class="has-arrow"><i class="fa fa-gears"></i><span>Project</span></a>
              <ul>
                  <li class="{{ Request::segment(2) === 'myproject' ? 'active' : null }}"><a href="{{route('project.myproject')}}">My Project</a></li>
              </ul>
            </li>
            <li class="{{ Request::segment(1) === 'knowledge' ? 'active open' : null }}"><a href="{{route('knowledge')}}"><i class="fa fa-lightbulb-o"></i><span>Knowledge Pool</span></a></li>
            <li class=""><a href="{{route('inovator.list')}}"><i class="fa fa-smile-o"></i><span>The Innovators</span></a></li>
            <li class=""><a href="#"><i class="fa fa-book"></i><span>Contact</span></a></li>
            @endif
        </nav>
    </div>
</div>
