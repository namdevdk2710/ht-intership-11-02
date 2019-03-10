<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img
            class="app-sidebar__user-avatar"
            src="../uploads/images/users/@if(Auth::user()){{Auth::user()->avatar}}@endif"
            alt="User Image"
            style="height:5em; width:5em;"
        >
        <div>
            <p class="app-sidebar__user-name">@if(Auth::user()){{Auth::user()->name}} @endif</p>
            <p class="app-sidebar__user-designation">@if(Auth::user()){{Auth::user()->email}} @endif</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item active" href="{{route('home.index')}}">
                <i class="app-menu__icon fa fa-home fa-lg"></i>
                <span class="app-menu__label">Home</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('user.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">User</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('user.index')}}">
                        <i class="icon fa fa-circle-o"></i>
                        List User
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('user.create')}}" rel="noopener">
                        <i class="icon fa fa-circle-o"></i> Create User
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('banner.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
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
            <a class="app-menu__item" href="{{route('gallery.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Gallery</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('gallery.index')}}">
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
            <a class="app-menu__item" href="{{route('gallery_detail.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Gallery Detail</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('gallery_detail.index')}}">
                        <i class="icon fa fa-circle-o"></i>List Gallery Detail
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('gallery_detail.create')}}">
                        <i class="icon fa fa-circle-o"></i> Create Gallery Detail
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('gallery.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Module</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('module.index')}}">
                        <i class="icon fa fa-circle-o"></i> List Module
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('module.create')}}">
                        <i class="icon fa fa-circle-o"></i>Create Module
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('cuisine.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Cuisine</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('cuisine.index')}}">
                        <i class="icon fa fa-circle-o"></i> List Cuisine
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('cuisine.create')}}">
                        <i class="icon fa fa-circle-o"></i>Create cuisine
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('cuisine_detail.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label">Cuisine Detail</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('cuisine_detail.index')}}">
                        <i class="icon fa fa-circle-o"></i>List Cuisine Detail
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('cuisine_detail.create')}}">
                        <i class="icon fa fa-circle-o"></i> Create Cuisine Detail
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('facilitie.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Facilitie</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('facilitie.index')}}">
                        <i class="icon fa fa-circle-o"></i> List Facilitie
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('facilitie.create')}}">
                        <i class="icon fa fa-circle-o"></i>Create facilitie
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('facilitie_detail.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label">Facilitie Detail</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('facilitie_detail.index')}}">
                        <i class="icon fa fa-circle-o"></i>List Facilitie Detail
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('facilitie_detail.create')}}">
                        <i class="icon fa fa-circle-o"></i> Create Facilitie Detail
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('room_service.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Room Service</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('room_service.index')}}">
                        <i class="icon fa fa-circle-o"></i> List Room Service
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('room_service.create')}}">
                        <i class="icon fa fa-circle-o"></i>Create Room Service
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="{{route('room.index')}}" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Room</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{route('room.index')}}">
                        <i class="icon fa fa-circle-o"></i> List Room
                    </a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('room.create')}}">
                        <i class="icon fa fa-circle-o"></i>Create Room
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('contact.index')}}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Contact</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('offer.index')}}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Offer</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('introduce.index')}}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Introduce</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('about.index')}}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">About</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{route('destination.index')}}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Destination</span>
            </a>
        </li>
    </ul>
</aside>
