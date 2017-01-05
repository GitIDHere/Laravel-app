<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
        <link rel="stylesheet" href="/css/libs.css">

    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Seller Portal</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                      <li>
                        <a href="{{ url('/my-account') }}">My Account</a>
                      </li>
                      <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
                          </a>
                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <div class="container-fluid">
          <div class="row">

            <!-- Sidenav -->
            <div class="col-sm-3 col-md-2 sidebar">
              <ul class="nav nav-sidebar">
                <li class="{{ Request::is('seller-dashboard') ? 'active' : '' }}"><a href="{{ url('seller-dashboard') }}">Overview <span class="sr-only">(current)</span></a></li>
                <li class="{{ Request::is('products') ? 'active' : '' }}"><a href="{{ url('products') }}">My Products</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Export</a></li>
              </ul>
              <ul class="nav nav-sidebar">
                <li><a href="">Nav item</a></li>
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
                <li><a href="">More navigation</a></li>
              </ul>
              <ul class="nav nav-sidebar">
                <li><a href="">Nav item again</a></li>
                <li><a href="">One more nav</a></li>
                <li><a href="">Another nav item</a></li>
              </ul>
            </div>
            <!-- Sidenav -->

            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
              @yield('content')
            </div>

          </div>
        </div>

        <!-- Scripts -->
        <script src="{{ elixir('js/app.js') }}"></script>
        <script src="/js/libs.js"></script>
        
        @include('partials.flash')

        @yield('scripts.footer')

    </body>
</html>
