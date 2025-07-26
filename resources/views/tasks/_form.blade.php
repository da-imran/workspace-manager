<form method="POST" action="{{ route('workspaces.tasks.store', $workspace) }}" class="space-y-2 mt-4">
    @csrf
    <div>
        <input type="text" name="title" placeholder="Task title"
               class="w-full border p-2 rounded" required>
    </div>
    <div>
        <textarea name="description" rows="2" placeholder="Task description (optional)"
                  class="w-full border p-2 rounded"></textarea>
    </div>
    <div>
        <label class="block text-sm">Deadline:</label>
        <input type="datetime-local" name="deadline"
               class="w-full border p-2 rounded" required>
    </div>
    <div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
            Add Task
        </button>
    </div>
</form>