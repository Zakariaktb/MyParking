
function getData() {
    // Create a new FormData instance
    fetch('/transaction', {
        method: 'Get',
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response data here (e.g., show a success message)
        console.log('Data added successfully:', data);
        let user=data.user
        let transaction=data.transaction
        document.getElementById('name').innerHTML=user.name ;
        document.getElementById('phone').innerHTML=user.phone ;
        document.getElementById('carplate').innerHTML=user.car_plate ;
        document.getElementById('service').innerHTML=transaction.service.name ;
    })
    .catch(error => {
        // Handle errors here (e.g., show an error message)
        console.error('Error adding data:', error);
    })
}
document.addEventListener('DOMContentLoaded', function() {
    getData();
});
