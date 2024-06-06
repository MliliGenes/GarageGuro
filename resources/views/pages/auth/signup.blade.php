@extends('pages.auth.layout')

@section('content')

@if ($errors->any())
            <div class="absolute top-0 right-0 w-full p-2">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
@endif


<div class="px-20 py-4 w-full">
    <div class="mb-8">
        <h2 class="text-4xl text-gray-800 mb-2">Sign Up</h2>
        <p class="text-gray-500 text-md ">Sign up now and start exploring our platform!</p>
    </div>
    <form action="" method="post" class="flex flex-col gap-2" >
        @csrf
       <div class="flex gap-4">
        <div class="flex flex-col gap-2 flex-1">
            <label for="first_name" class="text-gray-500 block text-sm pl-2">First Name</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="text" name="first_name" id="" >
        </div>
        <div class="flex flex-col gap-2 flex-1">
            <label for="first_name" class="text-gray-500 block text-sm pl-2">Last Name</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="text" name="last_name" id="" >
        </div>
       </div>
        <div class="flex flex-col gap-2">
            <label for="email" class="text-gray-500 block text-sm pl-2">Phone</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="phone" name="phone" id="" >
        </div>
        <div class="flex flex-col gap-2">
            <label for="address" class="text-gray-500 block text-sm pl-2">Address</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="text" name="address" id="" >
        </div>
        <div class="flex flex-col gap-2">
            <label for="email" class="text-gray-500 block text-sm pl-2">Email</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="email" name="email" id="" >
        </div>
        <div class="flex flex-col gap-2">
            <label for="password" class="text-gray-500 block text-sm pl-2">Password</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="password" name="password" id="" >
        </div>

        <div class="mt-5 flex">
            <button type="submit" class="py-2 px-3 w-full bg-gray-800 text-gray-200 rounded text-md shadow-md">Register</button>
        </div>
        <div class="mt-5 text-center">
            <p class="text-sm text-gray-500">Already have an account? <a href="{{ route('login') }}" class="text-gray-800">Log In</a></p>
        </div>
    </form>
</div>

@endsection
