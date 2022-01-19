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
                    <h1>Buyer List</h1>
                </div>
            </div>
			<div>
				<table>
					<thead>
						<tr>
							<th>Buyer id</th>
							<th>Name</th>
							<th>Phone#</th>
							<th>Email</th>
							<th>Street</th>
							<th>City</th>
							<th>State</th>
							<th>Country</th>
							<th>Zip</th>
						</tr>
					</thead>
					<tbody>
					<?php
    
					$product_check_query="select * from buyer";
					$product_result=mysqli_query($con,$product_check_query);
					while( $pd_row = mysqli_fetch_array( $product_result ) ) {
						echo '<tr><td>' . $pd_row[ 'buyer_id' ] . '</td><td>' . $pd_row[ 'buyer_name' ] . '</td><td>' . $pd_row[ 'buyer_phone' ] .
							'</td><td>' . $pd_row[ 'email' ] .
							'</td><td>' . $pd_row[ 'buyer_address' ] . '</td><td>' . $pd_row[ 'buyer_city' ] 
							. '</td><td>' . $pd_row[ 'buyer_state' ]. '</td><td>' . $pd_row[ 'buyer_country' ]. '</td><td>' . $pd_row[ 'buyer_zip' ]
							.'</td></tr>';
						}
     
					?>
					</tbody>
				</table>
			</div>
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               </div>
           </footer>
        </div>
    </body>
</html>