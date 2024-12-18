<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px; /* Reduce font size */
            line-height: 1.4; /* Compact line height */
            margin: 0;
            padding: 0;
        }

        h2 {
            font-size: 16px; /* Adjust title size */
            text-align: center;
            margin: 5px 0;
        }

        h4 {
            margin: 3px 0; /* Reduce margin between lines */
        }

        .container {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        .image-container {
            text-align: center; /* Center-align the image */
            margin-top: 10px;
        }

        img {
            max-width: 100px; /* Limit image size */
            height: auto;
        }

        .details {
            border: 1px solid #000; /* Add a border for better structure */
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Order Details</h2>

        <div class="details">
            <h4><strong>Customer Name:</strong> {{$order->name}}</h4>
            <h4><strong>Customer Email:</strong> {{$order->Email}}</h4>
            <h4><strong>Customer Phone Number:</strong> {{$order->phone}}</h4>
            <h4><strong>Customer Address:</strong> {{$order->address}}</h4>
            <h4><strong>Customer ID:</strong> {{$order->user_id}}</h4>

            <h4><strong>Product Name:</strong> {{$order->product_title}}</h4>
            <h4><strong>Product Quantity:</strong> {{$order->quantity}}</h4>
            <h4><strong>Product Price:</strong> {{$order->price}}</h4>
            <h4><strong>Product ID:</strong> {{$order->product_id}}</h4>
            <h4><strong>Payment Status:</strong> {{$order->payment_status}}</h4>
            <h4><strong>Delivery Status:</strong> {{$order->delivery_status}}</h4>
        </div>

        <div class="image-container">
            <img src="product/{{$order->image}}" alt="Product Image">
        </div>
    </div>

</body>
</html>
