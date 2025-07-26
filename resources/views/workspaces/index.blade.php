@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">My Workspaces</h1>

@include('workspaces._form')

<ul class="mt-6 space-y-2">
    @foreach ($workspaces as $workspace)
        <li class="p-4 bg-white shadow rounded">
            <a href="{{ route('workspaces.show', $workspace) }}" class="text-blue-600 font-semibold">
                {{ $workspace->name }}
            </a>
        </li>
    @endforeach
</ul>
@endsection
