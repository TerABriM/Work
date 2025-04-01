
function validateFormAndRedirect() {
    if (validateForm()) {
        fetch('register.php', {
            method: 'POST',
            body: new FormData(document.getElementById('panel'))
        })
        .then(response => {
            if (response.ok) {
                window.location.href = 'success.html';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
        
        return false;
    }
    return false;
}

function validateForm() {
    // Ваша существующая логика валидации
    // ...
    return true; // или false в зависимости от проверок
}

document.getElementById('terms').addEventListener('change', function() {
    document.getElementById('submitBtn').disabled = !this.checked;
});

function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.querySelector(`#${fieldId} + .toggle-password i`);
    if (field.type === 'password') {
        field.type = 'text';
        icon.classList.replace('bx-hide', 'bx-show');
    } else {
        field.type = 'password';
        icon.classList.replace('bx-show', 'bx-hide');
    }
}

const termsCheckbox = document.getElementById('terms');
        const submitBtn = document.getElementById('submitBtn');

        termsCheckbox.addEventListener('change', function() {
            // Если галочка поставлена, кнопка активна, иначе — заблокирована
            submitBtn.disabled = !this.checked;
        });

        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const toggleBtn = passwordField.nextElementSibling;
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleBtn.innerHTML = '<i class="bx bx-show"></i>';
            } else {
                passwordField.type = "password";
                toggleBtn.innerHTML = '<i class="bx bx-hide"></i>';
            }
        }
       