<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Workspace;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Workspace $workspace)
    {
        abort_if($workspace->user_id !== auth()->id(), 403);

        $request->validate([
            'title' => 'required',
            'deadline' => 'required|date',
        ]);
        $deadline = Carbon::createFromFormat('Y-m-d\TH:i', $request->deadline)->timezone('Asia/Kuala_Lumpur');
        $workspace->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $deadline,
        ]);

        return redirect()->route('dashboard', $workspace)->with('status', 'Task created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        abort_if($task->workspace->user_id !== auth()->id(), 403);
        $isNowCompleted = !$task->is_completed;

        $task->update([
            'is_completed' => $isNowCompleted,
            'completed_at' => $isNowCompleted ? now('Asia/Kuala_Lumpur') : null,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
