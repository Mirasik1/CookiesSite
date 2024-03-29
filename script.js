let count = 0;

document.addEventListener('DOMContentLoaded', () => {
    const cookieButton = document.getElementById('cookieButton');
    const clickCountDisplay = document.getElementById('clickCount');

    cookieButton.addEventListener('click', () => {
        count++;
        clickCountDisplay.textContent = `Нажатий: ${count}`;

        shakeButton(cookieButton);

        if (count >= 90 && count < 100) {
            
            randomPosition(cookieButton);
        }

        if (count >= 100) {
           
            showConfetti();
            setTimeout(() => {
                alert('Поздравляем! 100 и более нажатий!');
                window.location.href = 'buy.php';
            }, 3000); 
        }
    });
});

function shakeButton(button) {
    button.classList.add('shake');
    setTimeout(() => {
        button.classList.remove('shake');
    }, 500); 
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
document.addEventListener('DOMContentLoaded', function () {
    const resetFormButton = document.getElementById('resetFormButton');
    const form = document.querySelector('.order-form');

    resetFormButton.addEventListener('click', function () {
        form.reset(); 
    });
});