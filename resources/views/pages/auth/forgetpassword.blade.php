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
        <h2 class="text-4xl text-slate-800 ">Log In</h2>
    </div>
    <form action="{{route("forget.password.post")}}" method="post" class="flex flex-col gap-2" >
        @csrf
        <div class="flex flex-col gap-2">
            <label for="email" class="text-slate-500 block text-sm pl-2">Email</label>
            <input class="w-full py-2 px-3 rounded shadow-md" type="email" name="email" id="" >
        </div>


        <div class="mt-5 flex">
            <button type="submit" class="py-2 px-3 w-full bg-slate-800 text-slate-200 rounded text-md shadow-md">Reset Password</button>
        </div>
    </form>
</div>

@endsection
