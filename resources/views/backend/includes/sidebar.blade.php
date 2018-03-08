<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                    </ul>
                </li>

            {{--2--}}
            @endif

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth/category*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i> {{ __('labels.backend.access.category.title') }}

                    @if ($pending_approval > 0)
                        <span class="badge badge-danger">{{ $pending_approval }}</span>
                    @endif
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('category/*')) }}" href="{{ route('backend.category.index') }}">
                            {{ __('labels.backend.access.category.all') }}

                            {{--@if ($pending_approval > 0)--}}
                            {{--<span class="badge badge-danger">{{ $pending_approval }}</span>--}}
                            {{--@endif--}}
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link {{ active_class(Active::checkUriPattern('category/*')) }}" href="{{ route('backend.category.approve') }}">--}}
                    {{--{{ __('labels.backend.access.category.approve') }}--}}
                    {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>

            {{--3--}}
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('post/*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fa fa-calendar-minus-o" aria-hidden="true"></i> {{ __('labels.backend.access.post.title') }}

                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('category/*')) }}" href="{{route('backend.post.index')}}">
                        {{ __('labels.backend.access.post.all') }}

                        {{--@if ($pending_approval > 0)--}}
                        {{--<span class="badge badge-danger">{{ $pending_approval }}</span>--}}
                        {{--@endif--}}
                        </a>
                    </li>
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link {{ active_class(Active::checkUriPattern('post/*')) }}" href="{{ route('backend.post.approve') }}">--}}
                    {{--{{ __('labels.backend.access.post.approve') }}--}}
                    {{--</a>--}}
                    {{--</li>--}}
                </ul>
            </li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="icon-list"></i> {{ __('menus.backend.log-viewer.main') }}
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                            {{ __('menus.backend.log-viewer.dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                            {{ __('menus.backend.log-viewer.logs') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div><!--sidebar-->