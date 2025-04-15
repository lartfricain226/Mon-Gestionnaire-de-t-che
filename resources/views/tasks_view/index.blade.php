@extends('tasks_view.app')

@section('content')
<div class="btnGroup d-flex justify-content-between">
    <div class="btnLeft">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Ajouter une tâche</a>
        <a href="{{ route('logout') }}" class="btn btn-danger">Se déconnecter</a>
    </div>
    <div class="btnRight">
        <a href="{{ route('tasksTrashed') }}" class="btn btn-primary"><i class="fa-solid fa-trash"></i> Corbeille</a>
    </div>
</div>
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
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette tâche?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                 @endforeach
            </tbody>
    </table>
@endsection