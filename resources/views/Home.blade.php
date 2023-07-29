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
    <script src="{{ asset('js/submit.js') }}"></script>
    <div class="flex justify-center mt-10">
        <form id="parkingForm" method="POST">
            @csrf <!-- Adding CSRF token -->
            <table>
                <tr class="pt-5">
                    <td class="px-2">Name</td>
                    <td class="px-2"><input type="text" class="border" name="name" id="name"></td>
                </tr>
                <tr class="mt-2">
                    <td class="px-2">Car Plat</td>
                    <td class="px-2"><input type="text" class="border" name="car_plat" id="carPlat" ></td>
                </tr>
                <tr class="mt-2">
                    <td class="px-2">Phone</td>
                    <td class="px-2"><input type="text" class="border" name="phone" id="phone"></td>
                </tr>
                <tr class="mt-2">
                    <td class="px-2">Service</td>
                    <td class="px-2">
                        <select name="service" class="border" id="service">
                            <option value="Regular">Regular 2.5$/hour</option>
                            <option value="Vip">Vip 5$/hour</option>
                        </select>
                    </td>
                </tr>
                <tr class="pt-2 mt-2">
                    <td colspan="2" class="text-center">
                        <button type="button" class="px-2 border rounded-md text-yellow-50 bg-blue-700 hover:shadow-lg" onclick="submitData()">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>
