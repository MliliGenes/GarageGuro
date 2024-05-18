@extends('pages.dashboard.layout')

@section('content')

<div class="py-5 px-10">
    <h3 class="text-xl mb-5 text-gray-200">
        Add Vehicle
    </h3>
    <div class="space-y-4">
        <form class="space-y-4" action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="make" class="block mb-2 text-sm text-gray-900 dark:text-white">Make</label>
                <input type="text" id="make" name="make" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Make" required />
            </div>

            <div class="mb-5">
                <label for="model" class="block mb-2 text-sm text-gray-900 dark:text-white">Model</label>
                <input type="text" id="model" name="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Model" required />
            </div>

            <div class="mb-5">
                <label for="fuelType" class="block mb-2 text-sm text-gray-900 dark:text-white">Fuel Type</label>
                {{-- <input type="text" id="fuelType" name="fuelType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fuel Type" required /> --}}
                <select id="fuelType" name="fuelType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option selected>Choose a fuel type</option>
                    <option value="Gasoline">Gasoline</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                  </select>
            </div>

            <div class="mb-5">
                <label for="registration" class="block mb-2 text-sm text-gray-900 dark:text-white">Registration</label>
                <input type="text" id="registration" name="registration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Registration" required />
            </div>

            <div class="mb-5">
                <label for="photos" class="block mb-2 text-sm text-gray-900 dark:text-white">Photos</label>
                <input type="file" id="photos" name="photos[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" multiple />
            </div>

            <div class="mb-5">
                <label for="clientID" class="block mb-2 text-sm text-gray-900 dark:text-white">Client ID</label>
                {{-- <input type="text" id="clientID" name="clientID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Client ID" required /> --}}
                <select id="clientID" name="clientID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option selected>Choose a client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->firstName }} {{ $client->lastName }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Add
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
