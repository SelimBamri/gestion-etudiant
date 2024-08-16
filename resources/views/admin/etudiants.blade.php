@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Ajouter un étudiant</h3>
        <form action="{{ route('etudiant.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <input type="email" class="form-control" name="email" placeholder="Email" >
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" >
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" >
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse" >
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="number" class="form-control" name="telephone" placeholder="Telephone" >
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="date" class="form-control" name="dan" placeholder="Date de naissance" >
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <button type="submit" class="btn btn-primary">Ajouter un Étudiant</button>
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
        <h3 style="margin: 3rem 0">Liste des étudiants</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Email</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Mot de passe</th>
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->adresse }}</td>
                    <td>{{ $etudiant->telephone }}</td>
                    <td>********</td>
                    <td>
                        <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:bl;cursor:pointer;color:red">
                                <i class="material-icons-outlined">delete</i>
                            </button>
                        </form>
                         
                         <a href="{{ route('admin.update-etudiant', $etudiant->id) }}"><i class="material-icons-outlined">edit</i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        
        </table>
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