<x-app-layout>

    <div class="min-h-screen flex items-center justify-center bg-gray-950 text-white p-6">

        <div class="w-full max-w-md bg-gray-900/70 backdrop-blur-lg border border-gray-800 rounded-2xl shadow-2xl p-8">

            {{-- Header --}}
            <div class="flex items-center justify-between mb-6">

                <a href="{{ route('users.index') }}"
                    class="text-sm bg-gray-800 hover:bg-gray-700 px-3 py-1 rounded-lg transition">
                    ← Back
                </a>

                <h2 class="text-xl font-bold text-center flex-1">
                    ✏️ Edit User
                </h2>

                <div class="w-16"></div> {{-- balance alignment --}}
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-4">
                @csrf

                <input type="text" name="name"
                    value="{{ $user->name }}"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">

                <input type="email" name="email"
                    value="{{ $user->email }}"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">

                <input type="text" name="phone"
                    value="{{ $user->phone }}"
                    placeholder="Phone Number"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">

                {{-- Role --}}
                <select name="role"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>
                        User
                    </option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                        Admin
                    </option>
                </select>

                <input type="password" name="password"
                    placeholder="New Password (leave blank to keep current)"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 focus:ring-2 focus:ring-blue-500 outline-none">

                <button
                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-indigo-600 hover:to-blue-500 text-white py-3 rounded-xl font-semibold transition">
                    Update User
                </button>

            </form>

        </div>

    </div>

</x-app-layout>