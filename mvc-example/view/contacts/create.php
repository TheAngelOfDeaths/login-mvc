<?php
require 'view/components/header.php';
?>

<html>
<head>
    <title>contacten</title>
    <link rel="stylesheet" type="text/css" href="view/assets/style.css">
</head>

<body>    
<div class="row"> 
    <h1> Contact toevoegen</h1>
        <form action="index.php?con=contacts&op=create" method="POST">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td><input type="text" name="address"></td>
                </tr>
            </table>
          <input type="submit" name="create" value="Toevoegen">
        </form> 

        <div>
            <a href='..\mvc-example/index.php'>Back</a>
        </div>
    </div>
</div>
</body>
</html>

<?php
require 'view/components/footer.php';

?>