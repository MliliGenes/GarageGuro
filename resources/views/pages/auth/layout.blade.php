<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sign Up</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* outline: 1px solid red; */
        }
    </style>
</head>
<body>
    <div class="flex w-screen h-screen bg-slate-200 ">
       <div class="flex-1 h-full bg-slate-800 relative">
        <img src="{{asset('storage/imgs/1.jpg')}}" alt="" class="w-full h-full " style="object-fit:cover ;opacity: 0.8">
        <div class="absolute inset-0 bg-gradient-to-l from-slate-200"></div>
       </div>
       <div class="flex-1 flex justify-center items-center relative">@yield('content')</div>
    </div>
</body>
</html>
