<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>
    <style>
        *{
            /* outline: 1px solid red; */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body">
    <div class="flex flex-col min-h-screen">
        @include('components.header')
        <div class="flex w-full">
            @include('components.sidebar')
            <main class=" flex-1 bg-gray-900 ">
                <div class="w-full flex-1 overflow-y-auto h-screen">
                    @yield('content')
                </div>
            </main>
        </div>
        @include('components.footer')
    </div>
</body>
</html>
