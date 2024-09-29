<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Tasks') }}
            </h2>
            <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-4 py-3 w-1/4 bg-green-400 text-white rounded-md hover:bg-green-500 shadow-lg">
                Add New Task
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-100 dark:bg-gray-800 text-center">
                                <th class="px-4 py-3 w-1/4">Task</th>
                                <th class="px-4 py-3 w-1/3">Description</th>
                                <th class="px-4 py-3 w-1/4">Status</th>
                                <th class="px-4 py-3 w-1/4">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($tasks as $task)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-800 text-center">
                                    <td class="px-4 py-3">{{ $task->title }}</td>
                                    <td class="px-4 py-3">{{ $task->description }}</td>
                                    <td class="px-4 py-3">
                                        <span class="{{ $task->is_completed ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $task->is_completed ? 'Completed' : 'Pending' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>

                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-center text-gray-500">No tasks found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
