<!DOCTYPE html>
<html>
<head>
    <title>Invoice Created</title>
</head>
<body>
    <h1>Your Invoice Has Been Created</h1>
    <p>Dear {{ $owner->firstName }},</p>
    <p>Your invoice for the vehicle with ID {{ $vehicle->id }} has been created with the following details:</p>
    <ul>
        <li>Repair ID: {{ $facture->repairID }}</li>
        <li>Additional Charges: ${{ $facture->additionalCharges }}</li>
        <li>Total Amount: ${{ $facture->totalAmount }}</li>
    </ul>
    <p>Thank you for your business!</p>
</body>
</html>
