<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Accueil</title>

    @yield('css')

    @include('layouts.head-css')
   
    <style>
        body {
          padding-top: 3rem;
          padding-bottom: 3rem;
          color: #5a5a5a;
        }


        /* CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
          margin-bottom: 4rem;
        }
        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
          bottom: 3rem;
          z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
          height: 32rem;
          background-color: #777;
        }
        .carousel-item > img {
          position: absolute;
          top: 0;
          left: 0;
          min-width: 100%;
          height: 32rem;
        }


        /* MARKETING CONTENT
        -------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
          margin-bottom: 1.5rem;
          text-align: center;
        }
        .marketing h2 {
          font-weight: 400;
        }
        .marketing .col-lg-4 p {
          margin-right: .75rem;
          margin-left: .75rem;
        }


        /* Featurettes
        ------------------------- */

        .featurette-divider {
          margin: 5rem 0; /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
          font-weight: 300;
          line-height: 1;
          letter-spacing: -.05rem;
        }


        /* RESPONSIVE CSS
        -------------------------------------------------- */

        @media (min-width: 40em) {
          /* Bump up size of carousel content */
          .carousel-caption p {
            margin-bottom: 1.25rem;
            font-size: 1.25rem;
            line-height: 1.4;
          }

          .featurette-heading {
            font-size: 50px;
          }
        }

        @media (min-width: 62em) {
          .featurette-heading {
            margin-top: 7rem;
          }
        }
    </style>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Plateforme de gestion d'étudiants</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('contact')}}">Contactez-nous</a>
              </li>
            </ul>
            @auth('admin')
                <a class="btn btn-outline-success" style="margin-right: 0.5rem" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger">
                    Se déconnecter
                  </button>
                </form>
            @elseif(auth()->guard('enseignant')->check())
                <a class="btn btn-outline-success" style="margin-right: 0.5rem" href="{{ route('enseignant.cours') }}">Enseignant Dashboard</a>
                <form action="{{ route('enseignant.logout') }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger">
                    Se déconnecter
                  </button>
                </form>   
            @elseif(auth()->guard('etudiant')->check())
                <a class="btn btn-outline-success" style="margin-right: 0.5rem" href="{{ route('etudiant.cours') }}">Etudiant Dashboard</a>
                <form action="{{ route('etudiant.logout') }}" method="POST" style="display:inline;">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger">
                    Se déconnecter
                  </button>
                </form>   
            @else
                <!-- If the user is not logged in -->
                <a class="btn btn-outline-success" style="margin-right: 0.5rem" href="{{ route('etudiant.login.form') }}">Espace étudiant</a>
                <a class="btn btn-outline-success" href="{{ route('enseignant.login.form') }}">Espace enseignant</a>
            @endauth
          </div>
        </div>
      </nav>
    </header>
    <main role="main">
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="{{ URL::asset('build/images/header1.jpg') }}" style="filter: blur(5px);" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left" style="margin-bottom: 6rem;">
                <h1>Accès rapide</h1>
                <p>Notre application vous offre une interface simple qui vous permet de tout voir en un clic</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="{{ URL::asset('build/images/header2.jpg') }}" style="filter: blur(5px);" alt="Second slide">
            <div class="container">
              <div class="carousel-caption" style="margin-bottom: 6rem;">
                <h1>Rapports complets</h1>
                <p>Vous pouvez trouver sur nôtre application toutes vos informations académiques.</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="{{ URL::asset('build/images/header3.jpg') }}" style="filter: blur(5px);" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right" style="margin-bottom: 6rem;">
                <h1>Données sécurisées</h1>
                <p>Notre application assure la protection de vos données.</p>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="container marketing">
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Accèdez à vos <span class="text-muted">cours.</span></h2>
            <p class="lead">Notre application vous offre la possibilité de consulter les cours auxquels vous êtes inscrits ainsi que leurs détails.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="{{ URL::asset('build/images/h1.jpg') }}" >
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Consultez vos <span class="text-muted">absences .</span></h2>
            <p class="lead">Notre application vous donne la possibilité d'accèder à votre liste d'absences. Vous pouvez voir les cours auxquels vous étiez absents ainsi que les dates de vos absences.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="{{ URL::asset('build/images/h2.jpg') }}" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Suivi des  <span class="text-muted">notes.</span></h2>
            <p class="lead">Avoir votre résultat n'a jamais été aussi facile! Grâce à notre application, vous pouvez accèder à vos notes dans les divers cours auxquels vous êtes inscrits.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="{{ URL::asset('build/images/h3.jpg') }}" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

      </div><!-- /.container -->

      <footer class="container">
        <p class="float-end"><a href="#">Haut de la page</a></p>
        <p>&copy; 2024 Plateforme de gestion d'étudiants, Inc. &middot;</p>
      </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
