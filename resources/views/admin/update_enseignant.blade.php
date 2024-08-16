@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        
    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Modifier un compte d'enseignant</h3>
        <form action="{{ route('admin.update-enseignantp', $enseignant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$enseignant->email}}">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" value="{{$enseignant->nom}}">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" value="{{$enseignant->prenom}}">
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse" value="{{$enseignant->adresse}}">
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="number" class="form-control" name="telephone" placeholder="Telephone" value="{{$enseignant->telephone}}">
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="date" class="form-control" name="dan" placeholder="Date de naissance" value="{{$enseignant->date_de_naissance}}">
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <button type="submit" class="btn btn-primary">Modifier un Enseignant</button>
                </div>
                </div>
            </div>
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