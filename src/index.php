<?php
require_once "config.php";

/* =======================
   XỬ LÝ THÊM GHI CHÚ
======================= */
if (isset($_POST['add_note'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO notes (title, content) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $content]);
}

/* =======================
   XỬ LÝ XÓA GHI CHÚ
======================= */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM notes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
}

/* =======================
   LẤY DANH SÁCH GHI CHÚ
======================= */
$stmt = $conn->query("SELECT * FROM notes ORDER BY created_at DESC");
$notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Ghi chú cá nhân</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Ghi chú cá nhân</h1>

<form method="POST">
    <input type="text" name="title" placeholder="Tiêu đề" required>
    <textarea name="content" placeholder="Nội dung ghi chú" required></textarea>
    <button type="submit" name="add_note">Thêm ghi chú</button>
</form>

<hr>

<?php foreach ($notes as $note): ?>
    <div class="note">
        <h3><?= htmlspecialchars($note['title']) ?></h3>
        <p><?= nl2br(htmlspecialchars($note['content'])) ?></p>
        <small><?= $note['created_at'] ?></small><br>
        <a href="?delete=<?= $note['id'] ?>" onclick="return confirm('Muốn xóa ghi chú này?')">
            Xóa
        </a>
    </div>
<?php endforeach; ?>

</body>
</html>