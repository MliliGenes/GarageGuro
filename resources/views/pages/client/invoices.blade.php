
@extends('pages.dashboard.layout')

@section('content')

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
                    <a href="{{ route('factures.download', $facture->id) }}" class="p-1">
                        <i class="fa-solid fa-download text-blue-600"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>

    console.log(@json(auth()->user()->vehicles->toArray()));
</script>

@endsection


