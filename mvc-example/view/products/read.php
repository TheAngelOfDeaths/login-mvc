<?php
require 'view/components/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="flex_left">
        <div class="btn">    
            <a  href='index.php?con=contacts&op=create'>Create</a>
        </div>
        <div class="btn">    
            <a href='..\mvc-example/index.php'>Back</a>
        </div>

        <div class="right">
            <form action="index.php?con=contacts&op=search" method="POST" class="flex">
                <input class="" type="text" placeholder="Search" name="search" aria-label="Search">
                <button class="btn" name="searchSubmit" type="submit">Search</button>
            </form>
        </div>

        <?php //echo $html2; ?>

    </div>

    <?php echo isset($msg) ? $msg : null; ?>

    <div class="flex">
        <?php echo $html; ?>
    </div>
    
</body>
</html>

<?php
require 'view/components/footer.php';
?>