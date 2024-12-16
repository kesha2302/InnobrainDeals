<!DOCTYPE html>
<html>
<head>
    <title>Payment Confirmation</title>
</head>
<body>

    <p>Hi {{ $user->fullname }},</p>
    <p>Thank you for your order!</p>
    <p>We will send you another email for activation link.</p>
    <p>Please find below, the summary of your order {{ $checkout->order_id }}</p>

    <h4>Order Details:</h4>
    <table style="border-collapse: collapse; width: 100%; text-align: center; border: 1px solid #000;" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th style="border: 1px solid #000;">Product</th>
                <th style="border: 1px solid #000;">Name</th>
                <th style="border: 1px solid #000;">Price (₹)</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                @foreach ($cartItems as $item)
                <td style="border: 1px solid #000;">
                    <img src="{{ $message->embedData(file_get_contents(public_path('productsimg/' . $item['image'])), $item['image'], 'image/jpeg') }}" style="width: 50px; height: 50px;">
                </td>
                <td style="border: 1px solid #000;">
                    <a href="" target="_blank" style="color: black; text-decoration: none;">{{ $item['name'] }} </a>
                </td>
                    <td style="border: 1px solid #000;">₹{{ $item['price'] }}</td>
                </tr>
                @endforeach
            </tr>

        </tbody>
    </table>

    <p style="margin-top: 30px;">Total Amount: ₹{{ $checkout->total_cost }}</p>

    <table style="border-collapse: collapse; width: 100%; text-align: center; border: 1px solid #000; margin-top:20px;" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th style="border: 1px solid #000;">What Next?</th>
                <th style="border: 1px solid #000;">Any Questions?</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #000;">You will receive an email with activation link.</td>
                <td style="border: 1px solid #000;">Get in touch with our team on +91-7990523663</td>

            </tr>
        </tbody>
    </table>

    <p>Thank you for shopping!</p>
    <p>InnoBrain Deals</p>

</body>
</html>
