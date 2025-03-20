function validateForm() {
    const checkbox = document.getElementById('agreeCheckbox');
    if (!checkbox.checked) {
        alert('Пожалуйста, отметьте галочку, чтобы продолжить регистрацию.');
        return false;
    }
    return true;
}

