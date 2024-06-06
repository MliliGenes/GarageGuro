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
        <h2 class="text-4xl text-gray-800 mb-2">Reset Password</h2>
        <p class="text-gray-500 text-md">Enter your new password below.</p>
    </div>
    <form action="{{ route('reset.password.post') }}" method="post" class="flex flex-col gap-2">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="flex flex-col gap-2">
            <label for="email_address" class="text-gray-500 block text-sm pl-2">E-Mail Address</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="email" name="email" id="email_address" required autofocus>
            @if ($errors->has('email'))
                <span class="text-danger text-sm">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="flex flex-col gap-2">
            <label for="password" class="text-gray-500 block text-sm pl-2">Password</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="password" name="password" id="password" required>
            @if ($errors->has('password'))
                <span class="text-danger text-sm">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="flex flex-col gap-2">
            <label for="password_confirmation" class="text-gray-500 block text-sm pl-2">Confirm Password</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="password" name="password_confirmation" id="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-sm">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div class="mt-5 flex">
            <button type="submit" class="py-2 px-3 w-full bg-gray-800 text-gray-200 rounded text-md shadow-md">Reset Password</button>
        </div>


    </form>
</div>

@endsection
