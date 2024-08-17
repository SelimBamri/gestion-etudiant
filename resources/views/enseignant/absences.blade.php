@extends('layouts.masters')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Ajouter une absence</h3>
        <form action="{{ route('enseignant.absencesp') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <input type="number" class="form-control" name="cours" placeholder="Id du cours" >
                </div>
                <div class="col-4">
                    <input type="email" class="form-control" name="email" placeholder="Email de l'étudiant">
                </div>
                <div class="col-4">
                    <input type="date" class="form-control" name="d" placeholder="Date de l'absence">
                </div>
                <div class="col-4" style='margin-top: 1rem;'>
                    <button type="submit" class="btn btn-primary">Ajouter une absence</button>
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
        <h3 style="margin: 3rem 0">Liste des absences</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom de l'étudiant</th>
                <th>Nom du cours</th>
                <th>date</th>
            </thead>
            <tbody>
            @foreach ($absences as $abs)
                <tr>
                    <td>{{ $abs->id }}</td>
                    <td>{{ $abs->cours->nom }}</td>
                    <td>{{ $abs->etudiant->nom }} {{ $abs->etudiant->prenom }}</td>
                    <td>{{ $abs->date }}</td>
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