

const termsCheckbox = document.getElementById('terms');
        const submitBtn = document.getElementById('submitBtn');

        termsCheckbox.addEventListener('change', function() {
            // Если галочка поставлена, кнопка активна, иначе — заблокирована
            submitBtn.disabled = !this.checked;
        });