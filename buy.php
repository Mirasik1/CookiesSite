<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Buy</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.html">Home</a>
            <a href="contact.html">Contact</a>
            <a href="receipt.html">Receipt</a>
        </nav>
    </header>

    <div class="main-content">
        <form action="db.php" method="post" class="order-form">
            <h2>Форма заказа</h2>
            <div class="form-group">
                <label for="lastName">Фамилия:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="firstName">Имя:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="classNumber">Класс:</label>
                <select id="classNumber" name="classNumber" required>
                    <option value="">Выберите класс</option>
                    <?php for ($i = 7; $i <= 12; $i++): ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="classLetter">Буква:</label>
                <select id="classLetter" name="classLetter" required>
                    <option value="">Выберите букву</option>
                    <?php foreach (['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'K'] as $letter): ?>
                        <option value="<?= $letter ?>"><?= $letter ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона:</label>
                <input type="tel" id="phone" name="phone" placeholder="+7" pattern="\+7[0-9]{10}" required>
            </div>
            <button type="submit">Отправить заказ</button>
                <button type="button" id="resetFormButton">Очистить</button>
        </form>
    </div>
    
    <footer>
        <a href="https://t.me/Miras_cookie_bot" target="_blank"><i class="fab fa-telegram-plane"></i> Telegram</a>
        <a href="https://wa.me/87079955398" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        <a href="https://instagram.com/miras_1_3" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
    </footer>
    <script src="script.js"></script>
</body>
</html>
