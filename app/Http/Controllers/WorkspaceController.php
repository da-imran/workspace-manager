<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Workspace;

class WorkspaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workspaces = auth()->user()->workspaces;
        return view('workspaces.index', compact('workspaces'));
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
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        auth()->user()->workspaces()->create($request->only('name'));
        return redirect()->route('dashboard')->with('status', 'Workspace created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workspace $workspace)
    {
        abort_if($workspace->user_id !== auth()->id(), 403);
        $tasks = $workspace->tasks()->latest()->get();
        return view('workspaces.show', compact('workspace', 'tasks'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workspace $workspace)
    {
        abort_if($workspace->user_id !== auth()->id(), 403);
        $workspace->delete();
        return redirect()->route('dashboard')->with('status', 'Workspace deleted.');
    }
}
