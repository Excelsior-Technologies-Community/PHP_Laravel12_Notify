<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notification History
            </h2>
            <div class="flex items-center gap-4">
                @if($unreadCount > 0)
                    <form method="POST" action="{{ route('notifications.mark.all.read') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                            Mark all as read ({{ $unreadCount }})
                        </button>
                    </form>
                @endif
                <a href="{{ route('notifications.upload.form') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                    Upload File
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card rounded-2xl overflow-hidden">
                <div class="p-6">
                    @forelse($notifications as $notification)
                        <div class="flex items-start gap-4 p-4 rounded-xl mb-3 border border-white/10 
                            {{ $notification->is_read ? 'bg-white/5' : 'bg-indigo-500/10 border-indigo-500/30' }}">
                            <div class="shrink-0 mt-1">
                                @if($notification->type === 'success')
                                    <div class="w-8 h-8 rounded-full bg-green-500/20 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                @elseif($notification->type === 'error')
                                    <div class="w-8 h-8 rounded-full bg-red-500/20 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                @elseif($notification->type === 'warning')
                                    <div class="w-8 h-8 rounded-full bg-yellow-500/20 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-8 h-8 rounded-full bg-blue-500/20 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-sm font-semibold text-white {{ $notification->is_read ? '' : 'text-indigo-300' }}">
                                        {{ $notification->title }}
                                        @if(!$notification->is_read)
                                            <span class="inline-block w-2 h-2 bg-indigo-400 rounded-full ml-2"></span>
                                        @endif
                                    </h4>
                                    <span class="text-xs text-gray-400">
                                        {{ $notification->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-300 mt-1">{{ $notification->message }}</p>
                                <div class="flex items-center gap-3 mt-2">
                                    <span class="text-xs text-gray-500 capitalize">{{ $notification->type }}</span>
                                    @if($notification->category)
                                        <span class="text-xs text-gray-500">|</span>
                                        <span class="text-xs text-gray-500 capitalize">{{ $notification->category }}</span>
                                    @endif
                                </div>
                            </div>
                            @if(!$notification->is_read)
                                <form method="POST" action="{{ route('notifications.mark.read', $notification->id) }}" class="shrink-0">
                                    @csrf
                                    <button type="submit" class="text-xs text-indigo-400 hover:text-indigo-300">
                                        Mark read
                                    </button>
                                </form>
                            @endif
                        </div>
                    @empty
                        <div class="text-center py-12 text-gray-400">
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                            <p class="text-lg font-medium">No notifications yet</p>
                            <p class="text-sm mt-1">Your notification history will appear here.</p>
                        </div>
                    @endforelse

                    <div class="mt-6">
                        {{ $notifications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
