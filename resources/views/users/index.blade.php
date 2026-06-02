<x-app-layout>

    <div class="p-6 text-white">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">👥 Users Management</h2>

            <a href="{{ route('users.create') }}"
                class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-emerald-600 hover:to-green-500 text-white px-5 py-2 rounded-xl shadow-lg transition">
                + Add User
            </a>
        </div>

        {{-- Search --}}
        <form method="GET" class="mb-6 flex gap-3">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search users by name or email..."
                class="w-full px-4 py-2 rounded-xl bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-5 py-2 rounded-xl transition">
                Search
            </button>
        </form>

        {{-- Table Card --}}
        <div class="bg-gray-900/60 backdrop-blur-lg rounded-2xl shadow-xl overflow-hidden border border-gray-800">

            <table class="w-full text-left">

                <thead class="bg-gray-800 text-gray-300 uppercase text-sm">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($users as $user)
                        <tr class="border-b border-gray-800 hover:bg-gray-800/60 transition">

                            <td class="p-4 font-medium">
                                {{ $user->name }}
                            </td>

                            <td class="p-4 text-gray-300">
                                {{ $user->email }}
                            </td>

                            <td class="p-4 text-center flex justify-center gap-3">

                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-black px-4 py-1 rounded-lg transition">
                                    Edit
                                </a>

                                <a href="{{ route('users.delete', $user->id) }}" onclick="return confirm('Are you sure?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-lg transition">
                                    Delete
                                </a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center p-6 text-gray-400">
                                No users found 😔
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6 flex justify-center">
            {{ $users->links() }}
        </div>

    </div>

</x-app-layout>