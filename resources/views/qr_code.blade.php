<!DOCTYPE html>
<html>
<head>
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="{{ asset('css/qr_code.css') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center h-screen  ">
    <div>
        <h1 class="flex items-center justify-center mb-2 ">Scan The Qr-code</h1>
        {{ $qrCode }}
    </div>
</body>
</html>
