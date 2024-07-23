document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('registerForm');

    registerForm.addEventListener('submit', function(event) {
        event.preventDefault(); 
        
        const email = document.getElementById('registerEmail').value.trim();
        const password = document.getElementById('registerPassword').value.trim();
        const confirmPassword = document.getElementById('registerConfirmPassword').value.trim();
        let isValidData = true;
        
        if (email === '' || password === '' || confirmPassword === '') {
            alert('Please fill in all fields.');
            isValidData = false;
            return;
        }
        
        if (password.length < 8 || !validatePassword(password)) {
            alert('Password must be at least 8 characters long and contain a mix of letters, numbers, and special characters.');
            isValidData = false;
            return;
        }
        
        if (password !== confirmPassword) {
            alert('Passwords do not match. Please enter matching passwords.');
            isValidData = false;
            return;
        }
        
        function validatePassword(password) {
            const re = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@$#!%*?&]{8,}$/;
            return re.test(password);
        }
        
        if (isValidData) {
            alert('Successfully registered!\nEmail: ' + email);
            registerForm.submit(); 
        }
    });
});