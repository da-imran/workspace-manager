@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <p class="text-lg text-gray-900 dark:text-gray-100">You're logged in!</p>
                <p class="text-sm text-gray-600 dark:text-gray-300">Manage your workspaces and tasks below.</p>
            </div>

            <!-- Add Workspace -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">Add Workspace</h3>
                <form method="POST" action="{{ route('workspaces.store') }}" class="space-y-4">
                    @csrf
                    <input type="text" name="name" required
                           placeholder="Workspace name"
                           class="w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white rounded p-2">
                    <button type="submit" class="mt-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Create
                    </button>
                </form>
            </div>

            <!-- List Workspaces -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Your Workspaces</h3>
                <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">
                    Below is a list of your workspaces.
                </p>
                @if (auth()->user()->workspaces->isEmpty())
                    <p class="text-sm text-gray-600 dark:text-gray-300">You don't have any workspaces yet.</p>
                @else
                    <ul class="space-y-2">
                        @foreach (auth()->user()->workspaces as $workspace)
                            <li class="flex justify-between items-center bg-gray-100 dark:bg-gray-700 p-3 rounded">
                                <span class="p-2 text-gray-800 dark:text-gray-100 font-medium">
                                    {{ $workspace->name }}
                                </span>
                                 <form action="{{ route('workspaces.destroy', $workspace) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this workspace?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 text-sm font-semibold p-2">
                                        Delete
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <!-- List Tasks -->
            @foreach (auth()->user()->workspaces as $workspace)
                <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-gray-100 mb-2">{{ $workspace->name }}</h3>
                    <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">
                        Below is a list of your tasks.
                    </p>

                    <!-- Add Task -->
                    <form method="POST" action="{{ route('workspaces.tasks.store', $workspace) }}" class="space-y-2 mb-4">
                        @csrf
                        <input type="text" name="title" placeholder="Task title" required
                               class="w-full border p-2 rounded dark:bg-gray-900 dark:text-white dark:border-gray-700">
                        <textarea name="description" placeholder="Task description (optional)" rows="2"
                                  class="w-full border p-2 rounded dark:bg-gray-900 dark:text-white dark:border-gray-700"></textarea>
                        <input type="datetime-local" name="deadline" required
                               class="w-full border p-2 rounded dark:bg-gray-900 dark:text-white dark:border-gray-700">
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Add Task
                        </button>
                    </form>

                    <!-- Tasks List -->
                    @php $tasks = $workspace->tasks()->latest()->get(); @endphp

                    @if ($tasks->isEmpty())
                        <p class="text-sm text-gray-600 dark:text-gray-300">No tasks added yet.</p>
                    @else
                        <ul class="space-y-3">
                            @foreach ($tasks as $task)
                                <li class="p-4 bg-gray-100 dark:bg-gray-700 rounded flex justify-between items-center">
                                    <div>
                                        <h4 class="font-semibold text-gray-800 dark:text-gray-100">{{ $task->title }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">
                                            @if ($task->is_completed)
                                                ✅ Completed {{ \Carbon\Carbon::parse($task->completed_at)->diffForHumans() }}
                                            @else
                                             @php
                                                $deadline = \Carbon\Carbon::parse($task->deadline)->timezone('Asia/Kuala_Lumpur');
                                                $now = now('Asia/Kuala_Lumpur');
                                            @endphp
                                                @if ($now->greaterThan($deadline))
                                                    ⚠️ Overdue (due on {{ $deadline->diffForHumans() }})
                                                @else
                                                    ⏳ {{ $deadline->diffForHumans() }}
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button class="text-xs px-3 py-1 rounded 
                                            {{ $task->is_completed ? 'bg-yellow-400' : 'bg-green-400' }}" >
                                            {{ $task->is_completed ? 'Mark Incomplete' : 'Mark Complete' }}
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection

