@extends('pages.dashboard.layout')

@section('content')

<div class="py-5 px-10">
    <h3 class="text-xl mb-5 text-gray-200">
        Update Your Information
    </h3>
    <div class="space-y-4">
        <form class="space-y-4" action="{{ route('user.update', auth()->user()->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="firstName" class="block mb-2 text-sm text-gray-900 dark:text-white">First Name</label>
                <input type="text" id="firstName" name="firstName" value="{{ auth()->user()->firstName }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required />
            </div>

            <div class="mb-5">
                <label for="lastName" class="block mb-2 text-sm text-gray-900 dark:text-white">Last Name</label>
                <input type="text" id="lastName" name="lastName" value="{{ auth()->user()->lastName }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name" required />
            </div>

            <div class="mb-5">
                <label for="address" class="block mb-2 text-sm text-gray-900 dark:text-white">Address</label>
                <input type="text" id="address" name="address" value="{{ auth()->user()->address }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address" required />
            </div>

            <div class="mb-5">
                <label for="phoneNumber" class="block mb-2 text-sm text-gray-900 dark:text-white">Phone Number</label>
                <input type="text" id="phoneNumber" name="phoneNumber" value="{{ auth()->user()->phoneNumber }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Phone Number" required />
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm text-gray-900 dark:text-white">Email</label>
                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required />
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm text-gray-900 dark:text-white">Password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Password" />
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script>

    console.log(@json(auth()->user()->vehicles));
</script>

@endsection
