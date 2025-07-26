@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-2">{{ $workspace->name }}</h1>

<a href="{{ route('workspaces.index') }}" class="text-sm text-blue-500">← Back to Workspaces</a>

@include('tasks._form', ['workspace' => $workspace])

<h2 class="text-xl font-semibold mt-6 mb-2">Tasks</h2>

<ul class="space-y-3">
    @foreach ($tasks as $task)
        <li class="p-4 bg-white rounded shadow flex justify-between items-center">
            <div>
                <h3 class="font-bold">{{ $task->title }}</h3>
                <p class="text-sm text-gray-600">
                    @if ($task->is_completed)
                        Completed {{ \Carbon\Carbon::parse($task->completed_at)->diffForHumans() }}
                    @else
                        {{ \Carbon\Carbon::now()->diffForHumans($task->deadline, [
                            'syntax' => \Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                            'parts' => 3
                        ]) }} remaining
                    @endif
                </p>
            </div>
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="text-sm px-3 py-1 border rounded 
                    {{ $task->is_completed ? 'bg-yellow-300' : 'bg-green-300' }}">
                    {{ $task->is_completed ? 'Mark Incomplete' : 'Mark Complete' }}
                </button>
            </form>
        </li>
    @endforeach
</ul>
@endsection