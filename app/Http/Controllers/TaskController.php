<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        $tasks = $user->tasks;
        return view('tasks.index', compact('user', 'tasks'));
    }

    public function create($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('tasks.create', compact('user'));
    }

    public function store(Request $request, $user_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->route('tasks.index', $user_id)->with('success', 'Task created!');
    }

    public function edit($user_id, Task $task)
    {
        $user = User::findOrFail($user_id);
        return view('tasks.edit', compact('user', 'task'));
    }

    public function update(Request $request, $user_id, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string|in:pending,completed',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index', $user_id)->with('success', 'Task updated!');
    }

    public function destroy($user_id, Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index', $user_id)->with('success', 'Task deleted!');
    }
}
