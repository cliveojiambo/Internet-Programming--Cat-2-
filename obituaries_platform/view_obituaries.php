<?php
$mysqli = new mysqli("localhost", "root", "", "obituaries_platform");
$result = $mysqli->query("SELECT * FROM obituaries ORDER BY submission_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
<meta name="description" content="View heartfelt obituaries from our community.">
<meta name="keywords" content="Obituaries, Memorial, Tribute">
<meta property="og:title" content="Obituary Platform">
<meta property="og:description" content="Read and share memories of loved ones.">
<meta property="og:type" content="website">
<meta property="og:url" content="http://localhost/obituaries_platform/view_obituaries.php">

    <title>Obituaries</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Obituaries</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="obituary">
            <h2><?php echo htmlspecialchars($row['name']); ?></h2>
            <p><strong>Born:</strong> <?php echo $row['date_of_birth']; ?></p>
            <p><strong>Died:</strong> <?php echo $row['date_of_death']; ?></p>
            <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
            <p><em>Submitted by: <?php echo htmlspecialchars($row['author']); ?></em></p>
        </div>
        <hr>
    <?php endwhile; ?>
</body>
</html>
