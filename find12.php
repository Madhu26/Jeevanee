
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
	 <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || BOLT Sports Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="style1.css" />
    <script src="js/vendor/modernizr.js"></script>
 <script>
function find(){
var string=document.getElementById("search").value;
		if ( string== null || string == "") {
        		alert("enter keywords");
				myForm2.search.focus();

        		return ;
   			}
			        	

			 var xhttp=null;
			 xhttp = new XMLHttpRequest();
			 if(xhttp){      

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("docs").innerHTML =this.responseText;
    }
  };
  xhttp.open("GET", "find.php?q="+string, true);
  xhttp.send();   

			 }else {
				 alert("error");
			 }
}
</script>


	</head>
<?php

$message="";
if(isset($_REQUEST['q']))
{
	$searchq=$_REQUEST['q'];
	
	//echo "R : $searchq";
	$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	$q="SELECT * FROM products WHERE product_name LIKE '%{$searchq}%' OR product_desc LIKE '%{$searchq}%'";
	
	include('config2.php');
	
$result=mysqli_query($con,$q) or die("Your query is not correct");


$count=mysqli_num_rows($result);
if($count == 0)
{
	$message="Sorry Not Found";
//echo "Here";
	
}




	
}


?>



   
    <div class="row" style="margin-top:10px;">
      <div class="small-12">      		


 <?php
      
        while($row=mysqli_fetch_array($result))
{
		

         

              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$row[2].'</h3></p>';
              echo '<img src="images/products/'.$row[4].'"/>';
              echo '<p><strong>Product Code</strong>: '.$row[1].'</p>';
              echo '<p><strong>Description</strong>: '.$row[3].'</p>';
              echo '<p><strong>Units Available</strong>: '.$row[5].'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$row[6].'</p>';



              if($row[5] > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$row[0].'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

             // $i++;
            }

		
          echo '</div>';
echo '</div>';

          ?>




  



     
	   