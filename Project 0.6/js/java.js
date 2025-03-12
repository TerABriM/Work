const inputField = document.getElementById('inputField');
        const toggleButton = document.getElementById('toggleButton');
        const output = document.getElementById('output');

        let isVisible = false; // Флаг для отслеживания видимости символов

        inputField.addEventListener('input', function() {
            const inputValue = inputField.value;
            const maskedValue = '*'.repeat(inputValue.length);
            output.textContent = `Замаскированная строка: ${maskedValue}`;
        });

        toggleButton.addEventListener('click', function() {
            const inputValue = inputField.value;
            if (isVisible) {
                // Если символы видны, скрываем их
                const maskedValue = '*'.repeat(inputValue.length);
                output.textContent = `Замаскированная строка: ${maskedValue}`;
                toggleButton.textContent = 'Показать символы';
            } else {
                // Если символы скрыты, показываем их
                output.textContent = `password: ${inputValue}`;
                output.textContent = `repeat password: ${inputValue}`;
                toggleButton.textContent = 'Скрыть символы';
            }
            isVisible = !isVisible; // Меняем состояние флага
        });