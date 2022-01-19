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
                    <h1>Stock List</h1>
                </div>
            </div>
			<div>
				<table>
					<thead>
						<tr>
							<th>Product id</th>
							<th>Product name</th>
							<th>Product category</th>
							<th>Product price</th>
							<th>Product quantity</th>
							<th>Supplier id</th>
						</tr>
					</thead>
					<tbody>
					<?php
    
					$product_check_query="select * from product order by product_name";
					$product_result=mysqli_query($con,$product_check_query);
					while( $pd_row = mysqli_fetch_array( $product_result ) ) {
						echo '<tr><td>' . $pd_row[ 'product_id' ] . '</td><td>' . $pd_row[ 'product_name' ] . '</td><td>' . $pd_row[ 'product_category' ] .
							'</td><td>' . $pd_row[ 'product_price' ] .
							'</td><td>' . $pd_row[ 'product_quantity' ] . '</td><td>' . $pd_row[ 'supplier_id' ] .'</td></tr>';
						}
     
					?>
					</tbody>
				</table>
			</div>
			<br>
			<div>
			<?php
    
					$total_query="select product_category, SUM(product_quantity) from product group by product_category";
					$total_result=mysqli_query($con,$total_query);
					while ($total = mysqli_fetch_array( $total_result)){
						echo "<h3>"."Total ".$total['product_category']." = " . $total['SUM(product_quantity)']."</h3>";
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
