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

            <div class="flex flex-row justify-center mt-5">
                <div class="mr-5"><label for="ticket">Ticket</label></div>
                <div><input type="text" class="border" name="ticket" id="ticket"></div>
            </div>
            <div class="flex flex-row justify-center mt-5">
                <div><input type="button" class="border bg-indigo-500 hover:bg-indigo-100" onclick="SubmitData()"  value="Checkout"></div>
            </div>

        </form>

</body>
</html>
