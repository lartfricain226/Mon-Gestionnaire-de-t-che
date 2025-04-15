@extends('tasks_view.app')

@section('content')
    <h2>{{ Route::currentRouteName() == 'tasks.edit' ? 'Modifier' : 'Ajouter' }} une tache
    </h2>
    <form action="@if (Route::currentRouteName() == 'tasks.edit')
        {{ route('tasks.update', $task->id) }}
    @else
        {{ route('tasks.store') }}
    @endif" method="POST">
        @csrf
        @if (Route::currentRouteName() == 'tasks.edit')
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="title" class="form-label">Nom</label>
            <input type="text" @if (!empty($task))
                value="{{ old('title', $task->title) }}"
            @endif
                class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description">
                @if (Route::currentRouteName() == 'tasks.edit')
                {{ $task->description }}
                @else
                {{ old('description') }}
                @endif
            </textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Terminé? (Cocher si oui)</label>
            <input type="checkbox" {{ Route::currentRouteName() == 'tasks.edit' && $task->status == 1 ? 'checked' : '' }} class="form-check-input" id="status" name="status">
        </div>
        <button type="submit" class="btn btn-primary">
            @if (Route::currentRouteName() == 'tasks.edit')
                Modifier
            @else
                Ajouter
            @endif
        </button>
    </form>
@endsection
