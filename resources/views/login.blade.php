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
    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
              <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class="flex justify-center"> <svg width="80px" height="80px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M444 136.3L123.8 324.8l3.2 371.5 323.3 183 320.2-188.5-3.2-371.5z" fill="#FFFFFF" /><path d="M630 287.6l-20.1-11.4-279.7 164.7L333 767l20.1 11.3-2.8-326z" fill="#06F3FF" /><path d="M746.8 489.8l-8.6 5.2c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l8.6-5.2c4.7-2.9 6.2-9 3.4-13.7-2.9-4.7-9-6.2-13.8-3.4z" fill="#005BFF" /><path d="M638.6 534c-1.6-0.9-3.4-1.3-5.2-1.3-4.9 0-9.9 2.6-13 4.6-20.6 13-38 47.5-38 75.2 0 12.2 3.4 21.4 9.1 24.5 6 3.3 14-0.6 18.2-3.3 20.6-13 38-47.5 38-75.2 0-12.2-3.4-21.3-9.1-24.5z m-9.9 50.4l-8.6 5.2c-1.6 1-3.4 1.4-5.2 1.4-3.4 0-6.7-1.7-8.6-4.8-2.9-4.7-1.3-10.9 3.4-13.7l8.6-5.2c4.7-2.9 10.9-1.3 13.7 3.4 3 4.7 1.5 10.9-3.3 13.7z" fill="#E6E6E6" /><path d="M618.4 567.3l-8.6 5.2c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l8.6-5.2c4.7-2.9 6.2-9 3.4-13.7-2.9-4.7-9.1-6.3-13.8-3.4z" fill="#E6E6E6" /><path d="M444 136.3L123.8 324.8l3.2 371.5 323.3 183 320.1-188.5-3.2-371.5-323.2-183zM166.8 672.9L164 347.6l280.3-165.1 71.2 40.3-280.3 165.1 2.8 325.3-71.2-40.3z m262.8 148.7l-76.5-43.3L333 767l-74.9-42.4-2.8-325.3 280.4-165.1 74.2 42 20.1 11.4 77.8 44-281 165.5 2.8 324.5z m40 0L467 519.8l260.7-153.5 2.6 301.7-260.7 153.6z m287.6-314.7l-8.6 5.2c-1.6 1-3.4 1.4-5.2 1.4-3.4 0-6.7-1.7-8.6-4.8-2.9-4.7-1.3-10.9 3.4-13.7l8.6-5.2c4.7-2.9 10.9-1.3 13.7 3.4 2.9 4.7 1.4 10.9-3.3 13.7z" fill="#005BFF" /><path d="M704 515.6l-8.6 5.2c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l8.6-5.2c4.7-2.9 6.2-9 3.4-13.7-2.9-4.7-9-6.2-13.8-3.4zM827.2 430.8c-5.5 0-10 4.5-10 10v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10c0-5.5-4.5-10-10-10zM837.2 390.8c0-5.5-4.5-10-10-10s-10 4.5-10 10v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10zM837.2 340.8c0-5.5-4.5-10-10-10s-10 4.5-10 10v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10zM837.2 290.8c0-5.5-4.5-10-10-10s-10 4.5-10 10v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10zM803.4 467.4c-2.9-4.7-9-6.3-13.7-3.4l-8.6 5.2c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l8.6-5.2c4.6-2.9 6.1-9 3.3-13.7zM665.3 540.1c-3-10.8-8.9-19.1-17.1-23.6-11.2-6.1-24.8-4.8-38.5 3.9-26.5 16.8-47.3 57.2-47.3 92.1 0 19.9 7.1 35.2 19.5 42 4.6 2.5 9.6 3.8 14.9 3.8 7.5 0 15.6-2.6 23.7-7.7 25.9-16.4 46.4-55.4 47.3-89.7l3.9-2.4c4.7-2.9 6.2-9 3.4-13.7-2.2-3.4-6.1-5.1-9.8-4.7z m-55.6 93.7c-4.2 2.7-12.2 6.6-18.2 3.3-5.7-3.1-9.1-12.3-9.1-24.5 0-27.7 17.4-62.2 38-75.2 3.1-1.9 8.1-4.6 13-4.6 1.8 0 3.6 0.4 5.2 1.3 5.7 3.1 9.1 12.3 9.1 24.5 0 27.7-17.4 62.1-38 75.2z" fill="#005BFF" /><path d="M891.2 321.7c-5.5 0-10 4.5-10 10v156.4l-81.7 49.3c-4.7 2.9-6.2 9-3.4 13.7 1.9 3.1 5.2 4.8 8.6 4.8 1.8 0 3.5-0.5 5.2-1.4l91.4-55.1V331.7c-0.1-5.5-4.6-10-10.1-10zM817.3 239.6c-0.1 0.4-0.1 0.8-0.1 1.3v10c0 5.5 4.5 10 10 10s10-4.5 10-10v-10c0-0.4 0-0.9-0.1-1.3 23.4-4.6 41-25.3 41-50 0-28.2-22.8-51-51-51s-51 22.8-51 51c0 24.7 17.7 45.4 41.2 50z" fill="#005BFF" /></svg>
                </div>
                    @if ($errors->any())
                            <ul>
                                @foreach($errors->all() as $item)
                                <li class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>{{ $item }}</li>
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
                                placeholder="name@company.com" 
                                value="{{ old('email') }}">
                        </div>
                        
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                placeholder="••••••••" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>    
</body>
</html>