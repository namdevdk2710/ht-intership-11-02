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
            <a class="app-menu__item active" href="{{ asset('/admin/home') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('user.index') }}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">User</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('user.index') }}">
                        <i class="icon fa fa-circle-o"></i>
                        List User
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('user.create') }}" rel="noopener">
                        <i class="icon fa fa-circle-o"></i> Create User
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('banner.index') }}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Banner</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('banner.index') }}">
                        <i class="icon fa fa-circle-o"></i> List Banner
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('banner.create') }}">
                        <i class="icon fa fa-circle-o"></i>Create Banner
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('gallery.index') }}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Gallery</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('gallery.index') }}">
                        <i class="icon fa fa-circle-o"></i> List Gallery
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('gallery.create') }}">
                        <i class="icon fa fa-circle-o"></i>Create Gallery
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('gallery_detail.index') }}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label">Gallery Detail</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('gallery_detail.index') }}">
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
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('gallery.index') }}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Module</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('module.index') }}">
                        <i class="icon fa fa-circle-o"></i> List Module
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('module.create') }}">
                        <i class="icon fa fa-circle-o"></i>Create Module
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('cuisine.index') }}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Cuisine</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('cuisine.index') }}">
                        <i class="icon fa fa-circle-o"></i> List Cuisine
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('cuisine.create') }}">
                        <i class="icon fa fa-circle-o"></i>Create cuisine
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('cuisine_detail.index') }}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label">Cuisine Detail</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('cuisine_detail.index') }}">
                        <i class="icon fa fa-circle-o"></i>List Cuisine Detail
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('cuisine_detail.create') }}">
                        <i class="icon fa fa-circle-o"></i> Create Cuisine Detail
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{ route('facilitie.index') }}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-edit"></i>
                <span class="app-menu__label">Facilitie</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('facilitie.index') }}">
                        <i class="icon fa fa-circle-o"></i> List Facilitie
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('facilitie.create') }}">
                        <i class="icon fa fa-circle-o"></i>Create facilitie
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
                <a class="app-menu__item" href="{{ route('facilitie_detail.index') }}" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">Facilitie Detail</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('facilitie_detail.index') }}">
                            <i class="icon fa fa-circle-o"></i>List Facilitie Detail
                        </a>
                    </li>
                    <li>
                        <a class="treeview-item" href="{{ route('facilitie_detail.create') }}">
                            <i class="icon fa fa-circle-o"></i> Create Facilitie Detail
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
