<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
body{
	overflow-x:hidden;
	background:palegreen;
}
*{
	margin:0;
}
#adspace{
	color:black;
	box-sizing:border-box;
	font-size:13px;
}
marquee{
	position:absolute;
	display:block;
	width:100%;
	z-index:3;
}
.popup{
	background:black;
	z-index:10;
	position:fixed;
	bottom:0;
	margin:0 20px;
}
.popup img{
	width:80%;
	height:80%;
	display:block;
	margin-left:10%;
	float:left;
	animation: blink 1s step-start infinite;
	border: solid 2px red;
	box-sizing:border-box;
}
.popup p{
	color:white;
	text-align:center;
	width:100%;
	float:left;
}
.popup .close{
	float:left;
	width:10%;
	margin-bottom:52%;
}
@keyframes blink{
	50%{
		opacity:0;
	}
}
a{
	z-index:5;
}
h1, h3{
	text-align:center;
}
</style>
</head>
<?php
$readtag = file_get_contents('taglines.txt'); 			//Load taglines
$taglines = explode(",", $readtag);						//Split taglines into array

$readprod = file_get_contents('products.txt');			//Load products
$products = explode(",", $readprod);					//Split products into array

$colours = ['palegreen', 'lightcyan', 'beige'];			//Colours for ad background

$borders = ['dotted', 'dashed', 'solid', 'double'];		//Styles for ad border

$fontstyle = ['normal', 'italic'];						//Styles for ad fontstyle

$fontweight = ['normal', 'bold'];						//Styles for ad fontweight
?>

<body>
<h1>Joe Sales' Rapid Deals Online Sales Web Board</h1>
<h3>Best deals on the web net</h3>
<?php
for($i=0;$i<510;$i++){
	$product = $products[rand(0,count($products)-1)]; //Select a product
	$adtext = str_replace('product', $product, $taglines[rand(0,count($taglines)-1)]); //Select an ad template
	$bgcol = $colours[rand(0,count($colours)-1)]; //Select a background colour 
	$border = $borders[rand(0,count($borders)-1)]; //Select a border style 
	$fstyle = $fontstyle[rand(0,count($fontstyle)-1)]; //select font style 
	$fweight = $fontweight[rand(0,count($fontweight)-1)]; //select font weight
	$price = rand(10,1000);
	echo "<div id='adspace' 					
			style='								
				width:316.6px; 					
				background:".$bgcol."; 			
				overflow:hidden; 				
				float:left; 					
				border:".$border." black 2px; 	
				font-style:".$fstyle."; 		
				font-weight:".$fweight."; 		
				white-space:nowrap;'>			
			<img 								
				src='img/".$product.".jpg' 			
				style='							
				width:50px;						
				float:left'>					
			<a href='product.php?p=".$product."&t=".$adtext."&pr=".$price."&bg=".$bgcol."'>".$adtext."</a>
			<p class='price'>$".$price."
		</div>									
		<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->\n"
	;
}

for($i=0;$i<2;$i++){
	$height = rand(200,300);
	$width = $height + rand(50,150);
	$left = rand(0,1550);
	$product = $products[rand(0,count($products)-1)]; //Select a product
	$adtext = str_replace('product', $product, $taglines[rand(0,count($taglines)-1)]); //Select an ad template

	echo "
	<div class='popup' 
		style='
			width:".$width."px; 
			height:".$height."px;
			left:".$left."px'>
		<img src='img/".$product.".jpg'>
		<p class='close' onclick='$(this).parent().remove()'>X</p>
		<p>".$adtext."</p>
	</div>";
}

for($i=0;$i<50;$i++){
	echo "\n".'<marquee style="top:'.rand(0,4500).'px;'. //Calculate how far the marquee should be from the top of the page
	'	width:'.rand(1920,2500).'px;'.					//Calculate how wide the marquee should be. This affects how long before it shows on screen.
	'	color:#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT).';">'. //Calculate a text colour for the marquee
	'<b>'.str_replace('product', $products[rand(0,count($products)-1)], $taglines[rand(0,count($taglines)-1)]).'</b></marquee>'; //Set the line and product for the marquee
}
?>
</body>
</html>