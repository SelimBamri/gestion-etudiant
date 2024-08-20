@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Ajouter un cours</h3>
        <form action="{{ route('cours.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control" name="nom" placeholder="Nom" required>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="description" placeholder="Description" required>
                </div>
                <div class="col-4">
                    <input type="email" class="form-control" name="email" placeholder="Email de l'enseignant" required>
                </div>
                <div class="col-4" style='margin-top: 1rem;'>
                    <button type="submit" class="btn btn-primary">Ajouter un cours</button>
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
        <h3 style="margin: 3rem 0">Liste des cours</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Nom de l'enseignant</th>
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($cours as $cour)
                <tr>
                    <td>{{ $cour->id }}</td>
                    <td>{{ $cour->nom }}</td>
                    <td>{{ $cour->description }}</td>
                    <td>{{ $cour->enseignant->nom }} {{ $cour->enseignant->prenom }}</td>
                    <td>
                        <form action="{{ route('cours.delete', $cour->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:bl;cursor:pointer;color:red">
                                <i class="material-icons-outlined">delete</i>
                            </button>
                        </form>
                        <a href="{{ route('cours.update.form', $cour->id) }}"><i class="material-icons-outlined">edit</i></a>
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