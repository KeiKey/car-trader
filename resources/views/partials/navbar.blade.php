<nav @class([
                'navbar navbar-expand-md shadow-sm',
                'navbar-light bg-white' => !str_contains(url()->current(), 'panel'),
                'navbar-dark bg-dark' => str_contains(url()->current(), 'panel')
            ])>
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.orders.index', ['user' => auth()->user()]) }}">{{ __('general.my_orders') }}</a>
                    </li>
                @endauth

                @can('manage_vehicles')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('vehicles.index') }}">{{ __('general.vehicles') }}</a>
                    </li>
                @endcan

                @can('manage_categories')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">{{ __('general.categories') }}</a>
                    </li>
                @endcan

                @can('manage_orders')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orders.index') }}">{{ __('general.orders') }}</a>
                    </li>
                @endcan

                @can('manage_users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">{{ __('general.users') }}</a>
                    </li>
                @endcan

                @can('manage_roles')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('roles.index') }}">{{ __('general.roles') }}</a>
                    </li>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

                <livewire:cart-component />
            </ul>
        </div>
    </div>
</nav>
