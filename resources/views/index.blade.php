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
    <link rel="stylesheet" type="text/css" href="css/btn_to_top.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>

    <style type="text/css">
        .aa {
            padding:5px;
        };

        .te {
          background-color: white;
          border: 2px solid gray;
          z-index: 2;
        }
    </style>
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
                    Fotos do ministério Deeper<br>
                  </p>
              </div>
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

      @yield('body')

      <button id="myBtn" onclick="topFunction()" title="Go to top">
        <img src="img/top.png" width="50" height="50">
      </button>

      <!-- Footer -->
      <footer id="footer">
        <div class="container">
          <div class="col-6 col-md-4">
            <h5>Contato</h5>
            
            <p>
              <ul class="mx-auto">
                  <li>
                      <img src="img/email.png" alt="E-mail" width="35" height="35">
                      <strong>E-mail:</strong> <a href="mailto:deeper@gmail.com">deeper@gmail.com</a>
                  </li>
                    
                  <li>
                      <img src="img/phone.svg" alt="Celular" width="35" height="35">
                      <strong>Celular:</strong> <a href="callto:999999999">+55 (21) 99999-9999</a>
                  </li>
              </ul>
            </p>
          </div>

          <div class="col-6 col-md-4">
            <h5>Redes Sociais</h5>

            <a href="https://www.instagram.com/rodrigoamora" target="_blank">
                <img src="img/redes_sociais/instagram.png" alt="Instagram" width="35" height="35">
            </a>
          </div>
        </div>
      </footer>

      <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
      <script type="text/javascript" src="js/bootstrap.js"></script>
      <script type="text/javascript" src="js/btn_to_top.js"></script>
      <script type="text/javascript" src="js/enviarEmail.js"></script>
      <script type="text/javascript" src="js/SmoothScroll.js"></script>
      <script type="text/javascript" src="js/easypiechart.js"></script>
      <script type="text/javascript" src="js/jquery.isotope.js"></script>
      <script type="text/javascript" src="js/jquery.counterup.js"></script>
      <script type="text/javascript" src="js/waypoints.js"></script>
      <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script type="text/javascript" src="js/modernizr.custom.js"></script>

      <script type="text/javascript" src="js/imagepreview.min.js"></script>
      <script type="text/javascript">
        $(function() {
          $(".te").hide();

          $(".aa").each(function() {
              $(this).mouseover(function(event) {
                $("#portfolio").append("<p id='preview'><img src='"+$(this).attr("href")+"' alt='Image preview' width='400' height='230' /></p>")
                
                var posY = event.pageY-10
                var posX = event.pageX + 30

                $("#preview").css({
                  "position": "absolute",
                  "top": posY + "px",
                  "left": posX + "px",
                  "z-index": "10"
                }).fadeIn()
                
              })

              $(this).mouseout(function() {
                $("#preview").remove();
              })
          })

        })
      </script>
    </div>
  </body>
</html>
