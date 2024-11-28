<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .order-details {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .order-details th, .order-details td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .order-details th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Order Confirmation</h2>
            <p>Thank you for your order, {{ $order->first_name }}!</p>
        </div>

        <table class="order-details">
            <tr>
                <th>First Name</th>
                <td>{{ $order->first_name }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $order->last_name }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $order->address }}, {{ $order->house }}, {{ $order->city }}, {{ $order->state }}, {{ $order->postal_code }}, {{ $order->country }}</td>
            </tr>
            <tr>
                <th>ZIP</th>
                <td>{{ $order->zip }}</td>
            </tr>
            <tr>
                <th>Saved Address?</th>
                <td>{{ $order->save_address ? 'Yes' : 'No' }}</td>
            </tr>
            <tr>
                <th>Message</th>
                <td>{{ $order->message }}</td>
            </tr>
            <tr>
                <th>Payment Method</th>
                <td>{{ $order->payment_method }}</td>
            </tr>
            <tr>
                <th>Total Amount</th>
                <td>${{ number_format($order->total_amount, 2) }}</td>
            </tr>
            <tr>
                <th>Order Status</th>
                <td>{{ $order->status }}</td>
            </tr>
            <tr>
                <th>Shipment ID</th>
                <td>{{ $order->shipment_id }}</td>
            </tr>

        </table>

        <div class="footer">
            <p>If you have any questions, feel free to contact our support team.</p>
        </div>
    </div>
</body>
</html>
