<?php
require 'components/header.php';
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
            <a  href='index.php?con=user&op=create'>Create</a>
        </div>
        <div class="btn">    
            <a href='..\mvc-example/index.php'>Back</a>
        </div>
    </div>

    <?= isset($msg) ? "<div  class='full-button'>" . $msg . "</div>" : null; ?>

    <div class="flex">
        <?php echo $html; ?>
    </div>

    <?php echo $html3; ?>

</body>
</html>

<?php
require 'components/footer.php';
?>