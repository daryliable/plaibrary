<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        @if(!is_null(Auth::user()->profile->image_url))
        <img class="app-sidebar__user-avatar"  src="{{ URL::asset('images/user_images/' . Auth::user()->profile->image_url) }}" width="48" height="48" alt="User Image">
        @else
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="app-sidebar__user-avatar" alt="avatar" width="48" height="48">
        @endif
        <div>
          <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
          <p class="app-sidebar__user-designation">Librarian</p>
        </div>
      </div>
      <ul class="app-menu ">
          <li class="treeview"><a class="app-menu__item {{ Request::path() ==  'librarian_dashboard' ? 'active' : ''  }}" href="{{ route('librarian.dashboard') }}" ><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Dashboard</span><i class="app-menu__label"></i></a>
          <li class=""><a class="app-menu__item {{ Request::path() ==  'view_book' ? 'active' : ''  }}" href="{{ url('/view_book')}}"><i class="app-menu__icon  fa fa-file-text "></i><span class="app-menu__label">Book Management</span></a></li>
            <li class=""><a class="app-menu__item {{ Request::path() ==  'pending' ? 'active' : ''  }}" href="{{ url('/pending')}}"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pending Appointment</span></a></li>
           <li class=""><a class="app-menu__item {{ Request::path() ==  'reserved' ? 'active' : ''  }}" href="{{ url('/reserved')}}"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Appointment</span></a></li>
          <!-- <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Add Books</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul> -->
        </li>
        
        
        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Add Reservation</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Add Reservations</a></li>
            <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>
            <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>
            <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>
          </ul>
        </li> -->
        
        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>
            <li><a class="treeview-item" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
            <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
            <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
            <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
            <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
          </ul>
        </li> -->
      </ul>
    </aside>