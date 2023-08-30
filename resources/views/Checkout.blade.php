<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Parking</title>
    <script src="https://js.stripe.com/v3/"></script>
    @vite('resources/css/app.css')
</head>
<body>
    <script src="{{ asset('js/Exit.js') }}"></script>
    <div class="flex justify-center mt-10">
        <form id="parkingForm" method="POST">
            @csrf <!-- Adding CSRF token -->
            <table class="border">
                <tr class="pt-5 border-indigo-600 border">
                    <td class="px-2 border-indigo-600 border ">Name</td>
                    <td class="px-2 border-indigo-600 border">Car Plat</td>
                    <td class="px-2 border-indigo-600 border">Phone</td>
                    <td class="px-2 border-indigo-600 border">Service</td>
                    <td class="px-2 border-indigo-600 border">enter</td>
                    <td class="px-2 border-indigo-600 border">exit</td>
                    <td class="px-2 border-indigo-600 border">duration</td>
                    <td class="px-2 border-indigo-600 border">Total</td>
                </tr>
                <tr class="mt-2 border-indigo-600 border h-6">
                    <td class="px-2 border-indigo-600 border"><div id="name"></div></td>
                    <td class="px-2 border-indigo-600 border"><div id="carplate"></div></td>
                    <td class="px-2 border-indigo-600 border"><div id="phone"></div></td>
                    <td class="px-2 border-indigo-600 border"><div id="service"></div></td>
                    <td class="px-2 border-indigo-600 border"><div id="enter"></div></td>
                    <td class="px-2 border-indigo-600 border"><div id="exit"></div></td>
                    <td class="px-2 border-indigo-600 border"><div id="duration"></div></td>
                    <td class="px-2 border-indigo-600 border"><div id="total"></div></td>
                </tr>
            </table>
            <div class="flex flex-row justify-center mt-5 ">
                <form action="/checkout" method="POST">
                    <button type="submit" id="checkout-button" class="bg-green-500 border rounded-md border-green-300">Checkout</button>
                </form>
            </div>

        </form>

</body>
</html>
