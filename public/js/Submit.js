// submit.js
function submitData() {
    let name = document.getElementById('name').value;
    let phone = document.getElementById('phone').value;
    let car_plate = document.getElementById('carPlat').value;
    let service = document.getElementById('service').value;
    // Create a new FormData instance
    let formData = new FormData();
    formData.append('name', name);
    formData.append('phone', phone);
    formData.append('car_plate', car_plate);
    formData.append('service', service);
    fetch('/user', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response data here (e.g., show a success message)
        console.log('Data added successfully:', data);
    })
    .catch(error => {
        // Handle errors here (e.g., show an error message)
        console.error('Error adding data:', error);
    });
}


