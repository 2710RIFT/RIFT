<?php
require_once 'logindb.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
  If(!db_server) die ("Unable to connect to MySQL: " . mysql_error());
  mysql_select_db($db_database, $db_server) or die("Unable to select database: " . mysql_error());
?>
<?php
//This section grabs all the products from the database
$product_list = "";
$sql = mysql_query("SELECT * FROM Product ORDER BY gender, type");
$productCount = mysql_num_rows($sql); //count the output
if($productCount > 0){
 while($row=mysql_fetch_array($sql)){
 	$id = $row["pid"];
 	$name = $row["name"];
 	$gender = $row["gender"];
 	$price = $row["price"];
 	$type = $row["type"];

 	$product_list .="<tr><td>$id</td><td> &nbsp; $name</td><td>&nbsp;&nbsp;&nbsp;$gender</td><td>$price</td><td>&nbsp;&nbsp;$type</td></tr>";
 }
}
else{
	$product_list = "You have no products in the store";
}
?>

<?php

if (isset($_POST['name'])) {
	
	$pid = mysql_real_escape_string($_POST['pid']);
	$name = mysql_real_escape_string($_POST['name']);
	$price = mysql_real_escape_string($_POST['price']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$type = mysql_real_escape_string($_POST['type']);
	$inventory_amount = mysql_real_escape_string($_POST['inventory_amount']);
	
	//Check for a product that is identical
	$sql = mysql_query("SELECT pid FROM Product WHERE name='$name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); //count output
	if($productMatch > 0){
		echo 'Sorry, you tried to place a duplicate "Name" into the system, <a href="manageinventory.php">click here</a>';
		exit();
	}
		//Check for a duplicate product ID
	$sql = mysql_query("SELECT pid FROM Product WHERE pid='$pid' LIMIT 1");
	$productMatch = mysql_num_rows($sql); //count output
	if($productMatch > 0){
		echo 'Sorry, you tried to place a duplicate product ID into the system, <a href="manageinventory.php">click here</a>';
		exit();
	}	

	
	//add product into the database
	$sql = mysql_query("INSERT INTO Product (pid, name, price, gender, type, inventory_amount)
	VALUES('$pid','$name','$price','$gender','$type','$inventory_amount')") or die(mysql_error());
	$fid = mysql_real_escape_string($_POST['pid']);
	//place image in the folder
	$newname = "$fid.jpg";
	move_uploaded_file($_FILES['fileField']['tmp_name'],"images/$newname");
	
}
	
?>

<!DOCTYPE HTML>
<html>
<head>
<title>RIFT SHOP LOG IN</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
<!-- start menu -->     
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<!-- top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>
<body>
   <div class="header-top">
	 <div class="wrap"> 
		<div class="logo">
			<a href="index.html"><img src="images/logo.png" alt=""/></a>
	    </div>
	    <div class="cssmenu">
		   <ul>
			 <li class="active"><a href="register.html">Sign up & Save</a></li> 
			 <li><a href="shop.html">Online Store</a></li> 
			 <li><a href="login.html">My Account</a></li> 
			 <li><a href="checkout.html">CheckOut</a></li> 
		   </ul>
		</div>

		<div class="clear"></div>
 	</div>
   </div>
   <div class="header-bottom">
   		<div class="wrap">
   		<!-- start header menu -->
					<!--<div class="col_1_of_middle span_1_of_middle">-->
						
						<ul class="megamenu skyblue">
						    <li><a class="color1" href="HCI.html">Home Customer Information</a></li>
							<li class="grid"><a class="color2" href="BCI.html">Business Customer Information</a></li>
				  			<li class="active grid"><a class="color3" href="salesman.html">Top Product</a></li>
				  			<li><a class="color4" href="THC.html">Top Home Customer</a></li>
				  			<li><a class="color5" href="TBC.html">Top Business Customer</a></li>				
						</ul>

	   				<!--</div>
	   				<div class="col_1_of_middle span_1_of_middle">
						<ul class="f_list1">
							<li>
								
								<div class="search">	  
								<input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
								<input type="submit" value="Subscribe" id="submit" name="submit">
								<div id="response"> </div>
				 			</div><div class="clear"></div>
				 		    </li>
						</ul>
					</div>-->



		   <div class="clear"></div>
     	</div>
       </div>
				<div align="left" style="margin-left:50px"><a href="manageinventory.php#inventoryForm"><br/>+ Add New Inventory</a></div>
				<br/>
				<h3>Inventory List</h3>
				<table>
				<?php echo $product_list; ?>
          <div class="wrap">
        </table>
        <br/>
        <br/>
        <a name = "inventoryForm" id="inventoryForm"></a>
        <h2>Add Inventory</h2>
        <br/>
        <form action="manageinventory.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">
        <table width="90%" border="0" cellspacing="0" cellpadding="6">
        	<tr>
        		<td width="10%">Product Name</td>
        		<td width="60%"><label>
        		<input name="name" type="text" id="name" size="50"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Product ID</td>
        		<td><label>
        		<input name="pid" type="text" id="pid" size="10"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Product Price</td>
        		<td><label>
        		$
        		<input name="price"type="text"id="price"size="12"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Gender</td>
        		<td><label>
        		<select name="gender" id="gender">
        		<option value=""></option>
        		<option value="m">Male</option>
        		<option value="f">Female</option>
        		</select>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Type</td>
        		<td><label>
        		<select name="type" id="type">
        		<option value=""></option>
						 <option value="belt">Belt</option>
        		<option value="blazer">Blazer</option>
        		<option value="camisole">Camisole</option>
        		<option value="casual shirt">Casual Shirt</option>
        		<option value="cotton coat">Cotton Coat</option>
        		<option value="denim coat">Denim Coat</option>
        		<option value="dress">Dress</option>
        		<option value="dress pants">Dress pants</option>
        		<option value="dress shirt">Dress Shirt</option>
        		<option value="jeans">Jeans</option>
        		<option value="leggings">Leggings</option>
        		<option value="long sleeve tee">Long Sleeve Tee</option>
        		<option value="scarf">Scarf</option>
        		<option value="short sleeve tee">Short Sleeve Tee</option>
        		<option value="skirt">Skirt</option>
        		<option value="socks">Socks</option>
        		<option value="sweater">Sweater</option>
        		<option value="tank top">Tank Top</option>
        		<option value="wool coat">Wool Coat</option>
        		</select>
        		</label
        	</tr>
        	<tr>
        		<td>Inventory Amount</td>
        		<td><label>
        		<input name="inventory_amount"type="text"id="inventory_amount"size="5"/>
        		</label></td>
        	</tr>
        	<tr>
        		<td>Product Image</td>
        		<td><label>
        		<input type="file" name="fileField"id="fileField"/>
						 </label></td>
        	</tr>
        	<tr>
        		<td></td>
        		<td><label>
        		<input type="submit" name="button"id="button"value="Add This Item Now"/>
        		</label></td>
        	</tr>
        </table>
        </form>
				<p><br></p>

				<div class="clear"></div>

			</div>


        <div class="footer">
	       	 <div class="footer-top">
	       	 	<div class="copy">
	       	  		 <div class="wrap">
	       	   			  <p>© All rights reserved | RIFT </p>
	     		  	 </div>
	      	 	</div>
	    	 </div>
   		</div>

       <script type="text/javascript">
			$(document).ready(function() {
			
				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
		 		};
				
				
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>