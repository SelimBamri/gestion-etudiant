@extends('layouts.masters')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Ajouter une note</h3>
        <form action="{{ route('enseignant.notesp') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <input type="number" class="form-control" name="cours" placeholder="Id du cours" >
                </div>
                <div class="col-4">
                    <input type="email" class="form-control" name="email" placeholder="Email de l'étudiant">
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" name="note" placeholder="Note">
                </div>
                <div class="col-4" style='margin-top: 1rem;'>
                    <button type="submit" class="btn btn-primary">Ajouter une note</button>
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
        <h3 style="margin: 3rem 0">Liste des notes</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom de l'étudiant</th>
                <th>Nom du cours</th>
                <th>Note</th>
            </thead>
            <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->cours->nom }}</td>
                    <td>{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                    <td>{{ $note->note }}</td>
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