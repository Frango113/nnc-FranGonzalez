<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct()
    {
        // Apply authentication middleware to all methods in this controller
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = $request->user();

        // Combine the assigned and created tasks
        $tasks = $user->assignedTasks->merge($user->createdTasks);

        return response()->json(['tasks' => $tasks], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'assigned_to' => 'required|exists:users,id',
        ]);

        if (!$this->isSuperAdmin($request->user())) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Pendiente', // Default status
            'assigned_to' => $request->assigned_to,
            'created_by' => $request->user()->id,
        ]);

        return response()->json(['task' => $task], 201);
    }

    public function destroy(Task $task)
    {
        if (!$this->isSuperAdmin(auth()->user())) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 200);
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|in:Pendiente,En proceso,Bloqueado,Completado',
        ]);

        if (!$this->canUpdateTask($task)) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->update(['status' => $request->status]);

        return response()->json(['message' => 'Task status updated successfully'], 200);
    }

    private function isSuperAdmin($user)
    {
        return $user->role === 'super_admin';
    }

    private function canUpdateTask(Task $task)
    {
        $user = auth()->user();
        return $this->isSuperAdmin($user) || $user->id === $task->assigned_to;
    }
}
