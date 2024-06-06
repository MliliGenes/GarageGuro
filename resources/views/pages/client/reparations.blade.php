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
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Start Date
                </th>
                <th scope="col" class="px-6 py-3">
                    End Date
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($reparations as $reparation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$reparation->id}}
                </th>
                <td class="px-6 py-4">
                    {{$reparation->description}}
                </td>
                <td class="px-6 py-4">
                    {{$reparation->status}}
                </td>
                <td class="px-6 py-4">
                    {{$reparation->startDate}}
                </td>
                <td class="px-6 py-4">
                    {{$reparation->endDate}}
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
