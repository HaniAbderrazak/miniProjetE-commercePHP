 <html> 
 <head>
 	

 </head>
 <body>
 	<form method="post" action="">
 		<input type="submit" name="btn" value="true"/>

 	</form>
 </body>
 	<?php 
 	$i=false;
 	
 	  	
 	  		$i=true;
 	  		$c=mysqli_connect("127.0.0.1","root","","bbb");
 	  		$req="INSERT INTO button(id) values (id=false)";
 	  		$res=mysqli_query($c,$req);
 	  		$req="SELECT * FROM button ";
 	  		$res=mysqli_query($c,$req);
 	  		 while($tab =mysqli_fetch_array($res,MYSQLI_NUM)) {
              	echo "<br> ".$tab[0];
              }


		

 	?>