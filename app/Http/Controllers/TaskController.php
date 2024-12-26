<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all(); // Fetch all tasks
    }

    public function store(Request $request)
{
    // Get the highest ID in the tasks table
    $lastTask = Task::orderBy('id', 'desc')->first();
    $nextId = $lastTask ? $lastTask->id + 1 : 1; // Increment the ID from the last task or start from 1 if no tasks exist

    // Create a new task with the incremented ID
    $task = new Task();
    $task->id = $nextId; // Manually set the ID
    $task->name = $request->input('name');
    $task->description = $request->input('description');
    $task->isfavorite = $request->input('isfavorite', false); // Default value for isfavorite
    $task->save();

    return response()->json($task, 201); // Return the created task as a response
}


    public function show(Task $task)
    {
        return $task; // Return a single task
    }

    public function update(Request $request, Task $task)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'isFavorite' => 'nullable|boolean', // Validate as boolean (true/false)
        ]);
    
        // Map the `isFavorite` value to TINYINT (0/1) for the database
        if (isset($validated['isFavorite'])) {
            $validated['isFavorite'] = $validated['isFavorite'] ? 1 : 0; // Convert boolean to 0/1
        }
    
        // Update the task
        $task->update($validated);
    
        return response()->json($task, 200);
    }

    public function destroy(Task $task){
    $task->delete(); // Delete the task
    return response()->json(['message' => 'Task deleted successfully'], 200);
}

}
