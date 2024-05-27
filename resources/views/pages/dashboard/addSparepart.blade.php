@extends('pages.dashboard.layout')

@section('content')

<div class="py-5 px-10">
    <h3 class="text-xl mb-5 text-gray-200">Add Spare Part</h3>
    <div class="space-y-4">
        <form class="space-y-4" action="{{ route('spareparts.store') }}" method="post">
            @csrf
            <div class="mb-5">
                <label for="part_name" class="block mb-2 text-sm text-gray-900 dark:text-white">Part Name</label>
                <input type="text" id="part_name" name="part_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Part Name" required />
            </div>

            <div class="mb-5">
                <label for="part_reference" class="block mb-2 text-sm text-gray-900 dark:text-white">Part Reference</label>
                <input type="text" id="part_reference" name="part_reference" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Part Reference" required />
            </div>

            <div class="mb-5">
                <label for="supplier" class="block mb-2 text-sm text-gray-900 dark:text-white">Supplier</label>
                <input type="text" id="supplier" name="supplier" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Supplier" required />
            </div>

            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm text-gray-900 dark:text-white">Price</label>
                <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Price" required />
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
