<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
                    <h2 class="text-3xl font-semibold text-gray-800">Reset Password</h2>
                    <p class="text-gray-500 mt-2">Recover access to your account</p>
                </div>

                @if (session('status'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4 text-sm text-gray-600">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email Address</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            required 
                            autofocus 
                            autocomplete="username"
                            value="{{ old('email') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300"
                            placeholder="Enter your registered email"
                        >
                    </div>

                    <button 
                        type="submit" 
                        class="w-full py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 transition duration-300"
                    >
                        Email Password Reset Link
                    </button>
                </form>
            </div>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Remember your password? 
                <a href="{{ route('login') }}" class="text-gray-800 hover:underline">
                    Back to Login
                </a>
            </p>
        </div>
    </div>
</body>
</html>