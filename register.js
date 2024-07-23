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
        
        if (password.length < 8) {
            alert('Password must be at least 8 characters long.');
            isValidData = false;
            return;
        }
        
        if (!containsUppercase(password)) {
            alert('Password must contain at least one uppercase letter.');
            isValidData = false;
            return;
        }
        
        if (!containsSpecialCharacter(password)) {
            alert('Password must contain at least one special character.');
            isValidData = false;
            return;
        }
        
        if (!containsDigit(password)) {
            alert('Password must contain at least one digit.');
            isValidData = false;
            return;
        }
        
        if (password !== confirmPassword) {
            alert('Passwords do not match. Please enter matching passwords.');
            isValidData = false;
            return;
        }
        
        function containsUppercase(password) {
            for (let i = 0; i < password.length; i++) {
                if (password[i] >= 'A' && password[i] <= 'Z') {
                    return true;
                }
            }
            return false;
        }
        
        function containsSpecialCharacter(password) {
            const specialCharacters = "!@#$%^&*()_-+={[}]|:;'<,>.?/";
            for (let i = 0; i < password.length; i++) {
                if (specialCharacters.includes(password[i])) {
                    return true;
                }
            }
            return false;
        }
        
        function containsDigit(password) {
            for (let i = 0; i < password.length; i++) {
                if (password[i] >= '0' && password[i] <= '9') {
                    return true;
                }
            }
            return false;
        }
        
        if (isValidData) {
            alert('Successfully registered!\nEmail: ' + email);
            registerForm.submit(); 
        }
    });
});
