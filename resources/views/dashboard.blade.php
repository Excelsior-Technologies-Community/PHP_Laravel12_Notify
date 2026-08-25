<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="welcome-card mb-8">
                <h2 class="text-3xl font-bold">🚀 Laravel Notify Dashboard</h2>
                <p>Test multiple notification types and manage notification history</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <a href="{{ route('notifications.success') }}" class="glass-card rounded-2xl p-6 hover:bg-green-500/10 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-green-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Success</h3>
                            <p class="text-sm text-gray-400">Green toast</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('notifications.error') }}" class="glass-card rounded-2xl p-6 hover:bg-red-500/10 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-red-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Error</h3>
                            <p class="text-sm text-gray-400">Red toast</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('notifications.warning') }}" class="glass-card rounded-2xl p-6 hover:bg-yellow-500/10 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-yellow-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Warning</h3>
                            <p class="text-sm text-gray-400">Yellow toast</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('notifications.info') }}" class="glass-card rounded-2xl p-6 hover:bg-blue-500/10 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Info</h3>
                            <p class="text-sm text-gray-400">Blue toast</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('notifications.history') }}" class="glass-card rounded-2xl p-6 hover:bg-indigo-500/10 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-indigo-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Notification History</h3>
                            <p class="text-sm text-gray-400">View all stored notifications</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('notifications.upload.form') }}" class="glass-card rounded-2xl p-6 hover:bg-purple-500/10 transition-colors group">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-xl bg-purple-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-white">Upload File</h3>
                            <p class="text-sm text-gray-400">Test file upload with notification</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
