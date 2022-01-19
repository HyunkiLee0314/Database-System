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
                    <h1>QnA List</h1>
                </div>
            </div>
			<div>
				<table>
					<thead>
						<tr>
							<th>QnA id</th>
							<th>Buyer id</th>
							<th>Title</th>
							<th>Date</th>
							<th>Context</th>
							<th>Product name</th>
						</tr>
					</thead>
					<tbody>
					<?php
    
					$product_check_query="select * from qna,buyer,orders,order_detail,product 
					where qna.buyer_id = buyer.buyer_id and buyer.buyer_id = orders.buyer_id and orders.order_id = order_detail.order_id and 
					order_detail.product_id = product.product_id order by qna.qna_date asc ";
					$product_result=mysqli_query($con,$product_check_query);
					while( $pd_row = mysqli_fetch_array( $product_result ) ) {
						echo '<tr><td>' . $pd_row[ 'qna_id' ] . '</td><td>' . $pd_row[ 'buyer_id' ] . '</td><td>' . $pd_row[ 'qna_title' ] .
							'</td><td>' . $pd_row[ 'qna_date' ] .
							'</td><td>' . $pd_row[ 'qna_context' ] . '</td><td>' . $pd_row[ 'product_name' ] .'</td></tr>';
						}
     
					?>
					</tbody>
				</table>
			</div>
			<br>
			<div>
						<?php
    
					$total_query="select product.product_name, SUM(product.product_name) from qna,buyer,orders,order_detail,product 
					where qna.buyer_id = buyer.buyer_id and buyer.buyer_id = orders.buyer_id and orders.order_id = order_detail.order_id 
					and order_detail.product_id = product.product_id group by product.product_name";
					$total_result=mysqli_query($con,$total_query);
					while ($total = mysqli_fetch_array( $total_result)){
						$total['SUM(product.product_name)'] = $total['SUM(product.product_name)']+1;
						echo "<h3>"."The number of Question for ".$total['product_name']," is ".$total['SUM(product.product_name)']."</h3>";
						echo"<br>";
					
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