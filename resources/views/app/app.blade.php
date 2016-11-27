<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Prayer Time</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <link rel="stylesheet" href="/css/style.css" media="screen" title="no title">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @yield('head')
  </head>
  <body>
    <nav class="teal darken-3" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Waktu Shalat</a>
        {{-- <ul class="right hide-on-med-and-down">
          <li><a href="#">Navbar Link</a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav">
          <li><a href="#">Navbar Link</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a> --}}
      </div>
    </nav>

    @yield('content')

    <footer class="page-footer teal darken-3">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Waktu Shalat</h5>
            <p class="grey-text text-lighten-4">Waktu Shalat yang Tepat dan Akurat</p>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              Dibuat oleh <a class="orange-text text-lighten-3" href="http://materializecss.com">Wahid Jamaalii As-Shidqi</a>
            </div>
            <div class="col l6 s12 right-align">
              Waktu Shalat oleh <a class="orange-text text-lighten-3" href="http://aladhan.com/">Aladhan</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="http://momentjs.com/downloads/moment-with-locales.js"></script>
    <script src="http://momentjs.com/downloads/moment-timezone-with-data.js"></script>
    @yield('script')
  </body>
</html>
