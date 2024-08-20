@extends('layouts.master')

@section('title', 'Tableau de bord')

@section('content')
        
        <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3 style="margin-bottom: 3rem">Ajouter une inscription</h3>
        <form action="{{ route('inscri.add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-4">
                    <input type="number" class="form-control" name="cours" placeholder="Id du cours" required>
                </div>
                <div class="col-4">
                    <input type="email" class="form-control" name="email" placeholder="Email de l'étudiant" required>
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" name="prix" placeholder="Prix de l'inscription" required>
                </div>
                <div class="col-4" style='margin-top: 1rem;'>
                    <button type="submit" class="btn btn-primary">Ajouter une inscription</button>
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
        <h3 style="margin: 3rem 0">Liste des inscriptions</h3>
        <table class="table">
            <thead>
                <th>id</th>
                <th>Nom du cours</th>
                <th>Nom de l'étudiant</th>
                <th>Prix</th>
                <th>Payé</th>
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach ($inscriptions as $ins)
                <tr>
                    <td>{{ $ins->id }}</td>
                    <td>{{ $ins->cours->nom }}</td>
                    <td>{{ $ins->etudiant->nom }} {{ $ins->etudiant->prenom }}</td>
                    <td>{{ $ins->prix }}</td>
                    <td>
                        <form action="{{ route('inscri.update', $ins->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            @if ($ins->paye)
                                <button type="submit" style="background:none;border:none;color:bl;cursor:pointer;color:green">
                                    <i class="material-icons-outlined">check</i>
                                </button>     
                            @else
                                <button type="submit" style="background:none;border:none;color:bl;cursor:pointer;color:red">
                                    <i class="material-icons-outlined">close</i>
                                </button>

                            @endif
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('inscri.delete', $ins->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none;border:none;color:bl;cursor:pointer;color:red">
                                <i class="material-icons-outlined">delete</i>
                            </button>
                        </form>
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