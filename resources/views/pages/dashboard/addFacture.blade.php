@extends('pages.dashboard.layout')

@section('content')

<div class="py-5 px-10">
    <h3 class="text-xl mb-5 text-gray-200">
        Add Facture
    </h3>
    <div class="space-y-4">
        <form class="space-y-4" action="{{ route('factures.store') }}" method="post">
            @csrf

            <div class="mb-5">
                <label for="repairID" class="block mb-2 text-sm text-gray-900 dark:text-white">Repair ID</label>
                <select id="repairID" name="repairID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @foreach ($reparations as $reparation)
                        <option value="{{ $reparation->id }}">{{ $reparation->description }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="additionalCharges" class="block mb-2 text-sm text-gray-900 dark:text-white">Additional Charges</label>
                <input type="number" id="additionalCharges" name="additionalCharges" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Additional Charges" step="0.01" required />
            </div>

            <div class="mb-5">
                <label for="totalAmount" class="block mb-2 text-sm text-gray-900 dark:text-white">Total Amount</label>
                <input type="number" id="totalAmount" name="totalAmount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Total Amount" step="0.01" required />
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
