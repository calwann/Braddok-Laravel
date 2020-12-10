<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <title>Braddok - @yield('title')</title>
</head>

<body>
    <header>
        @auth
            <ul id="dropdown-nav-1" class="dropdown-content">
                <li><a href="{{ route('conf.index') }}">Atualizar cadastro</a></li>
                <li><a href="{{ route('conf.index') }}">Trocar senha</a></li>
                <li><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
            <nav class="grey darken-4">
                <div id="nav-wrapper" class="nav-wrapper">
                    <a id="brand-logo" href="{{ route($__env->yieldContent('index')) }}"
                        class="brand-logo truncate tooltipped" data-position="bottom"
                        data-tooltip="Início">@yield('subtitle')</a>
                    <a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="dropdown-trigger" data-target="dropdown-nav-1">{{ $patentNickname }}<i
                                    class="material-icons right">arrow_drop_down</i></a></li>
                        <li class="li-nav-items"><a href="{{ route('home.index') }}"><span
                                    class="nav-items">Aplicativos</span><i class="material-icons right">home</i></a></li>
                        <li class="li-nav-items"><a href="{{ route('panel.index') }}"><span
                                    class="nav-items">Painel</span><i class="material-icons right">settings</i></a></li>
                        <li><a class="nav-search-trigger"><i class="material-icons">search</i></a></li>
                    </ul>
                </div>
            </nav>
            <nav id="nav-search" class="grey darken-4 scale-transition scale-out">
                <div class="nav-wrapper container">
                    <form method="POST" action="">
                        <div class="input-field">
                            <input id="search" type="search" name="search" required>
                            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                            <i class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
            <ul class="sidenav" id="mobile-demo">
                <div id="sidenav-mobile-div">
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li>
                                <a class="collapsible-header">{{ $patentNickname }}<i
                                        class="material-icons">arrow_drop_down</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="{{ route('conf.index') }}">Atualizar cadastro</a></li>
                                        <li><a href="{{ route('conf.index') }}">Trocar senha</a></li>
                                        <li><a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('home.index') }}">Início<i class="material-icons">home</i></a></li>
                    <li><a href="{{ route('panel.index') }}">Painel<i class="material-icons">settings</i></a></li>
                    <li><a class="nav-search-trigger">Pesquisar<i class="material-icons">search</i></a></a></li>
                    <div class="divider"></div>
                </div>
                @if ($__env->yieldContent('index') == 'concierge.index')
                    <div id="sidenav-concierge-div">
                        <li><a href="{{ route('concierge.dash') }}">Dashboard<i class="material-icons">dashboard</i></a>
                        </li>
                        <li class="no-padding">
                            <ul class="collapsible collapsible-accordion">
                                <li class="active">
                                    <a class="collapsible-header">Lançar<i class="material-icons">border_color</i></a>
                                    <div class="collapsible-body">
                                        <ul>
                                            <li><a href="{{ route('concierge.collaborators') }}">Militares<i
                                                        class="material-icons">subdirectory_arrow_right</i></a></li>
                                            <li><a href="{{ route('concierge.visitors') }}">Visitantes<i
                                                        class="material-icons">subdirectory_arrow_right</i></a></li>
                                            <li><a href="{{ route('concierge.vehicles') }}">Viaturas<i
                                                        class="material-icons">subdirectory_arrow_right</i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('concierge.reports') }}">Relatórios<i
                                    class="material-icons">assignment</i></a></li>
                        <div class="divider"></div>
                    </div>
                @elseif($__env->yieldContent('index') == 'restaurant.index')
                    <div id="sidenav-restaurant-div">
                        <li><a href="{{ route('restaurant.dash') }}">Dashboard<i class="material-icons">dashboard</i></a>
                        </li>
                        <li><a href="{{ route('restaurant.register') }}">Arranchar<i
                                    class="material-icons">border_color</i></a></li>
                        <li><a href="{{ route('restaurant.reports') }}">Relatórios<i
                                    class="material-icons">assignment</i></a></li>
                        <div class="divider"></div>
                    </div>
                @elseif($__env->yieldContent('index') == 'performance.index')
                    <div id="sidenav-performance-div">
                        <li><a href="{{ route('performance.dash') }}">Dashboard<i class="material-icons">dashboard</i></a>
                        </li>
                        <li><a href="{{ route('performance.register') }}">Registrar FO<i
                                    class="material-icons">border_color</i></a></li>
                        <li><a href="{{ route('performance.reports') }}">Relatórios<i
                                    class="material-icons">assignment</i></a></li>
                        <div class="divider"></div>
                    </div>
                @elseif($__env->yieldContent('index') == 'registers.index')
                    <div id="sidenav-register-div">
                        <li><a href="{{ route('registers.dash') }}">Dashboard<i class="material-icons">dashboard</i></a>
                        </li>
                        <li><a href="{{ route('registers.reports') }}">Relatórios<i
                                    class="material-icons">assignment</i></a></li>
                        <div class="divider"></div>
                    </div>
                @elseif($__env->yieldContent('index') == 'helpdesk.index')
                    <div id="sidenav-helpdesk-div">
                        <li><a href="{{ route('helpdesk.dash') }}">Dashboard<i class="material-icons">dashboard</i></a></li>
                        <li><a href="{{ route('helpdesk.request') }}">Chamados<i class="material-icons">assignment</i></a>
                        </li>
                        <li><a href="{{ route('helpdesk.support') }}">Suporte<i class="material-icons">laptop_mac</i></a>
                        </li>
                        <div class="divider"></div>
                    </div>
                @endif
            </ul>
        @endauth
    </header>

    <main style="min-height: 40rem">
        @yield('content')

        @if ($errors->any())
            <script>
                $(document).ready(function() {
                    M.toast({
                        html: "{!!  implode('', $errors->all('<div>:message</div>')) !!}",
                        classes: 'rounded'
                    });
                });

            </script>
        @endif

        @if (session('status'))
            <script>
                $(document).ready(function() {
                    M.toast({
                        html: "{{ session('status') }}",
                        classes: 'rounded'
                    });
                });

            </script>
        @endif
    </main>

    <footer class="page-footer grey darken-4">
        <div id="footer-container" class="container hide">
            <div class="row">
                <div class="col s12">
                    <h5 class="white-text">Aplicativos</h5>
                    <table class="centered">
                        <tbody>
                            <tr>
                                <td><a class="grey-text text-lighten-3"
                                        href="{{ route('concierge.index') }}">Segurança</a></td>
                                <td><a class="grey-text text-lighten-3"
                                        href="{{ route('restaurant.index') }}">Arranchamento</a></td>
                                <td><a class="grey-text text-lighten-3"
                                        href="{{ route('performance.index') }}">Caverinha</a></td>
                            </tr>
                            <tr>
                                <td><a class="grey-text text-lighten-3" href="{{ route('registers.index') }}">Plano de
                                        Chamada</a></td>
                                <td><a class="grey-text text-lighten-3" href="{{ route('helpdesk.index') }}">Help
                                        Desk</a></td>
                                <td><a class="grey-text text-lighten-3"
                                        href="{{ route('birthday.index') }}">Aniversariantes</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <a href="https://github.com/calwann">
                    © Desenvolvido por Calwann Freire
                </a>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/functions.js') }}"></script>

</body>

</html>
