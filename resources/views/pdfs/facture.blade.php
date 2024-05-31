<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .facture {
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .facture-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .facture-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .facture-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .facture-details th, .facture-details td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        .facture-details th {
            background-color: #f0f0f0;
            color: #333;
            font-weight: bold;
        }
        .facture-details td {
            background-color: #fff;
            color: #555;
        }
        .facture-details tr:nth-child(even) td {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="facture">
        <div class="facture-header">
            <h1>Facture #{{ $facture->id }}</h1>
        </div>
        <div class="facture-details">
            <table>
                <tr>
                    <th>Description</th>
                    <td>{{ $facture->reparation->description }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $facture->created_at->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>${{ number_format($facture->totalAmount - $facture->additionalCharges, 2) }}</td>
                </tr>
                <tr>
                    <th>Additional Charges</th>
                    <td>${{ number_format($facture->additionalCharges, 2) }}</td>
                </tr>
                <tr>
                    <th>Total Amount</th>
                    <td>${{ number_format($facture->totalAmount, 2) }}</td>
                </tr>
                <tr>
                    <th>Mechanic</th>
                    <td>{{ $facture->reparation->mechanic->firstName }} {{ $facture->reparation->mechanic->lastName }}</td>
                </tr>
                <tr>
                    <th>Car Owner</th>
                    <td>{{ $facture->reparation->vehicle->client->firstName }} {{ $facture->reparation->vehicle->client->lastName }}</td>
                </tr>
                <tr>
                    <th>Repair Status</th>
                    <td>{{ $facture->reparation->status }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
