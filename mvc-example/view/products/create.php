<?php
require 'view/components/header.php';
?>

<html>
<head>
    <title>producten</title>
    <link rel="stylesheet" type="text/css" href="view/assets/style.css">
</head>

<body>    
<div class="row"> 
      <h1> product toevoegen</h1>
      <form action="index.php?con=products&op=create" method="POST">
          <table>
              <tr>
                  <td>product_type_code:</td>
                  <td><input type="text" name="product_type_code"></td>
              </tr>
              <tr>
                  <td>supplier_id:</td>
                  <td><input type="text" name="supplier_id"></td>
              </tr>
              <tr>
                  <td>product_name:</td>
                  <td><input type="text" name="product_name"></td>
              </tr>
              <tr>
                  <td>product_price:</td>
                  <td><input type="text" name="product_price"></td>
              </tr>
              <tr>
                  <td>other_product_details:</td>
                  <td><input type="text" name="other_product_details"></td>
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