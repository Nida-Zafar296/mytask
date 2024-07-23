document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); 
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;

        if (email === '' || password === '') {
            alert('Please fill in all fields.');
            return;
        }

        else{
        alert('welcome!');
        loginForm.submit();
        }
    });
});