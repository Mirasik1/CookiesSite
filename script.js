let count = 0; // Счётчик нажатий

document.addEventListener('DOMContentLoaded', () => {
    const cookieButton = document.getElementById('cookieButton');
    const clickCountDisplay = document.getElementById('clickCount');

    cookieButton.addEventListener('click', () => {
        count++;
        clickCountDisplay.textContent = `Нажатий: ${count}`;

        // Добавление "дрожания" при каждом клике
        shakeButton(cookieButton);

        if (count >= 90 && count < 100) {
            // Меняем местоположение на случайное начиная с 90-го клика
            randomPosition(cookieButton);
        }

        if (count >= 100) {
            // Показываем конфетти при 100 и более нажатиях
            showConfetti();
            setTimeout(() => {
                alert('Поздравляем! 100 и более нажатий!');
                window.location.href = 'nextpage.html'; // Замените 'nextpage.html' на ваш URL
            }, 1500); 
        }
    });
});

function shakeButton(button) {
    button.classList.add('shake');
    setTimeout(() => {
        button.classList.remove('shake');
    }, 500); // Длительность анимации "тряски" соответствует вашему CSS
}

function randomPosition(button) {
    const x = Math.floor(Math.random() * (window.innerWidth - button.offsetWidth));
    const y = Math.floor(Math.random() * (window.innerHeight - button.offsetHeight));
    button.style.position = 'fixed';
    button.style.left = `${x}px`;
    button.style.top = `${y}px`;
}

function showConfetti() {
    const end = Date.now() + (15 * 1000);
    (function frame() {
        confetti({
            particleCount: 2,
            angle: 60,
            spread: 55,
            origin: { x: 0 },
        });
        confetti({
            particleCount: 2,
            angle: 120,
            spread: 55,
            origin: { x: 1 },
        });

        if (Date.now() < end) {
            requestAnimationFrame(frame);
        }
    }());
}
