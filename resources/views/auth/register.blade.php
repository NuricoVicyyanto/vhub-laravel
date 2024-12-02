<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                    <h2 class="text-3xl font-semibold text-gray-800">Create Account</h2>
                    <p class="text-gray-500 mt-2">Sign up to get started</p>
                </div>

                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            required 
                            autofocus 
                            autocomplete="name"
                            value="{{ old('name') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300"
                            placeholder="Enter your full name"
                        >
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            required 
                            autocomplete="username"
                            value="{{ old('email') }}"
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
                            autocomplete="new-password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300"
                            placeholder="Create a strong password"
                        >
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300"
                            placeholder="Repeat your password"
                        >
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mb-6">
                            <div class="flex items-center">
                                <input 
                                    type="checkbox" 
                                    name="terms" 
                                    id="terms" 
                                    required
                                    class="h-4 w-4 text-gray-600 focus:ring-gray-500 border-gray-300 rounded"
                                >
                                <label for="terms" class="ml-2 text-sm text-gray-600">
                                    I agree to the 
                                    <a href="{{ route('terms.show') }}" target="_blank" class="text-gray-800 hover:underline">
                                        Terms of Service
                                    </a> 
                                    and 
                                    <a href="{{ route('policy.show') }}" target="_blank" class="text-gray-800 hover:underline">
                                        Privacy Policy
                                    </a>
                                </label>
                            </div>
                        </div>
                    @endif

                    <button 
                        type="submit" 
                        class="w-full py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-300"
                    >
                        Sign Up
                    </button>
                </form>
            </div>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Already have an account? 
                <a href="{{ route('login') }}" class="text-gray-800 hover:underline">
                    Sign In
                </a>
            </p>
        </div>
    </div>
</body>
</html>