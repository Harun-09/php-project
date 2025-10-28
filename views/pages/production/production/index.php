<?php


$page = $_GET['page'] ?? 1;
$perpage = 10;
$criteria = ""; // optional filter

?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production List</title>
    <link rel="stylesheet" href="<?= $base_url ?>/css/bootstrap.min.css">
  
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-3">Production List</h2>

    <?php
    // Show table
    echo Production::html_table($page, $perpage, $criteria, true);
    ?>

</div>

</body>
</html>
