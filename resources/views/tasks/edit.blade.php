<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Task') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex justify-center items-start min-h-screen py-20"> 
        <div class="bg-white dark:bg-gray-800 p-10 rounded-lg shadow-lg w-3/4 max-w-3xl"> 
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="title" class="block text-gray-700 dark:text-gray-200 mb-2">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title"
                        placeholder="Enter title" 
                        value="{{ old('title', $task->title) }}"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @if ($errors->has('title'))
                        <span class="text-white text-sm">{{ $errors->first('title') }}</span> 
                    @endif
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-gray-700 dark:text-gray-200 mb-2">Description</label>
                    <textarea 
                        name="description" 
                        id="description"
                        rows="8"
                        placeholder="Enter description"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none">{{ old('description', $task->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-white text-sm">{{ $errors->first('description') }}</span> 
                    @endif
                </div>

                <div class="mb-6">
                    <label for="due_date" class="block text-gray-700 dark:text-gray-200 mb-2">Due Date</label>
                    <input 
                        type="date" 
                        name="due_date" 
                        id="due_date"
                        value="{{ old('due_date', $task->due_date) }}"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @if ($errors->has('due_date'))
                        <span class="text-white text-sm">{{ $errors->first('due_date') }}</span> 
                    @endif
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-200 mb-2">Status</label>
                    <input type="radio" name="is_completed" value="1" id="completed" 
                        {{ old('is_completed', $task->is_completed) == 1 ? 'checked' : '' }} class="mr-2">
                    <label for="completed" class="text-gray-700 dark:text-gray-200">Completed</label>

                    <input type="radio" name="is_completed" value="0" id="pending" 
                        {{ old('is_completed', $task->is_completed) == 0 ? 'checked' : '' }} class="ml-4 mr-2">
                    <label for="pending" class="text-gray-700 dark:text-gray-200">Pending</label>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 focus:outline-none">
                        Update Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
