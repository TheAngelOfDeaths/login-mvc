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
	  <form action="index.php?con=products&op=update&id=<?= htmlentities($_REQUEST['id']); ?>" method="POST">
		  <table>
              <tr>
                  <td>product_type_code:</td>
                  <td><input type="text" name="product_type_code" value="<?= htmlentities($res[0]['product_type_code']);?>"></td>
              </tr>
              <tr>
                  <td>supplier_id:</td>
                  <td><input type="text" name="supplier_id" value="<?= htmlentities($res[0]['supplier_id']);?>"></td>
              </tr>
              <tr>
                  <td>product_name:</td>
                  <td><input type="text" name="product_name" value="<?= htmlentities($res[0]['product_name']);?>"></td>
              </tr>
              <tr>
                  <td>product_price:</td>
                  <td><input type="text" name="product_price" value="<?= htmlentities($res[0]['product_price']);?>"></td>
              </tr>
              <tr>
                  <td>other_product_details:</td>
                  <td><input type="text" name="other_product_details" value="<?= htmlentities($res[0]['other_product_details']);?>"></td>
              </tr>
		  </table>
		  <input type="submit" name="submit" value="updaten" onClick="header()" id="myBtn">
		</form> 
    
</body>
</html>

<?php
    require 'view/components/footer.php';
?>
