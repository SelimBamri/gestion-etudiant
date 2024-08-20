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
                    <input type="number" class="form-control" name="cours" placeholder="Id du cours" required>
                </div>
                <div class="col-4">
                    <input type="email" class="form-control" name="email" placeholder="Email de l'étudiant" required>
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" name="note" placeholder="Note" required>
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
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->cours->nom }}</td>
                    <td>{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>
                    <td>{{ $note->note }}</td>
                    <td>
                        <form action="{{ route('note.delete', $note->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:bl;cursor:pointer;color:red">
                                <i class="material-icons-outlined">delete</i>
                            </button>
                        </form>
                        <a href="{{ route('note.update.form', $note->id) }}"><i class="material-icons-outlined">edit</i></a>
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