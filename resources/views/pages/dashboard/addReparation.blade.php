@extends('pages.dashboard.layout')

@section('content')

<div class="py-5 px-10">
    <h3 class="text-xl mb-5 text-gray-200">Add Reparation</h3>
    <div class="space-y-4">
        <form class="space-y-4" action="{{ route('reparations.store') }}" method="post">
            @csrf
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm text-gray-900 dark:text-white">Description</label>
                <input type="text" id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required />
            </div>

            <div class="mb-5">
                <label for="status" class="block mb-2 text-sm text-gray-900 dark:text-white">Status</label>
                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="startDate" class="block mb-2 text-sm text-gray-900 dark:text-white">Start Date</label>
                <input type="date" id="startDate" name="startDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>

            <div class="mb-5">
                <label for="endDate" class="block mb-2 text-sm text-gray-900 dark:text-white">End Date</label>
                <input type="date" id="endDate" name="endDate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>

            <div class="mb-5">
                <label for="mechanicNotes" class="block mb-2 text-sm text-gray-900 dark:text-white">Mechanic Notes</label>
                <textarea id="mechanicNotes" name="mechanicNotes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mechanic Notes"></textarea>
            </div>

            <div class="mb-5">
                <label for="clientNotes" class="block mb-2 text-sm text-gray-900 dark:text-white">Client Notes</label>
                <textarea id="clientNotes" name="clientNotes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Client Notes"></textarea>
            </div>

            <div class="mb-5">
                <label for="mechanicID" class="block mb-2 text-sm text-gray-900 dark:text-white">Mechanic ID</label>
                <input type="number" id="mechanicID" name="mechanicID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
            </div>

            <div class="mb-5">
                <label for="vehicleID" class="block mb-2 text-sm text-gray-900 dark:text-white">Vehicle ID</label>
                <input type="number" id="vehicleID" name="vehicleID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
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
