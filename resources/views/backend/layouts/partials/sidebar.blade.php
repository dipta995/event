@php
    $userGuard = Auth::guard('web')->user();
@endphp
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href=""><img src="{{ asset('backend/assets/images/logo/logo.png') }}"
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
                    <a href="" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
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

                {{-- User --}}
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



                {{-- Report --}}
                @if ( $userGuard->can('report.view') || $userGuard->can('report.create') || $userGuard->can('report.edit') || $userGuard->can('report.delete'))
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Report's</span>
                        </a>
                        <ul class="submenu" {{ Route::is('admin.reports.create') || Route::is('admin.reports.edit') || Route::is('admin.reports.index') ? 'style=display:block;' : '' }} >
                            <li class="submenu-item ">
                                @if ( $userGuard->can('report.view'))
                                    <a {{  Route::is('admin.reports.edit') || Route::is('admin.reports.index') ? 'style=color:#435ebe;' : '' }}  href="{{ route('admin.reports.index') }}">Report's</a>
                                @endif
{{--                                @if ( $userGuard->can('report.create'))--}}
{{--                                    <a {{  Route::is('admin.reports.create') ? 'style=color:#435ebe;' : '' }} href="{{ route('admin.reports.create') }}">Create Report's</a>--}}
{{--                                @endif--}}
                            </li>
                        </ul>
                    </li>
                @endif



                {{-- Report --}}
                @if ( $userGuard->can('channel_payment.view') || $userGuard->can('channel_payment.create') || $userGuard->can('channel_payment.edit') || $userGuard->can('channel_payment.delete'))
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Channel Payments's</span>
                        </a>
                        <ul class="submenu" {{ Route::is('admin.channel.payments.create') || Route::is('admin.channel.payments.edit') || Route::is('admin.channel.payments.index') ? 'style=display:block;' : '' }} >
                            <li class="submenu-item ">
                                @if ( $userGuard->can('channel_payment.view'))
                                    <a {{  Route::is('admin.channel.payments.edit') || Route::is('admin.channel.payments.index') ? 'style=color:#435ebe;' : '' }}  href="{{ route('admin.channel.payments.index') }}">Channel Payment's</a>
                                @endif
{{--                                @if ( $userGuard->can('channel_payment.create'))--}}
{{--                                    <a {{  Route::is('admin.channel.payments.create') ? 'style=color:#435ebe;' : '' }} href="{{ route('admin.channel.payments.create') }}">Create Channel Payment's</a>--}}
{{--                                @endif--}}
                            </li>
                        </ul>
                    </li>
                @endif




                <li class="sidebar-item  ">

                    <form method="POST" action="{{ route('admin.logout.submit') }}" x-data>
                        @csrf
                        {{--                                <i class="bi bi-emoji-frown-fill"></i>--}}
                        <button type="submit" class="btn-primary  bi-emoji-frown-fill text-uppercase p-1 ">Log Out</button>
                    </form>

                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
