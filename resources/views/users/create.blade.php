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
                    ➕ Add User
                </h2>

                <div class="w-16"></div>
            </div>

            {{-- Form --}}
            <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                @csrf

                <input type="text" name="name" placeholder="Full Name"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700">

                <input type="email" name="email" placeholder="Email Address"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700">

                <input type="text" name="phone" placeholder="Phone Number"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700">

                <input type="password" name="password" placeholder="Password"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700">

                {{-- Role Dropdown --}}
                <select name="role"
                    class="w-full px-4 py-3 rounded-xl bg-gray-800 border border-gray-700 text-white">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>

                <button class="w-full bg-green-600 hover:bg-green-500 py-3 rounded-xl">
                    Save User
                </button>

            </form>

        </div>

    </div>

</x-app-layout>