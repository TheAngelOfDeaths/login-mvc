<?php
    require 'view/components/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

	<div class="btn">    
        <a href='..\mvc-example/index.php'>Back</a>
    </div>

    <h1> Product aanpassen</h1>
	  <form action="index.php?op=update&id=<?= htmlentities($_REQUEST['id']); ?>" method="POST">
		  <table>
			  <tr>
				  <td>Name:</td>
				  <td><input type="text" name="name" value="<?= htmlentities($res[0]['name']); ?>"> </td>
			  </tr>
			  <tr>
				  <td>Phone:</td>
				  <td><input type="text" name="phone" value="<?= htmlentities($res[0]['phone']); ?>"></td>
			  </tr>
			  <tr>
				  <td>Email:</td>
				  <td><input type="text" name="email" value="<?= htmlentities($res[0]['email']); ?>"></td>
			  </tr>
			  <tr>
				  <td>Location:</td>
				  <td><input type="text" name="address" value="<?= htmlentities($res[0]['address']); ?>"></td>
			  </tr>
		  </table>
		  <input type="submit" name="submit" value="updaten" onClick="header()" id="myBtn">
		</form> 
    
</body>
</html>

<?php
    require 'view/components/footer.php';
?>
