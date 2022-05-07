@php
    $userGuard = Auth::guard('web')->user();
@endphp
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('backend/assets/images/logo/logo.png') }}"
                            alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active ">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Admin management</li>
                {{-- Role Crud --}}
                @if ( $userGuard->can('role.view') || $userGuard->can('role.create') || $userGuard->can('role.edit') || $userGuard->can('role.delete'))
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Roles</span>
                    </a>
                    <ul class="submenu" {{ Route::is('admin.roles.create') || Route::is('admin.roles.edit') || Route::is('admin.roles.index') ? 'style=display:block;' : '' }} >
                        <li class="submenu-item ">
                            @if ( $userGuard->can('role.view'))
                            <a {{  Route::is('admin.roles.edit') || Route::is('admin.roles.index') ? 'style=color:#435ebe;' : '' }}  href="{{ route('admin.roles.index') }}">Role's</a>
                            @endif
                            @if ( $userGuard->can('role.create'))
                            <a {{  Route::is('admin.roles.create') ? 'style=color:#435ebe;' : '' }} href="{{ route('admin.roles.create') }}">Create Role</a>
                            @endif
                        </li>
                    </ul>
                </li>
                @endif
                {{-- Permission --}}
                @if ( $userGuard->can('admin.view') || $userGuard->can('admin.create') || $userGuard->can('admin.edit') || $userGuard->can('admin.delete'))
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>User's</span>
                    </a>
                    <ul class="submenu" {{ Route::is('admin.users.create') || Route::is('admin.users.edit') || Route::is('admin.users.index') ? 'style=display:block;' : '' }} >
                        <li class="submenu-item ">
                            @if ( $userGuard->can('admin.view'))
                            <a {{  Route::is('admin.users.edit') || Route::is('admin.users.index') ? 'style=color:#435ebe;' : '' }}  href="{{ route('admin.users.index') }}">User's</a>
                            @endif
                            @if ( $userGuard->can('admin.create'))
                            <a {{  Route::is('admin.users.create') ? 'style=color:#435ebe;' : '' }} href="{{ route('admin.users.create') }}">Create User's</a>
                            @endif
                        </li>
                    </ul>
                </li>
                @endif
                <li class="sidebar-title">User Management</li>
                 {{-- customer --}}
                 @if ( $userGuard->can('customer.view') || $userGuard->can('customer.create') || $userGuard->can('customer.edit') || $userGuard->can('customer.delete'))
                 <li class="sidebar-item  has-sub">
                     <a href="#" class='sidebar-link'>
                         <i class="bi bi-stack"></i>
                         <span>customer's</span>
                     </a>
                     <ul class="submenu" {{ Route::is('admin.customers.create') || Route::is('admin.customers.edit') || Route::is('admin.customers.index') ? 'style=display:block;' : '' }} >
                         <li class="submenu-item ">
                             @if ( $userGuard->can('customer.view'))
                             <a {{  Route::is('admin.customers.edit') || Route::is('admin.customers.index') ? 'style=color:#435ebe;' : '' }}  href="{{ route('admin.customers.index') }}">customer's</a>
                             @endif
                             @if ( $userGuard->can('customer.create'))
                             <a {{  Route::is('admin.customers.create') ? 'style=color:#435ebe;' : '' }} href="{{ route('admin.customers.create') }}">Create customer</a>
                             @endif
                         </li>
                     </ul>
                 </li>
                 @endif

                <li class="sidebar-title">Package Management</li>
                {{-- package --}}
                @if ( $userGuard->can('package.view') || $userGuard->can('package.create') || $userGuard->can('package.edit') || $userGuard->can('package.delete'))
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Package's</span>
                    </a>
                    <ul class="submenu" {{ Route::is('admin.packages.create') || Route::is('admin.packages.edit') || Route::is('admin.packages.index') ? 'style=display:block;' : '' }} >
                        <li class="submenu-item ">
                            @if ( $userGuard->can('package.view'))
                            <a {{  Route::is('admin.packages.edit') || Route::is('admin.packages.index') ? 'style=color:#435ebe;' : '' }}  href="{{ route('admin.packages.index') }}">Packages's</a>
                            @endif
                            @if ( $userGuard->can('package.create'))
                            <a {{  Route::is('admin.packages.create') ? 'style=color:#435ebe;' : '' }} href="{{ route('admin.packages.create') }}">Create package</a>
                            @endif
                        </li>
                    </ul>
                </li>
                @endif<li class="sidebar-title">Channel Management</li>

                {{-- channel --}}
                 @if ( $userGuard->can('channel.view') || $userGuard->can('channel.create') || $userGuard->can('channel.edit') || $userGuard->can('channel.delete'))
                 <li class="sidebar-item  has-sub">
                     <a href="#" class='sidebar-link'>
                         <i class="bi bi-stack"></i>
                         <span>channel's</span>
                     </a>
                     <ul class="submenu" {{ Route::is('admin.channels.create') || Route::is('admin.channels.edit') || Route::is('admin.channels.index') ? 'style=display:block;' : '' }} >
                         <li class="submenu-item ">
                             @if ( $userGuard->can('channel.view'))
                             <a {{  Route::is('admin.channels.edit') || Route::is('admin.channels.index') ? 'style=color:#435ebe;' : '' }}  href="{{ route('admin.channels.index') }}">channel's</a>
                             @endif
                             @if ( $userGuard->can('channel.create'))
                             <a {{  Route::is('admin.channels.create') ? 'style=color:#435ebe;' : '' }} href="{{ route('admin.channels.create') }}">Create channel</a>
                             @endif
                         </li>
                     </ul>
                 </li>
                 @endif
                 {{-- channel_post --}}
                 @if ( $userGuard->can('channel_post.view') || $userGuard->can('channel_post.create') || $userGuard->can('channel_post.edit') || $userGuard->can('channel_post.delete'))
                 <li class="sidebar-item  has-sub">
                     <a href="#" class='sidebar-link'>
                         <i class="bi bi-stack"></i>
                         <span>Channel Post's</span>
                     </a>
                     <ul class="submenu" {{ Route::is('admin.channel.posts.create') || Route::is('admin.channel.posts.edit') || Route::is('admin.channel.posts.index') ? 'style=display:block;' : '' }} >
                         <li class="submenu-item ">
                             @if ( $userGuard->can('channel_post.view'))
                             <a {{  Route::is('admin.channel.posts.edit') || Route::is('admin.channel.posts.index') ? 'style=color:#435ebe;' : '' }}  href="{{ route('admin.channel.posts.index') }}">Channel Post's</a>
                             @endif
                             @if ( $userGuard->can('channel_post.create'))
                             <a {{  Route::is('admin.channel.posts.create') ? 'style=color:#435ebe;' : '' }} href="{{ route('admin.channel.posts.create') }}">Create Channel Post</a>
                             @endif
                         </li>
                     </ul>
                 </li>
                 @endif






                <li class="sidebar-title">Raise Support</li>





                <li class="sidebar-item  ">

                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <dt class="the-icon"><span class="fa-fw select-all fas"></span>
                            <button style="    background: white;
                            border: 1px solid white;
                        }" type="submit"> Logout</button>
                        </dt>
                        </form>

                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
