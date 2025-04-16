<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white shadow-2xl rounded-xl p-8 space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-semibold text-gray-800">LOGIN</h2>
            <p class="mt-2 text-sm text-gray-500">Please enter your credentials to access your account</p>
        </div>

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
                <label class="block text-sm text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out placeholder-gray-400">
            </div>

            <div>
                <label class="block text-sm text-gray-700 font-medium">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out placeholder-gray-400">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" id="remember"
                        class="text-blue-500 focus:ring-blue-500 rounded-sm">
                    <label for="remember" class="text-sm text-gray-600">Remember Me</label>
                </div>
                <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-all duration-300 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none">
                Login
            </button>
        </form>

        <p class="text-center text-sm text-gray-500">
            Don’t have an account? <a href="#" class="text-blue-600 hover:underline">Sign up here</a>
        </p>
    </div>

</body>

</html>
