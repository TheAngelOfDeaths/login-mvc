<?php
require 'view/components/header.php';
?>

<html>
<head>
    <title>User</title>
    <link rel="stylesheet" type="text/css" href="view/assets/style.css">
</head>

<body>    
<div class="row"> 
      <h1> user toevoegen</h1>
      <form action="index.php?con=users&op=create" method="POST">
          <table>
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>
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