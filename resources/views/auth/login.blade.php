<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md px-6">
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="p-8">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-semibold text-gray-800">Sign In</h2>
                    <p class="text-gray-500 mt-2">Access your account</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            required 
                            autofocus 
                            autocomplete="username"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300"
                            placeholder="Enter your email"
                        >
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            required 
                            autocomplete="current-password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300"
                            placeholder="Enter your password"
                        >
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                name="remember" 
                                id="remember_me" 
                                class="h-4 w-4 text-gray-600 focus:ring-gray-500 border-gray-300 rounded"
                            >
                            <label for="remember_me" class="ml-2 text-sm text-gray-600">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-800 transition duration-300">
                                Forgot password?
                            </a>
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-300"
                    >
                        Sign In
                    </button>
                </form>
            </div>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-gray-800 hover:underline">
                    Sign Up
                </a>
            </p>
        </div>
    </div>
</body>
</html>