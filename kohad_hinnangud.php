<?php
include ("config.php");
session_start();

// Andmete säilitamine sessioonis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    // Kontrolli, kas kõik väljad on täidetud
    if (empty($_POST["name"])) {
        $errors[] = "Nimi on kohustuslik";
    }
    if (empty($_POST["comment"])) {
        $errors[] = "Kommentaar on kohustuslik";
    }
    if (empty($_POST["rating"])) {
        $errors[] = "Hinnang on kohustuslik";
    }

    // Kui vigu pole, salvesta andmed sessiooni
    if (empty($errors)) {
        if (!isset($_SESSION['reviews'])) {
            $_SESSION['reviews'] = array();
        }
        $review = array(
            'name' => $_POST['name'],
            'comment' => $_POST['comment'],
            'rating' => $_POST['rating']
        );
        array_push($_SESSION['reviews'], $review);
        $_SESSION['success_message'] = "Hinnang edukalt lisatud!";
        header("Location: kohad_hinnangud.php");
        exit;
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: kohad_hinnangud.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa uus hinnang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Avaleht</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="KT.php">Kasutajate haldus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/login.php">Admini sisselogimine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/lisamine.php">Lisamine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kohad_hinnangud.php">Kohad hinnangud</a>
                    </li>
                    <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']): ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Lisa uus hinnang</h1>
        <hr>  
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nimi</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Kommentaar</label>
                <textarea class="form-control" id="comment" name="comment"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Hinnang (1-10)</label>
                <select class="form-select" name="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Saada</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
