<!DOCTYPE html>
<html>
<head>
    <title>Vehicles List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #e2e8f0;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f7fafc;
        }
    </style>
</head>
<body class="p-4">
    <h1 class="text-2xl font-bold mb-4">Vehicles List</h1>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Make</th>
                <th class="px-4 py-2">Model</th>
                <th class="px-4 py-2">Fuel Type</th>
                <th class="px-4 py-2">Registration</th>
                <th class="px-4 py-2">Client ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <td class="border px-4 py-2">{{ $vehicle->make }}</td>
                <td class="border px-4 py-2">{{ $vehicle->model }}</td>
                <td class="border px-4 py-2">{{ $vehicle->fuelType }}</td>
                <td class="border px-4 py-2">{{ $vehicle->registration }}</td>
                <td class="border px-4 py-2">{{ $vehicle->clientID }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
