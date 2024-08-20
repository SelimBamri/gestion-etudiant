@extends('layouts.auth')

@section('title', 'Login')

@section('content')


  <!--authentication-->

<div class="mx-3 mx-lg-0">

  <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden p-4">
    <div class="row g-4">
      <div class="col-lg-6 d-flex">
        <div class="card-body" >
          <div style='text-align: center;'>
            <h4 class="fw-bold" >Se connecter en tant qu'étudiant</h4>
          </div>
          <div class="separator">
            <div class="line"></div>
            <p class="mb-0 fw-bold">OU</p>
            <div class="line"></div>
          </div>
          <div style='text-align: center;'>
          <a href="{{ route('enseignant.login.form') }}">Se connecter en tant qu'enseignant</a>         
         </div>
          <div class="form-body mt-4">
            <form class="row g-3"method="POST" action="{{ route('etudiant.login') }}">
              @csrf
              <div class="col-12">
                <label for="inputLogin" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputLogin" name="email" placeholder="Email étudiant">
              </div>
              <div class="col-12">
                <label for="inputChoosePassword" class="form-label">Mot de passe</label>
                <div class="input-group" id="show_hide_password">
                  <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword"
                    placeholder="Mot de passe">
                  <a href="javascript:;" class="input-group-text bg-transparent"><i
                      class="bi bi-eye-slash-fill"></i></a>
                </div>
              </div>
              <div class="col-12" style = "margin-top: 3rem;">
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
                <div class="d-grid">
                  <a class="btn btn-outline-primary" style="margin-top: 1rem" href="{{route('welcome')}}">Revenir à la page d'accueil</a>
                </div>
              </div>
              @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif  
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 d-lg-flex d-none">
        <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-light">
          <img src="{{ URL::asset('build/images/login1.png') }}" class="img-fluid" alt="">
        </div>
      </div>

    </div><!--end row-->
  </div>

</div>

@endsection