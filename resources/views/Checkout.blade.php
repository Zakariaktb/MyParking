<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Parking</title>

    @vite('resources/css/app.css')
</head>
<body>
    <script src="{{ asset('js/Exit.js') }}"></script>
    <div class="flex justify-center mt-10">
        <form id="parkingForm" method="POST">
            @csrf <!-- Adding CSRF token -->
            <table>
                <tr class="pt-5">
                    <td class="px-2">Name</td>
                    <td class="px-2"><div id="name"></div></td>
                </tr>
                <tr class="mt-2">
                    <td class="px-2">Car Plat</td>
                    <td class="px-2"><div id="carplate"></div></td>
                </tr>
                <tr class="mt-2">
                    <td class="px-2">Phone</td>
                    <td class="px-2"><div id="phone"></div></td>
                </tr>
                <tr class="mt-2">
                    <td class="px-2">Service</td>
                    <td class="px-2">
                        <div id="service"></div>
                    </td>
                </tr>
                <tr class="pt-2 mt-2">
                    <td colspan="2" class="text-center">
                        <button type="button" class="px-2 border rounded-md text-yellow-50 bg-blue-700 hover:shadow-lg" onclick="submitData()">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
        {{-- @section('content')
        <div>
            <h1>Payment Details</h1>
            <p>Payment ID: {{ $payment->id }}</p>
            <p>Amount: {{ $payment->amount }}</p>
            <!-- Include other payment details here -->
        </div>
    @endsection --}}
</body>
</html>
