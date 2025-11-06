<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
{
    $todos = Todo::orderBy('created_at', 'desc')->paginate(5); // 5 items per page
    return view('todos.index', compact('todos'));
}

    public function create()
    {
        return view('todos.create');
    }

   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'progress' => 'required|string',
    ]);

    Todo::create($validated);

    return redirect()->route('todos.index')->with('success', 'Todo created successfully!');
}

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'progress' => 'required|string',
        'is_completed' => 'nullable|boolean',
    ]);

    $todo->update([
        'title' => $validated['title'],
        'description' => $validated['description'] ?? null,
        'due_date' => $validated['due_date'] ?? null,
        'progress' => $validated['progress'],
        'is_completed' => $request->has('is_completed'),
    ]);

    return redirect()->route('todos.index')->with('success', 'Todo updated successfully!');
}


    
public function show($id)
{
    $todo = \App\Models\Todo::findOrFail($id);
    return view('todos.show', compact('todo'));
}

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todos.index');
    }
}
