<!DOCTYPE html>
<html lang="en">
<head>
  <title>BookInc &mdash; Share Your Books</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="images/B.png"/>
  <script src="https://kit.fontawesome.com/f838933a8e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900"> 
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/footer.css">
  <style>
  a, a:hover{
    color: #22bfa0;
  }
  </style>
</head>
<body>

  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-4" role="banner">

      <div class="container">
        <div class="row align-items-center">


          <div class="col-3">
            <h1 class="site-logo"><a href="index.html" class="h2"><image src="images/book-inc.png"></a></h1>
          </div>
          <div class="col-9">
            <nav class="site-navigation position-relative text-right text-md-right" role="navigation">



              <div class="d-block d-lg-none ml-md-0 mr-auto"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <button type="button" class="btn btn-outline-light btn-sm"><a href="{{ url('/home') }}"><i class="fas fa-columns"></i>&nbsp;Dashboard</a></button>
                    @else
                    <button type="button" class="btn btn-outline-light btn-sm"><a href="{{ route('login') }}" ><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a></button>

                        @if (Route::has('register'))
                        <button type="button" class="btn btn-outline-light btn-sm"><a href="{{ route('register') }}" ><i class="fas fa-user-plus"></i>&nbsp;Register</a></button>
                        @endif
                    @endauth
                </div>
            @endif
                  
                </li>
                
              </ul>
            </nav>


          </div>

        </div>
      </div>
      
    </header>

    

    <div class="container pt-5 hero">
      <div class="row align-items-center text-center text-md-left">
        
        <div class="col-lg-4">
          <h1 class="mb-3 display-3">Share Your Books.</h1>
          <p>Login or Register to Add or Reserve Books in a few clicks from your Dashboard!</p>
        </div>
        <div class="col-lg-8">
          <img src="images/1x/asset-2.jpg" alt="Image" class="img-fluid">    
        </div>
      </div>
    </div>
    

   

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/mediaelement-and-player.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

      for (var i = 0; i < total; i++) {
        new MediaElementPlayer(mediaElements[i], {
          pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
          shimScriptAccess: 'always',
          success: function () {
            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
            for (var j = 0; j < targetTotal; j++) {
              target[j].style.visibility = 'visible';
            }
          }
        });
      }
    });
  </script>


  <script src="js/main.js"></script>

</body>
<footer>
<div class="container" >
<hr/>
        <div class="row">
          <div  class="col-4 d-flex justify-content-center text-center">
            <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved 
            | <a href="mailto:support@bookinc.com">support@bookinc.com</a></p>
          </div>

        </div>
      </div>
    </footer>
</html>