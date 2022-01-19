<nav class="navbar navbar-inverse navabar-fixed-top">
               <div class="container">
                   <div class="navbar-header">
                       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                       </button>
                       <a href="index.php" class="navbar-brand">Home</a>
                   </div>
                   <div class="collapse navbar-collapse" id="myNavbar">
                       <ul class="nav navbar-nav navbar-right">
                           <?php
                           if(isset($_SESSION['email'])){
                           ?>
						   <li><a href="products.php"> Product List</a></li>
                           <li><a href="order_list.php"> Order List</a></li>
                           <li><a href="buyer_list.php">Buyer List</a></li>
						   <li><a href="supplier_list.php">Supplier List</a></li>
						   <li><a href="qna.php">QnA List</a></li>
                           <li><a href="logout.php">Logout</a></li>
                           <?php
                           }else{
                            ?>
                           <li><a href="login.php">Login</a></li>
                           <?php
                           }
                           ?>
                       </ul>
                   </div>
               </div>
</nav>