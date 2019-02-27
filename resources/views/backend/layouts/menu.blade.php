<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img
            class="app-sidebar__user-avatar"
            src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
            alt="User Image"
        >
        <div>
            <p class="app-sidebar__user-name">User Name</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item active" href="{{asset('/admin/home')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">User</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="bootstrap-components.html">
                        <i class="icon fa fa-circle-o"></i>
                        List User
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener">
                        <i class="icon fa fa-circle-o"></i> Create User
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('banner.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Banner</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('banner.index')}}">
                        <i class="icon fa fa-circle-o"></i> List Banner
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('banner.create')}}">
                        <i class="icon fa fa-circle-o"></i>Create Banner
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Gallery</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="#">
                        <i class="icon fa fa-circle-o"></i> List Gallery
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('gallery.create')}}">
                        <i class="icon fa fa-circle-o"></i>Create Gallery
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label">Gallery Detail</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="table-basic.html">
                        <i class="icon fa fa-circle-o"></i>List Gallery Detail
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('gallery_detail.create') }}">
                        <i class="icon fa fa-circle-o"></i> Create Gallery Detail
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="charts.html">
                <i class="app-menu__icon fa fa-pie-chart"></i>
                <span class="app-menu__label">Charts</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Forms</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="form-components.html">
                        <i class="icon fa fa-circle-o"></i> Form Components
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="form-custom.html">
                        <i class="icon fa fa-circle-o"></i> Custom Components
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="form-samples.html">
                        <i class="icon fa fa-circle-o"></i> Form Samples
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="form-notifications.html">
                        <i class="icon fa fa-circle-o"></i> Form Notifications
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label">Tables</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="table-basic.html">
                        <i class="icon fa fa-circle-o"></i> Basic Tables
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="table-data-table.html">
                        <i class="icon fa fa-circle-o"></i> Data Tables
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-file-text"></i>
                <span class="app-menu__label">Pages</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="blank-page.html">
                        <i class="icon fa fa-circle-o"></i> Blank Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-login.html">
                        <i class="icon fa fa-circle-o"></i> Login Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-lockscreen.html">
                        <i class="icon fa fa-circle-o"></i>
                        Lockscreen Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-user.html">
                        <i class="icon fa fa-circle-o"></i> User Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-invoice.html">
                        <i class="icon fa fa-circle-o"></i> Invoice Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-calendar.html">
                        <i class="icon fa fa-circle-o"></i> Calendar Page
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-mailbox.html">
                        <i class="icon fa fa-circle-o"></i>
                        Mailbox
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="page-error.html">
                        <i class="icon fa fa-circle-o"></i> Error
                        Page
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
