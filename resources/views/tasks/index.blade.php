<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->username }}'s Tasks</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $user->first_name }}'s Tasks</h1>

        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('tasks.create', $user->id) }}" 
               class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
               ➕ Create New Task
            </a>

            @if(session('success'))
                <div class="text-green-600 font-medium">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="space-y-4">
            @forelse ($tasks as $task)
                <div class="border p-4 rounded-md shadow-sm bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">{{ $task->title }}</h2>
                            <p class="text-sm text-gray-600 mb-1">{{ $task->description }}</p>
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full 
                                {{ $task->status === 'completed' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('tasks.edit', [$user->id, $task->id]) }}" 
                               class="text-blue-600 hover:text-blue-800 font-medium">
                               ✏️ Edit
                            </a>
                            <form action="{{ route('tasks.destroy', [$user->id, $task->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this task?')"
                                        class="text-red-600 hover:text-red-800 font-medium">
                                    🗑️ Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No tasks found.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
