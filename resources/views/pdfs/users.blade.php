<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
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
    <h1 class="text-2xl font-bold mb-4">Users List</h1>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">First Name</th>
                <th class="px-4 py-2">Last Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->firstName }}</td>
                <td class="border px-4 py-2">{{ $user->lastName }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
