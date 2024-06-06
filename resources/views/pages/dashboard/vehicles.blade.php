@extends('pages.dashboard.layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div>
    <form class="" action="{{route("dashboard.vehicles.search")}}">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900  bg-gray-50 focus:ring-blue-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 " placeholder="Search Vehicles..." required />
            <button type="submit" class="h-full px-6 text-white absolute bottom-0 right-0 bg-blue-700 hover:bg-blue-800 text-md font-normal w-32 text-sm py-2 dark:bg-blue-600 dark:hover:bg-blue-700 uppercase">Search</button>
        </div>
    </form>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Make
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Model
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fuel Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Registration
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Photos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        owner
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$vehicle->id}}
                    </th>
                    <td class="w-20 h-12">
                        @if ($vehicle->photos != null)
                        <img src="{{ asset('storage/'.json_decode($vehicle->photos)[0]) }}" alt="Vehicle Photo" class="object-cover">
                        @endif
                    </td>

                    <td class="px-6 py-4">
                        {{$vehicle->make}}
                    </td>
                    <td class="px-6 py-4">
                        {{$vehicle->model}}
                    </td>
                    <td class="px-6 py-4">
                        {{$vehicle->fuelType}}
                    </td>
                    <td class="px-6 py-4">
                        {{$vehicle->registration}}
                    </td>
                    <td class="px-6 py-4">
                        {{$vehicle->client()->first()->firstName}} {{$vehicle->client()->first()->lastName}}
                    </td>
                    <td class="px-6 py-4 text-md">
                        <button class="remove-btn p-1" data-id="{{$vehicle->id}}"><i class="fa-solid fa-trash text-red-600"></i></button>
                        <button class="update-btn p-" data-id="{{$vehicle->id}}"><i class="fa-solid fa-pen-to-square text-green-600"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




      <!-- Main modal -->
<!-- Main modal -->
    <div id="delete-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center md:inset-0 h-full bg-black bg-opacity-50">
        <!-- Modal content -->
        <div class="absolute top-1/2 left-1/2 w-full max-w-md -translate-x-1/2 -translate-y-1/2 bg-white shadow dark:bg-gray-700">
            <!-- Modal header and body -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Confirm Delete
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="delete-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Are you sure you want to delete this vehicle?
                </p>
                <form class="flex justify-end space-x-4" action="{{route('dashboard.vehicle.delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="delete-id">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="confirm-delete-vehicle-btn">
                        Confirm Delete
                    </button>
                    <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="delete-modal">
                        Cancel
                    </button>
                </form>
            </div>
        </div>
    </div>



    <!-- Main modal --><!-- Main modal -->
<div id="update-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center md:inset-0 h-full bg-black bg-opacity-50">
    <!-- Modal content -->
    <div class="absolute top-1/2 left-1/2 w-full max-w-md -translate-x-1/2 -translate-y-1/2 bg-white shadow dark:bg-gray-700">
        <!-- Modal header and body -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Update Vehicle
            </h3>
            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="p-4 md:p-5 space-y-4">

            <form class="space-y-4" action="{{route('dashboard.vehicle.update')}}" method="post">
                @csrf
                @method('PUT') <!-- Use PUT method for updating -->
                <input type="hidden" name="id" id="update-id">
                <div class="mb-5">
                    <label for="make" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Make</label>
                    <input type="text" id="make" name="make" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Make" required />
                </div>

                <div class="mb-5">
                    <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                    <input type="text" id="model" name="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Model" required />
                </div>

                {{-- <div class="mb-5">
                    <label for="fuelType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Type</label>
                    <input type="text" id="fuelType" name="fuelType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fuel Type" required />
                </div> --}}

                <div class="mb-5">
                    <label for="fuelType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Type</label>
                    <select id="fuelType" name="fuelType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="Gasoline">Gasoline</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Electric">Electric</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label for="registration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Registration</label>
                    <input type="text" id="registration" name="registration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Registration" required />
                </div>

                <div class="mb-5">
                    <label for="clientID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Owner</label>
                    <select id="owner" name="clientID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @foreach($clients as $client)
                                <option value="{{ $client->id }}" >
                                    {{ $client->firstName }} {{ $client->lastName }}
                                </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Vehicle
                    </button>
                    <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="update-modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>




    <div class="bg-gray-600">
        {{ $vehicles->links() }}
    </div>

</div>

<script>
    $(document).ready(function(){
        $(".remove-btn").click(function(){
            var id = $(this).data('id');
            console.log(id);
            // Show the delete modal
            $('#delete-modal').removeClass('hidden');
            $('#delete-id').val(id);
        });

        $(".update-btn").click(async function(){
            var id = $(this).data('id');
            console.log(id);
            let vehicle =  await fetch('/dashboard/vehicle/' + id);
            let vehicleData = await vehicle.json()
            console.log(vehicleData);
            $('#make').val(vehicleData.make);
            $('#model').val(vehicleData.model);
            $('#fuelType').val(vehicleData.fuelType);
            $('#registration').val(vehicleData.registration);
            $('#owner').val(vehicleData.clientID);
            $('#update-modal').removeClass('hidden');
            $('#update-id').val(id);
        });

        $('[data-modal-hide]').click(function(){
            var targetModal = $(this).attr('data-modal-hide');
            $('#' + targetModal).addClass('hidden');
        });

    });
</script>
@endSection
