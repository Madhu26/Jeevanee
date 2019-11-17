

<?php // Include confi.php
session_start();
include_once('config2.php');

 
if($_SERVER['REQUEST_METHOD'] == "GET"){
	$keyword=$_GET["q"];
//	echo "Key : $keyword";
	$search_exploded = explode ( " ", $keyword ); 
	$x = 0; foreach( $search_exploded as $search_each ) 
	{ $x++; $construct = "";
	if( $x == 1 ) $construct .="content LIKE '%$search_each%'"; 
	else $construct .="AND content LIKE '%$search_each%'"; } 
	$query = "SELECT * FROM products WHERE $construct "; 
	$num=1;
	 if($result = mysqli_query($con,$query))
	 {
		 $num= mysqli_num_rows($result);
	 }

   
	if($num==0){
	$output= "<p>Sorry, there are no matching result for <b> $keyword </b>. </br> </br> 1. Try more general words. for example: If you want to search 'how to create a website' then use general keyword like 'create' 'website' </br> 2. Try different words with similar meaning </br> 3. Please check your spelling</p>"; }
else { $output= "<p>$num results found !</p>"; 
while( $runrows = mysqli_fetch_assoc( $result ) ) { 
$title = $runrows ['product_code'];
 $desc = $runrows ['product_desc'];
 $url = $runrows ['product_img_name'];
$type= $runrows ['product_name'];
if($type!="image"){
$output.= "<p><a href='$url' download=".$title."> <b> save $title file </b> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='$url'> <b> open $title file </b> </a> <br> $desc  </p> "; 
}
else $output.= "<p><a href='$url' download=".$title."> <b> save $title file </b> </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='$url'> <b> open $title file </b> </a><br><img src='".$url."' style='max-height:250px; width:auto'/> <br> $desc  </p> "; 

}

}echo $output;

}
 mysqli_close($con);

 ?>