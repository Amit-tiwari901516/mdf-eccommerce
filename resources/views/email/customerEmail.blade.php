<!DOCTYPE html>
<html>

<head>
    <title>Sales Order</title>
</head>

<body>
    <p>Your Order: 23-{{ $order_id }}-{{ $company }}-PO {{ $po }}-<span
            style="color: red">RUSH</span>-DSO
    </p>
    <p>Placed on: {{ $date }}</p>
    <br>
    <p>Thank you {{ $name }},</p>
    <p>Thank you for placing your Premium Dovetail Drawer Order with Belmont Doors Ltd. at DovetailDrawers.store</p>
    <P>Your order has been placed in our production sequence.</P>
    <p><a href="{{ $pdf_path }}" download="{{ $pdf_path }}">Click here</a> to download Premium Dovetail Drawer
        Sales Order.</p>
    <p>If you have attached drawings, we will contact you shortly to confirm specifications and details.</p>
    <p>If you requested Belmont Delivery, as mentioned, charges will be calculated based on shipping
        destination, quantity, weight, size of items ordered and if skid is required.</p>
    <p>Delivery costs will be calculated and forwarded to Contact email address and confirmed for approval before
        processing.</p>
    <p>If you have any questions about your order, you can either email us at service@belmontdoors.com or if it is
        urgent please call us at 1.905.282.1722.</p>
    <p>Thanks again!</p>
    <p>The Blemont Doors+Dovetail Drawers Team</p>
    <p>Create New possibilities</p>
    <br>
    <p><strong>Belmont Doors Ltd.</p></strong>
    <p>5349 Main gate Drive, Suite 1, Ontario, Canada L4W 1G6
    </p>
    <p>Inquiries:1905.282.1722 or service@BelmontDoors.com</p>

    <script>
        let currentDate = new Date().toJSON().slice(0, 10);
        var currentTime = new Date().toLocaleString('en-US', {
            hour: 'numeric',
            minute: 'numeric',
            hour12: true
        });


        document.getElementById('date').innerHTML = currentDate;
        document.getElementById('time').innerHTML = currentTime;
    </script>
</body>

</html>
