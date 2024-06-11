<?php
include("config.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body> 
    <style>
        .rating {
            unicode-bidi: bidi-override;
            direction: rtl;
            text-align: center;
            position: relative;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 24px;
            padding: 5px;
            float: none;
            color: #aaa;
            cursor: pointer;
            margin-left: -10px; /* Nihuta tähed rohkem vasakule */
        }

        .rating label:before {
            content: '★';
        }

        .rating input:checked ~ label {
            color: #ffdd00;
        }
    </style>
<div class="container">
    
    <?php
    $paring = "SELECT * FROM koht WHERE id=".$_GET["id"]."";
    $vastus = mysqli_query($yhendus, $paring);
    $rida = mysqli_fetch_assoc($vastus);
    ?>
    
    <h1><?php echo $rida["kohvik"]; ?> Kohviku hindamine</h1>

    <form method="post">
    <div>
        <label for="name">Nimi:</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="comment">Kommentaar:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
    </div>
    <div class="rating">
        <input type="radio" id="star5" name="rating" value="5"><label for="star5"></label>
        <input type="radio" id="star4" name="rating" value="4"><label for="star4"></label>
        <input type="radio" id="star3" name="rating" value="3"><label for="star3"></label>
        <input type="radio" id="star2" name="rating" value="2"><label for="star2"></label>
        <input type="radio" id="star1" name="rating" value="1"><label for="star1"></label>
    </div>
    <button type="submit">Hinda</button>
    </form>
    </div>   
</body>
</html>
