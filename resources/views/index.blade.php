<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <title>Deeper Photos</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>

    <!-- lightboxed -->
    <link rel="stylesheet" type="text/css" href="js/lightboxed/lightboxed.css">
  </head>

  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
      <!--
      @if (Route::has('login'))
          <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
              @auth
                  <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
              @else
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                  @endif
              @endauth
          </div>
      @endif
      -->

      <!-- Header -->
      <header id="header">
        <div class="intro text-center">
          <div class="overlay">
            <div class="container">
              <div class="row">
                <div class="intro-text">
                  <h1>Deeper Photos</h1>
                  <p>
                    Fotos do ministério Deeper
                  </p>
                </div>
              </div>
              
              @yield('body')
            </div>
          </div>
        </div>
      </header>

      <!-- Navigation -->
      <div id="nav">
        <nav class="navbar navbar-custom">
          @auth
            <div class="card col-md-12 text-center">
              <div class="card-header">
                <h3 class="alert-success">Olá, {{ Auth::user()->name }}</h3>
              </div>
            </div>
          @endauth

          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse"> <i class="fa fa-bars"></i> </button>
            </div>
            
            <div class="collapse navbar-collapse navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li class="hidden"> <a href="#page-top"></a> </li>
                <li> <a class="page-scroll" href="./#header">Home</a> </li>
                <!-- <li> <a class="page-scroll" href="sendPhoto">Fotos</a> </li> -->
                @auth
                  <li> <a class="page-scroll" href="createAlbum">Criar Álbum</a> </li>
                  <li> <a class="page-scroll" href="logout">Logout</a> </li>
                  @else
                  <li> <a class="page-scroll" href="login">Login</a> </li>
                @endauth
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/enviarEmail.js"></script>
      <script type="text/javascript" src="js/SmoothScroll.js"></script>
      <script type="text/javascript" src="js/easypiechart.js"></script>
      <script type="text/javascript" src="js/jquery.isotope.js"></script>
      <script type="text/javascript" src="js/jquery.counterup.js"></script>
      <script type="text/javascript" src="js/waypoints.js"></script>
      <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="js/modernizr.custom.js"></script>

      <!-- lightboxed -->
      <script type="text/javascript" src="js/lightboxed/lightboxed.js"></script>

      <script type="text/javascript">
        $(function() {})
      </script>
    </div>
  </body>
</html>
