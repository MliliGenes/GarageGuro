@extends('pages.dashboard.layout')

@section('content')

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

<div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Repair ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Repair amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Additional Charges
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        fixed by
                    </th>
                    <th scope="col" class="px-6 py-3">
                        car owner
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factures as $facture)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$facture->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$facture->reparation->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$facture->amount}}
                    </td>
                    <td class="px-6 py-4">
                        {{$facture->additionalCharges}}
                    </td>
                    <td class="px-6 py-4">
                        {{$facture->totalAmount}}
                    </td><td class="px-6 py-4">
                        {{$facture->reparation->mechanic->firstName}} {{$facture->reparation->mechanic->lastName}}
                    </td>
                    <td class="px-6 py-4">
                        {{$facture->reparation->vehicle->client->firstName}} {{$facture->reparation->vehicle->client->lastName}}
                    </td>

                    <td class="px-6 py-4 text-md">
                        <button class="remove-btn p-1" data-id="{{$facture->id}}"><i class="fa-solid fa-trash text-red-600"></i></button>
                        <button class="update-btn p-1" data-id="{{$facture->id}}"><i class="fa-solid fa-pen-to-square text-green-600"></i></button>
                        <a href="{{ route('factures.download', $facture->id) }}" class="p-1">
                            <i class="fa-solid fa-download text-blue-600"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Main modal --><div id="delete-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center md:inset-0 h-full bg-black bg-opacity-50">
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
                    Are you sure you want to delete this invoice?
                </p>
                <form class="flex justify-end space-x-4" action="{{route('factures.destroy')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="delete-id">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" id="confirm-delete-btn">
                        Confirm Delete
                    </button>
                    <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="delete-modal">
                        Cancel
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="update-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center md:inset-0 h-full bg-black bg-opacity-50">
        <!-- Modal content -->
        <div class="absolute top-1/2 left-1/2 w-full max-w-md -translate-x-1/2 -translate-y-1/2 bg-white shadow dark:bg-gray-700">
            <!-- Modal header and body -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Update Invoice
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form class="space-y-4" action="{{ route('factures.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="update-id">

                    <div class="mb-5">
                        <label for="repairID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repair ID</label>
                        <input type="text" id="repairID" name="repairID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Repair ID" required />
                    </div>

                    <div class="mb-5">
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repair Amount</label>
                        <input type="number" id="amount" name="amount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Repair Amount" required />
                    </div>

                    <div class="mb-5">
                        <label for="additionalCharges" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Additional Charges</label>
                        <input type="number" id="additionalCharges" name="additionalCharges" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Additional Charges" required />
                    </div>

                    <div class="mb-5">
                        <label for="totalAmount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Amount</label>
                        <input type="number" id="totalAmount" name="totalAmount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Total Amount" required />
                    </div>

                    <div class="flex justify-end space-x-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Update Invoice
                        </button>
                        <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="update-modal">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $(document).ready(function() {
            // Calculate total amount on change of either amount or additionalCharges
            $("#amount, #additionalCharges").on("change", function() {
                var amount = parseFloat($("#amount").val()) || 0;
                var additionalCharges = parseFloat($("#additionalCharges").val()) || 0;
                var totalAmount = amount + additionalCharges;
                $("#totalAmount").val(totalAmount.toFixed(2)); // Set total amount with 2 decimal places
            });
            });
        </script>
    </div>

    <div class="bg-gray-600">
        {{ $factures->links() }}
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
            let facture =  await fetch('/factures/get/' + id);
            let factureData = await facture.json()
            console.log(factureData);
            $('#repairID').val(factureData.repairID);
            $('#amount').val(factureData.amount);
            $('#additionalCharges').val(factureData.additionalCharges);
            $('#totalAmount').val(factureData.totalAmount);
            // Show the update modal
            $('#update-modal').removeClass('hidden');
            $('#update-id').val(id);
        });

        $('[data-modal-hide]').click(function(){
            var targetModal = $(this).attr('data-modal-hide');
            $('#' + targetModal).addClass('hidden');
        });

        var facturesJson = @json($factures);
        console.log(facturesJson);
    });
</script>
@endSection
