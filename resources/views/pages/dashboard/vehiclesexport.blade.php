
@extends('pages.dashboard.layout')

@section('content')
<div class="py-5 px-10">
    <h3 class="text-xl mb-5 text-gray-200">
       Export Vehciles
    </h3>
    <a href="{{ route('export.vehicles') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Download .xlsx file
    </a>
    <a href="{{ route('export.vehicles.pdf') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Download pdf
    </a>
</div>
@endsection
