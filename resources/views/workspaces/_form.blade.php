<form method="POST" action="{{ route('workspaces.store') }}" class="space-y-2">
    @csrf
    <div>
        <input type="text" name="name" placeholder="Workspace name"
               class="w-full border p-2 rounded" required>
    </div>
    <div>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
            Add Workspace
        </button>
    </div>
</form>
