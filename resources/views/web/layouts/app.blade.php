<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" rel="icon" href="{{ asset('/img/logo.png') }}" sizes="16x16">
    <title>CPN</title>
    <!-- javascripts -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
<body>

  <header class="primary_header">
    <div class="header_wrapper">
      <nav class="main_navigation navbar navbar-expand-lg navbar-light">
        <div class="navigation_wrapper container-fluid">

          <a class="nav_brand navbar-brand" href="/home">
            <img class="brand_logo d-inline-block align-text-top" src="{{asset('/img/logo-cpn2.png')}}" alt="" width="" height="45">
          </a>
          
          <button class="nav_button navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="button_toggle navbar-toggler-icon"></span>
          </button>
          
          <div class="nav_menu collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="nav_menu_wrapper navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="menu_item nav-item">
                  <a class="menu_item_href nav-link active" aria-current="page" href="/home">Accueil</a>
                </li>
                <li class="menu_item nav-item">
                  <a class="menu_item_href nav-link" href="/actuality">Actualité +</a>
                </li>
                <li class="menu_item nav-item">
                  <a class="menu_item_href nav-link" href="#">Subvention</a>
                </li>
                <li class="menu_item nav-item">
                  <a class="menu_item_href nav-link" href="/agenda">Agenda +</a>
                </li>
                <li class="menu_item nav-item">
                  <a class="menu_item_href nav-link" href="#about">A propos</a>
                </li>
                <li class="menu_item nav-item">
                  <a class="menu_item_href nav-link" href="/contact">Contactez-nous</a>
                </li>
                <li class="menu_item nav-item">
                  <a class="menu_item_href nav-link" href="#">Inscription</a>
                </li>
                <li class="menu_item nav-item">
                  <a class="menu_item_href nav-link" href="#">Connexion</a>
                </li>
              </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <main class="primary_body mb-5" id="main">
    @yield('content')
  </main>

  <footer style="background: #111D5E;" class="primary_footer">
    <div class="container p-5">
      <div class="row g-0">
        <div class="col-md-4 mb-3">
          <img class="mb-3 brand_logo d-inline-block align-text-top" src="{{asset('/img/logo-cpn3.png')}}" alt="" width="" height="45">
          <p style="color:white">Le Cabinet de Propulsion Numérique aide les entreprises à se propulser numériquement et à bénéficier de financement.
          CPN est un organisme de financement à but non lucratif</p>
          <ul style="margin:0; padding:0; display: flex; flex-direction:row">
            <li style="list-style: none;"><a href="#"><img style="width:40px; height:40px" src="{{asset('/img/facebook.png')}}" alt=""></a></li>
            <li style="list-style: none;margin:0 5px"><a href="#"><img style="width:40px; height:40px" src="{{asset('/img/instagram.png')}}" alt=""></a></li>
            <li style="list-style: none;margin:0 5px 0 0"><a href="#"><img style="width:40px; height:40px" src="{{asset('/img/twitter.png')}}" alt=""></a></li>
            <li style="list-style: none;"><a href="#"><img style="width:40px; height:40px" src="{{asset('/img/youtube.png')}}" alt=""></a></li>
          </ul>
        </div>
        <div class="col-md-8">
          <div class="row g-3">
            <div class="col-md-4 py-2 px-4 d-flex flex-column align-items-center justify-content-center">
              <h3 style="color: white; font-size: 20px; font-weight: 600;">Réseau sociaux</h3>
              <ul style="width:100%; margin:0;padding:0">
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Instagram</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Youtube</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Linkedin</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Facebook</a></li>
              </ul>
            </div>
            <div class="col-md-4 py-2 px-4 d-flex flex-column align-items-center justify-content-center">
              <h3 style="color: white; font-size: 20px; font-weight: 600;">Support</h3>
              <ul style="width:100%; margin:0;padding:0">
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Instagram</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Youtube</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Linkedin</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Facebook</a></li>
              </ul>
            </div>
            <div class="col-md-4 py-2 px-4 d-flex flex-column align-items-center justify-content-center">
              <h3 style="color: white; font-size: 20px; font-weight: 600;">Contact</h3>
              <ul style="width:100%; margin:0;padding:0">
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Instagram</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Youtube</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Linkedin</a></li>
                <li style="list-style: none;"><a style="text-decoration: none; color:white" href="#">Facebook</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>