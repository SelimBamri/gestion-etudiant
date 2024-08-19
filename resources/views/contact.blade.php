<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pricing example for Bootstrap</title>

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
                <a class="nav-link" aria-current="page" href="{{route('welcome')}}">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('contact')}}">Contactez-nous</a>
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
        <section class="py-3 py-md-5 py-xl-8">
        <div class="container" style="margin-bottom: 2rem;">
            <div class="row">
            <div class="col-12 col-md-10 col-lg-8">
            <h2 class="featurette-heading">Contactez-nous</h2>
            </div>
            </div>
        </div>

        <div class="container">
            <div class="row gy-4 gy-md-5 gy-lg-0 align-items-md-center">
            <div class="col-12 col-lg-6">
                <div class="border overflow-hidden">

                <form action="#!">
                    <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                    <div class="col-12">
                        <label for="fullname" class="form-label">Nom complet <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                            </svg>
                        </span>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="phone" class="form-label">Numéro de téléphone</label>
                        <div class="input-group">
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                        </span>
                        <input type="tel" class="form-control" id="phone" name="phone" value="">
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="subject" class="form-label">Objet <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="subject" name="subject" value="" required>
                    </div>
                    <div class="col-12">
                        <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Envoyer un message</button>
                        </div>
                    </div>
                    </div>
                </form>

                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row justify-content-xl-center">
                <div class="col-12 col-xl-11">
                    <div class="mb-4 mb-md-5">
                    <div class="mb-3 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-geo" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="mb-2">Adresse</h4>
                        <p class="mb-2">Vous pouvez nous visiter.</p>
                        <hr class="w-50 mb-3 border-dark-subtle">
                        <address class="m-0 text-secondary">Avenue de l'indépendance Ariana</address>
                    </div>
                    </div>
                    <div class="row mb-sm-4 mb-md-5">
                    <div class="col-12 col-sm-6">
                        <div class="mb-4 mb-sm-0">
                        <div class="mb-3 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-telephone-outbound" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="mb-2">Téléphone</h4>
                            <p class="mb-2">Please pouvez nous joindre par téléphone.</p>
                            <hr class="w-75 mb-3 border-dark-subtle">
                            <p class="mb-0">
                            <a class="link-secondary text-decoration-none" href="tel:+15057922430">20 000 000</a>
                            </p>
                        </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="mb-4 mb-sm-0">
                        <div class="mb-3 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="mb-2">Email</h4>
                            <p class="mb-2">Vous pouvez nous envoyer nous un email.</p>
                            <hr class="w-75 mb-3 border-dark-subtle">
                            <p class="mb-0">
                            <a class="link-secondary text-decoration-none" href="mailto:demo@yourdomain.com">mail@mail.com</a>
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div>
                    <div class="mb-3 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                        <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                        <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="mb-2">Horaires</h4>
                        <p class="mb-2">Nos heures de travail.</p>
                        <hr class="w-50 mb-3 border-dark-subtle">
                        <div class="d-flex mb-1">
                        <p class="text-secondary fw-bold mb-0 me-5">lun - ven</p>
                        <p class="text-secondary mb-0">9:00 - 17:00</p>
                        </div>
                        <div class="d-flex">
                        <p class="text-secondary fw-bold mb-0 me-5">sam-dim</p>
                        <p class="text-secondary mb-0">9:00 - 14:00</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            </div>
        </section>  
        <hr class="featurette-divider">
        <footer class="container">
            <p class="float-end"><a href="#">Haut de la page</a></p>
            <p>&copy; 2024 Plateforme de gestion d'étudiants, Inc. &middot;</p>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
