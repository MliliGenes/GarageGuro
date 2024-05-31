@extends('pages.dashboard.layout')

@section('content')

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-slate-500 dark:text-slate-400">
        <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-700 dark:text-slate-400">
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
            </tr>
        </thead>
        <tbody>
            @foreach (auth()->user()->vehicles as $vehicle)
            <tr class="bg-white border-b dark:bg-slate-800 dark:border-slate-700">
                <th scope="row" class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-white">
                    {{$vehicle->id}}
                </th>
                <td class=" size-5">
                    @if ($vehicle->photos != null)
                    <img src="{{ asset('storage/'.json_decode($vehicle->photos)[0]) }}" alt="Vehicle Photo">
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>

    console.log(@json(auth()->user()->vehicles->toArray()));
</script>

@endsection
