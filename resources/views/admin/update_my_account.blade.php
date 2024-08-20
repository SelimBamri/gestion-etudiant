@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        
    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Modifier mon compte</h3>
        <form action="{{ route('admin.update-my-accountp') }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <div class="col-4" style='margin-bottom: 1rem;'>
                    <input type="text" class="form-control" name="login" placeholder="Login" value= "{{auth()->user()->login}}" required>
                </div>
                <div class="col-4" style='margin-bottom: 1rem;'>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                </div>
                <div class="col-4" style='margin-bottom: 1rem;'>
                    <input type="password" class="form-control" name="confirm-password" placeholder="Confirmer votre mot de passe">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary">Modifier mon compte</button>
                </div>
                </div>
            </div>
        </form>
        <form action="{{ route('admin.my.delete') }}" method="POST" style="margin-top: 1rem;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  class="btn btn-danger">
                                Supprimer mon compte
                            </button>
                        </form>
        @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 1rem">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
        @endif  
    </div>
@endsection 
@section('scripts')

  <script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/index.js') }}"></script>
  <script src="{{ URL::asset('build/plugins/peity/jquery.peity.min.js') }}"></script>
  <script>
    $(".data-attributes span").peity("donut")
  </script>
@endsection 