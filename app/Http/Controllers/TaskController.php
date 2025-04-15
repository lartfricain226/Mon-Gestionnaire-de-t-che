<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //
    //     $tasks = Task::all();
    //     return view('tasks_view.index', compact('tasks'));
    // }

    public function index()
    {
        //
        return view('tasks_view.index', ['tasks'=>Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tasks_view.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $request->validate([
    //         'title' => 'string|max:255|required',
    //         'description' => 'string|max:1500|required',
    //     ]);

    //     Task::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'status' => $request->status ==="on" ? 1 : 0,
    //     ]);

    //     return redirect('/')->with('success', 'Tâche créee avec succès!');
    // }


    public function store(TaskRequest $request)
    {
        //
        $request->validated($request->all());

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status ==="on" ? 1 : 0,
        ]);

        return redirect('/tasks')->with('success', 'Tâche créee avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
        return view('tasks_view.create', compact('task'));
    }

    // public function edit(int $id)
    // {
    //     //
    //     $task = Task::where('id', $id)->first();
    //     return view('tasks_view.create', compact('task'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        //
        $request->validated($request->all());
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status ==="on" ? 1 : 0,
        ]);

        return redirect('/tasks')->with('success', 'Tâche modifiée avec succès!');
    }

    // public function update(Request $request, int $id)
    // {
    //     //
    //     $request->validate([
    //         'title' => 'string|max:255|required',
    //         'description' => 'string|max:1500|required',
    //     ]);

    //     $Task = Task::where('id', $id)->first();
    //     $Task->update([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'status' => $request->status ==="on" ? 1 : 0,
    //     ]);

    //     return redirect('/')->with('success', 'Tâche modifiée avec succès!');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        return redirect('/tasks')->with('success', 'Tâche supprimée avec succès!');
    }

    // public function destroy(int $id)
    // {
    //     //
    //    Task::where('id', $id)->delete();
    //     return redirect('/')->with('success', 'Tâche supprimée avec succès!');
    // }

    public function tasksTrashed()
    {
        //
        $tasks = Task::onlyTrashed()->get();
        return view('tasks_view.trash', compact('tasks'));
    }

    public function restore(int $id)
    {
        //
        $task = Task::onlyTrashed()->where('id', $id)->first();
        $task->restore();
        return redirect('/tasks')->with('success', 'Tâche restaurée avec succès!');
    }

    public function forceDelete(int $id)
    {
        //
        $task=Task::onlyTrashed()->where('id', $id)->first();
        $task->forceDelete();
        return back()->with('success', 'Tâche supprimée définitivement avec succès!');
    }
}
