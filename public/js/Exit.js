
function getData() {
    // Create a new FormData instance
    fetch('/transaction', {
        method: 'Get',
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response data here (e.g., show a success message)
        console.log('Data added successfully:', data);
        let user=data.original.original.user
        let transaction=data.original.original.transaction
        document.getElementById('name').innerHTML=user.name ;
        document.getElementById('phone').innerHTML=user.phone ;
        document.getElementById('carplate').innerHTML=user.car_plate ;
        document.getElementById('service').innerHTML=transaction.service.name ;
        document.getElementById('enter').innerHTML=transaction.entered_at ;
        document.getElementById('exit').innerHTML=transaction.exit_at ;
        document.getElementById('duration').innerHTML=transaction.duration ;
        document.getElementById('total').innerHTML=transaction.total +'$' ;
    })
    .catch(error => {
        // Handle errors here (e.g., show an error message)
        console.error('Error adding data:', error);
    })
}
document.addEventListener('DOMContentLoaded', function() {
    getData();
});
function SubmitData() {
    let ticket =document.getElementById("ticket").value;
    let formData=new FormData();
    console.log(ticket);
    formData.append('token',ticket);
    fetch('/stripe', {
        method: 'Post',
        body:formData,
    })
    .then(response => response.json())
    .then(data => {
        // Handle the response data here (e.g., show a success message)
        console.log('Done')
    })
    .catch(error => {
        // Handle errors here (e.g., show an error message)
        console.error('Error adding data:', error);
    })
}
document.addEventListener('DOMContentLoaded', function() {
    getData();
});
