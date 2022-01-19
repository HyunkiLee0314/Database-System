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
                    <h1>Order List</h1>
                </div>
            </div>
			<div>
				<table>
					<thead>
						<tr>
							<th>Order id</th>
							<th>Buyer id</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Order date</th>
							<th>Paid</th>
							<th>Fulfill</th>
							<th>Shipping date</th>
							
						</tr>
					</thead>
					<tbody>
					<?php
    
					$order_check_query="select * from orders order by order_date ASC";
					$order_result=mysqli_query($con,$order_check_query);
					while( $order_row = mysqli_fetch_array( $order_result) ) {
						echo '<tr><td>' . $order_row[ 'order_id' ] . '</td><td>' . $order_row[ 'buyer_id' ] . '</td><td>' . $order_row[ 'total_price' ] .
							'</td><td>' . $order_row[ 'total_quantity' ] .
							'</td><td>' . $order_row[ 'order_date' ] . '</td><td>' . $order_row[ 'paid' ] .'</td><td>' . $order_row[ 'fulfill' ] .
							'</td><td>' . $order_row[ 'ship_date' ] .
							'</td></tr>';
						}
					?>
					</tbody>
				</table>
			</div>
			<br>
			<div>
			<?php
    
					$total_query="select SUM(total_price) from orders";
					$total_result=mysqli_query($con,$total_query);
					while ($total = mysqli_fetch_array( $total_result)){
						echo "<h3>"."Total price : " . $total['SUM(total_price)']."</h3>";
					}
					
					?>
			</div>
			<br>
			<div>
			<?php
    
					$total_query="select SUM(total_quantity) from orders";
					$total_result=mysqli_query($con,$total_query);
					while ($total = mysqli_fetch_array( $total_result)){
						echo "<h3>"."Total Quantity(Sales) : " . $total['SUM(total_quantity)']."</h3>";
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