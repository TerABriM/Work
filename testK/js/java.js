

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