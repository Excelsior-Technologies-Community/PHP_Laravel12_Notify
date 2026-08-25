<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Upload File
            </h2>
            <a href="{{ route('notifications.history') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                View Notification History
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card rounded-2xl overflow-hidden">
                <div class="p-8">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-white">Upload a File</h3>
                        <p class="text-sm text-gray-400 mt-1">Select a file to upload. Max size: 10MB.</p>
                    </div>

                    <form method="POST" action="{{ route('notifications.upload') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label for="file" class="block text-sm font-medium text-gray-300 mb-2">Select File</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-600 border-dashed rounded-xl hover:border-indigo-500 transition-colors">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v12m0 0v4m0-4H32m-4 4h8m-8-4h8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-400">
                                        <label for="file" class="relative cursor-pointer rounded-md font-medium text-indigo-400 hover:text-indigo-300">
                                            <span>Upload a file</span>
                                            <input id="file" name="file" type="file" class="sr-only" required onchange="document.getElementById('file-name').textContent = this.files[0]?.name || ''">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, PDF, DOCX up to 10MB</p>
                                    <p id="file-name" class="text-sm text-indigo-300 font-medium mt-2"></p>
                                </div>
                            </div>
                            @error('file')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Description (optional)</label>
                            <input type="text" name="description" id="description" 
                                class="block w-full rounded-xl border-gray-600 bg-white/5 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-3"
                                placeholder="Enter a short description..." value="{{ old('description') }}">
                            @error('description')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-xl font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Upload File
                            </button>
                            <a href="{{ route('dashboard') }}" class="text-sm text-gray-400 hover:text-white transition-colors">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
