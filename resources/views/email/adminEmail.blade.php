<!DOCTYPE html>
<html>

<head>
    <title>Sales Order</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $body }}</p>
    <a href="{{ $sales_pdf_path }}" download="{{ $sales_pdf_path }}">Click here to download Sales Order PDF</a> <br>
    <a href="{{ $purchase_pdf_path }}" download="{{ $purchase_pdf_path }}">Click here to download Purchase Order PDF</a>
    <p>Thank you</p>
</body>

</html>
