@extends('tasks_view.app')

@section('content')
    <h2>Corbeille</h2>
    @session('success')
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endsession
    <table class="table">
        <thead></thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Statut</th>
                <th scope="col">Actions</th>
            </tr>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if ($task->status == 0)
                                <span class="badge text-bg-warning">Non terminé</span>
                            @else
                                <span class="badge text-bg-success">Terminé</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('restore', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success" onclick="return confirm('Voulez-vous vraiment restaurer cette tâche?')">Restaurer</button>
                            </form>
                            <form action="{{ route('forceDelete', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer définitivement cette tâche?')">Supprimer définitivement</button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
            </tbody>
    </table>
@endsection
