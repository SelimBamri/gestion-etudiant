@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Ajouter un enseignant</h3>
        <form action="{{ route('enseignant.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse" required>
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="number" class="form-control" name="telephone" placeholder="Telephone" required>
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="date" class="form-control" name="dan" placeholder="Date de naissance" required>
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                </div>
                <div class="col-4" style="margin-top: 1rem">
                    <button type="submit" class="btn btn-primary">Ajouter un Enseignant</button>
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
        <h3 style="margin: 3rem 0">Liste des enseignants</h3>
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
            @foreach ($enseignants as $enseignant)
                <tr>
                    <td>{{ $enseignant->id }}</td>
                    <td>{{ $enseignant->email }}</td>
                    <td>{{ $enseignant->nom }}</td>
                    <td>{{ $enseignant->prenom }}</td>
                    <td>{{ $enseignant->adresse }}</td>
                    <td>{{ $enseignant->telephone }}</td>
                    <td>********</td>
                    <td>
                        <form action="{{ route('enseignant.delete', $enseignant->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:bl;cursor:pointer;color:red">
                                <i class="material-icons-outlined">delete</i>
                            </button>
                        </form>
                         
                         <a href="{{ route('admin.update-enseignant', $enseignant->id) }}"><i class="material-icons-outlined">edit</i></a>
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