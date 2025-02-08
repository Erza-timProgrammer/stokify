<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-l from-white to-blue-600">
    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
        <!-- Wrapper untuk Logo dan Form -->
        <div class="w-full flex flex-col items-center space-y-4 sm:max-w-md">
            <!-- LOGO -->
            @if ($setting)
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="w-20 h-20">
                <h1 class="text-xl font-bold text-white">{{ $setting->app_name }}</h1>
            @endif

            <!-- FORM LOGIN -->
            <div class="w-full bg-white rounded-lg shadow p-6 space-y-4 md:space-y-6 sm:p-8">
                @if ($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                <form class="space-y-4 md:space-y-6" method="POST" action="">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                            placeholder="name@example.com" 
                            required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" 
                            required>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Sign in
                    </button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
