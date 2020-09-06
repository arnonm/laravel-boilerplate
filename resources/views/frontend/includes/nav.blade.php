<nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: darkorange">

    {{--  Hamberger button for Mobile      --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" a
            ria-expanded="false" aria-label="@lang('global.Toggle navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <x-utils.link
            :href="route('frontend.index')"
            :text="trans('global.AppName') ?? appName()"
            class="navbar-brand"/>

        <ul class="navbar-nav {{ session()->has('lang-rtl') ? 'mr-auto' : 'ml-auto' }}  mt-2 mt-lg-0">
            @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
                <li class="nav-item dropdown">
                    <x-utils.link
                        :text="__(getLocaleName(app()->getLocale()))"
                        class="nav-link dropdown-toggle text-white"
                        id="navbarDropdownLanguageLink"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"/>

                    @include('includes.partials.lang')
                </li>
            @endif


            @guest
                <li class="nav-item">
                    <x-utils.link
                        :href="route('frontend.auth.login')"
                        :active="activeClass(Route::is('frontend.auth.login'))"
                        :text="__('global.Login')"
                        class="nav-link text-white"/>
                </li>

                @if (config('boilerplate.access.user.registration'))
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.auth.register')"
                            :active="activeClass(Route::is('frontend.auth.register'))"
                            :text="__('global.Register')"
                            class="nav-link text-white"/>

                    </li>
                @endif
            @else

                <li class="nav-item dropdown">
                    <x-utils.link
                        href="#"
                        id="navbarDropdown"
                        class="nav-link dropdown-toggle text-white"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <x-slot name="text">
                            <img class="rounded-circle" style="max-height: 20px"
                                 src="{{ $logged_in_user->details->avatar_icon }}"/>
                            <span class="text-white">
                                    {{ $logged_in_user->name }}
                                </span>
                            <span class="caret"></span>
                        </x-slot>
                    </x-utils.link>

                    <div
                        class="dropdown-menu {{ session()->has('lang-rtl') ? 'dropdown-menu-left' : 'dropdown-menu-left' }}  aria-labelledby="
                        navbarDropdown
                    ">
                    @if ($logged_in_user->isAdmin())
                        <x-utils.link
                            :href="route('admin.dashboard')"
                            :text="__('global.Administration')"
                            class="dropdown-item"/>
                    @endif

                    @if ($logged_in_user->isUser())
                        <x-utils.link
                            :href="route('frontend.user.dashboard')"
                            :active="activeClass(Route::is('frontend.user.dashboard'))"
                            :text="__('global.Dashboard')"
                            class="dropdown-item"/>
                    @endif

                    <x-utils.link
                        :href="route('frontend.user.account')"
                        :active="activeClass(Route::is('frontend.user.account'))"
                        :text="__('global.My Account')"
                        class="dropdown-item"/>

                    <x-utils.link
                        :text="__('Logout')"
                        class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            @lang('global.Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none"/>
                        </x-slot>
                    </x-utils.link>
    </div>
    </li>
    @endguest
    </ul>
    </div><!--container-->
</nav>

@if (config('boilerplate.frontend_breadcrumbs'))
    @include('frontend.includes.partials.breadcrumbs')
@endif
