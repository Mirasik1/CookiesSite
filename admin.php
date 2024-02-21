<?php

$host = 'localhost';
$dbname = 'customers';
$user = 'root';
$password = '';


$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = $_GET['search'] ?? ''; 

if ($search) {
    $sql = "SELECT * FROM orders WHERE lastName LIKE ? OR firstName LIKE ? OR phone LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
} else {
    $sql = "SELECT * FROM orders";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Records</title>
    <link rel="stylesheet" href="style.css">
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
        <h2>Orders List</h2>
        
        
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
        
        
        <table>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Class</th>
                <th>Phone</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['lastName']) ?></td>
                <td><?= htmlspecialchars($row['firstName']) ?></td>
                <td><?= htmlspecialchars($row['classNumber']) ?><?= htmlspecialchars($row['classLetter']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <footer>
        <a href="https://t.me/Miras_cookie_bot" target="_blank"><i class="fab fa-telegram-plane"></i> Telegram</a>
        <a href="https://wa.me/87079955398" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        <a href="https://instagram.com/miras_1_3" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
    </footer>

</body>
</html>

<?php
$conn->close();
?>
