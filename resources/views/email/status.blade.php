<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Status Update</title>
</head>
<body>
    <h1>Your Vehicle Status Update</h1>
    <p>Dear {{ $repair->vehicle->client->firstName }},</p>
    <p>Your vehicle with ID {{ $repair->vehicle->id }} has been updated with the following details:</p>
    <ul>
        <li>Repair ID: {{ $repair->id }}</li>
        <li>Total Amount: ${{ $repair->endDate }}</li>
        <li>Status: {{ $repair->status }}</li>
        <li>Repair ends: {{ $repair->endDate }}</li>
        <li>By: {{$repair->mechanic->firstName}}</li>
    </ul>
    <p>Thank you for your business!</p>
</body>
</html>
