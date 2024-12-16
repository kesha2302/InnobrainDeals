<!DOCTYPE html>
<html>
<head>
    <title>Activation Link</title>
</head>
<body>
    <h2>Hello,</h2>

    <p>Your Activation link details.</p>

    <p><strong>Order Details:</strong></p>
    <ul>
        <li><strong>Order ID:</strong> {{ $orderId }}</li>
        <li><strong>Product ID:</strong> {{ $productId }}</li>
        <li><strong>Product Name:</strong> {{ $productName }}</li>
    </ul>

    <p>{{ $messageContent }}</p>

    <p>Thank you for your purchase!</p>
</body>
</html>
