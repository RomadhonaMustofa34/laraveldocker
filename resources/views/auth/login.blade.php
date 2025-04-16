<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white shadow-xl rounded-3xl p-8 space-y-6">
        <h2 class="text-3xl font-semibold text-center text-gray-800">Login</h2>

        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-4 rounded-lg text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">
            </div>

            <div>
                <label class="block text-sm text-gray-700">Password</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none">
                Login
            </button>
        </form>

        <p class="text-center text-sm text-gray-500">
            Belum punya akun? <a href="#" class="text-blue-600 hover:underline">Daftar di sini</a>
        </p>
    </div>

</body>
</html>
