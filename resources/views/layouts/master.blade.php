<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <a class="navbar-brand" href="#"><img src="/assets/images/logo.png" width="100px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/product') }}">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/feature') }}">Features</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul>
              <span class="navbar-text">
                <a href="{{ url('/lang/en') }}" class="btn @if(App::getLocale() == 'en') btn-danger @endif btn-sm">EN</a>
                <a href="{{ url('/lang/km') }}" class="btn @if(App::getLocale() == 'km') btn-danger @endif btn-sm">KM</a>
              </span>
            </div>
        </nav>

          {{-- Everything will go here --}}
          @yield('content')


          <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted mt-5">

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        </div>

       
    </body>
</html>