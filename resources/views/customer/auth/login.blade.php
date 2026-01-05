<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">

    <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-semibold text-gray-700 mb-6 text-center">
            Customer Login
        </h1>

        @if ($errors->any())
            <div class="mb-4 text-sm text-red-600 bg-red-50 p-3 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('customer.login.post') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm text-gray-600 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                >
            </div>

            <div>
                <label class="block text-sm text-gray-600 mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                >
            </div>

            <div class="flex items-center">
                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                    class="mr-2"
                >
                <span class="text-sm text-gray-600">Remember me</span>
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition"
            >
                Login
            </button>
        </form>
    </div>

</body>
</html>
