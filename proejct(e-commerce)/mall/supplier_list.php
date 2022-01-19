<?php
    session_start();
    require 'condb.php';
?>
<!DOCTYPE html>
<html>
    <head>

        <title>DB for Shopping mall</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1>Supplier List</h1>
                </div>
            </div>
			<div>
				<table>
					<thead>
						<tr>
							<th>Supplier id</th>
							<th>Company name</th>
							<th>Company manager</th>
							<th>Contect number</th>
							<th>Product name</th>
							<th>Product category</th>
						</tr>
					</thead>
					<tbody>
					<?php
    
					$product_check_query="select * from supplier,product where supplier.supplier_id = product.supplier_id order by product.product_category";
					$product_result=mysqli_query($con,$product_check_query);
					while( $pd_row = mysqli_fetch_array( $product_result ) ) {
						echo '<tr><td>' . $pd_row[ 'supplier_id' ] . '</td><td>' . $pd_row[ 'company' ] . '</td><td>' . $pd_row[ 'contact_manager' ] .
							'</td><td>' . $pd_row[ 'contact_number' ] .
							'</td><td>' . $pd_row[ 'product_name' ] . '</td><td>' . $pd_row[ 'product_category' ] .'</td></tr>';
						}
     
					?>
					</tbody>
				</table>
			</div>
			<br>
			<div>
						<?php
    
					$total_query="select * from supplier,product where supplier.supplier_id = product.supplier_id order by product.product_quantity asc limit 1";
					$total_result=mysqli_query($con,$total_query);
					while ($total = mysqli_fetch_array( $total_result)){
						echo "<h3>"."The lowest stock item is provided by  ".$total['supplier_id']."</h3>";
						echo"<br>";
						echo "<h3>"."The quantity is " . $total['product_quantity']."</h3>";
						echo"<br>";
						echo "<h3>"."Need to contact to ".$total['contact_manager']."</h3>";
					}
					
					?>
			</div>
            <br><br><br>
           <footer class="footer">
               <div class="container">
               </div>
           </footer>
        </div>
    </body>
</html>