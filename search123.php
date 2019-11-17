<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
//$_SESSION['flag']=0;
//$flag=0;
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
	 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || Jeevanee Book Store</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="style1.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <script>
function find(){
	
var string=document.getElementById("search").value;
		if ( string== null || string == "") {
        		alert("enter keywords");
				myForm2.search.focus();

        		return ;
   			}
			        	//$flag=1;
//$_SESSION['flag']=1;
			 var xhttp=null;
			 xhttp = new XMLHttpRequest();
			 if(xhttp){      

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("docs").innerHTML =this.responseText;
		$flag=1;
		
    }
  };
  xhttp.open("GET", "find12.php?q="+string, true);
  xhttp.send();   

			 }else {
				 alert("error");
			 }
}
</script>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Jeevanee Book Store</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
		    <li class='active'><a href="search123.php">Search</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>
	<form  class="frm"  >
                          
                           <input type = 'text' maxlength='90' style="margin-left:200pxmargin-top:50px" name = 'search' placeholder="SEARCH HERE" id='search'/ >
							<button type = 'button'  style="align:center;margin-left:500px" name = 'submit' onclick="find()" >Search</button>
    </form >
						 <div id = "docs" align="left"></div>			








    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
