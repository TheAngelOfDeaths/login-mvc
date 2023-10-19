<?php require 'view/components/header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="flex_left">
        <div class="btn">    
            <a  href='index.php?op=create'>Create</a>
        </div>
        <div class="btn">    
            <a href='..\mvc-example/index.php'>Back</a>
        </div>

        <form action="index.php?con=products&op=search" method="POST" class="flex">
            <input class="" type="text" placeholder="Search" name="search" aria-label="Search">
            <button class="btn" name="searchSubmit" type="submit">Search</button>
        </form>
    </div>

    <div class="flex">
        <h1> Zoek resultaat:</h1>
    </div>

    <div class="flex">
        <?= $html ?>
    </div>
    
</body>
</html>

<?php require 'view/components/footer.php';?>