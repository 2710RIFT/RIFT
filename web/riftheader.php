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

