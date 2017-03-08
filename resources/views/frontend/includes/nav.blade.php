<ul class="nav navbar-nav navbar-right">
    @if (config('locale.status') && count(config('locale.languages')) > 1)
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ trans('menus.language-picker.language') }}
                <span class="caret"></span>
            </a>
            @include('includes.partials.lang')
        </li>
    @endif

    @if (access()->guest())
        <li>{{ link_to('login', trans('navs.frontend.login')) }}</li>
        <li>{{ link_to('register', trans('navs.frontend.register')) }}</li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ access()->user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li>

                @if (access()->user()->canChangePassword())
                    <li>{{ link_to_route('auth.password.change', trans('navs.frontend.user.change_password')) }}</li>
                @endif

                @permission('view-backend')
                <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                @endauth

                <li>{{ link_to_route('auth.logout', trans('navs.general.logout')) }}</li>
            </ul>
        </li>
    @endif
</ul>
