<?php 


//database
include("db.php");

 if(isset($_COOKIE['ID_my_site'])) { 

        $username = $_COOKIE['ID_my_site'];  
        $pass = $_COOKIE['Key_my_site']; 
        $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
        $email = mysql_real_escape_string($_POST['email']);
        $res=mysql_query("SELECT * FROM users WHERE email='$email'");

 	while($info = mysql_fetch_array( $check )) 	 { 

 		if ($pass != $info['password']) { 			
 			header("Location: login.php"); 
 		} else { 

 	// 1 = admin, 2 = moderator, 3 = regular user
 		$userdata = mysql_query("SELECT * FROM users WHERE username = '$username'");
 		$_SESSION = mysql_fetch_assoc($userdata);

 		if ($_SESSION['privileges'] == 1) {
 
        	} elseif ($_SESSION['privileges'] == 2) {
			
 			    header("Location: members.php");
			
 			} elseif ($_SESSION['privileges'] == 3) {
 				
 					header("Location: user.php");
			
 				}


?>
<!--DOCTYPE html -->
<html><head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="css/flat-ui.css" rel="stylesheet">
    <title>Tili - Ylläpitäjä</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-contact.css" rel="stylesheet">
    <link href="css/style-content.css" rel="stylesheet">
    <link href="css/style-footers.css" rel="stylesheet">
    <link href="css/style-headers.css" rel="stylesheet">
    <link href="css/style-portfolios.css" rel="stylesheet">
    <link href="css/style-pricing.css" rel="stylesheet">
    <link href="css/style-team.css" rel="stylesheet">
    <link href="css/style-dividers.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">


</head>
<body>
    
    <div id="page" class="page">
        
    <header class="item header margin-top-0 padding-bottom-0">
    
    		<div class="wrapper">   	
    			<div class="container">   		
    				<nav role="navigation" class="navbar navbar-inverse navbar-embossed navbar-lg navbar-fixed-top">
    					<div class="container">
    				
    						<div class="navbar-header">
    							<button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
    								<span class="sr-only">Toggle navigation</span>
    							</button>
    							<a href="#" class="navbar-brand brand" data-selector="nav a, a.edit" style="outline: none; cursor: default;"> KUVATON</a>
   							</div>
    								
    						<div id="navbar-collapse-02" class="collapse navbar-collapse">
    							<ul class="nav navbar-nav">			      
    								<li class="propClone"><a href="etusivu" data-selector="nav a, a.edit" src="images/uploads/sharing.economy image.jpg" style="outline: none; color: rgb(253, 253, 253); font-weight: bold; text-transform: none;">ETUSIVU</a></li>
    								<li class="propClone"><a href="kuvat" data-selector="nav a, a.edit" style="outline: none;">KUVIA</a></li>
    								<li class="propClone"><a href="tietoa" data-selector="nav a, a.edit" src="images/image1.png" style="outline: none; color: rgb(255, 255, 255); font-weight: bold; text-transform: none;">YHTEYSTIEDOT</a></li>
    								<br>
    							</ul> 		      
    							<ul class="nav navbar-nav navbar-right">
    								<?php 
                                    if ($_COOKIE[ID_my_site] == '') {
                                        //jos käyttäjä ei ole kirjautunut sisään!
                                        ?> 
                                            <li class="propClone">
                                            <a href="auth" data-selector="nav a, a.edit" src="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat-one-color/72/profle-icon.png" style="outline: none; color: rgb(255, 255, 255); font-weight: bold; text-transform: none;">KIRJAUDU SISÄÄN&nbsp;<span class="fa fa-lock" data-selector="span.fa" style="outline: none;"></span></a>
                                            </li>
                                        <?php
                                    } else {
                                    ?>
                                    <li class="propClone active">
                                        <a href="auth" data-selector="nav a, a.edit" src="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat-one-color/72/profle-icon.png" style="outline: none; color: rgb(255, 255, 255); font-weight: bold; text-transform: none;"><?php echo $_SESSION["email"]; ?>&nbsp;</a>
                                    </li>
                                    <?php 
                                    }
                                    ?>
    							</ul>
    						</div>    					
    					</div>    					
    				</nav>
    			
    				<div class="row banner">
    					<div class="col-md-12">    				    						
    						<div class="text-center">
    							
    						</div>    				
    					</div>    			
    				</div>    		
    			</div>    	
    		</div>
    	
    	</header>


<div class="container">
  <div class="item portfolio">
    		
    		<div class="container">
    		
    			<div class="row margin-bottom-40">
    			
    				<div class="col-md-12">
<br><br>


<div class="col-md-12 text-center">

<div class="btn-group">
      <a class="btn btn-primary active" href="#">Kuvat <span class="fui-photo"></span></a>
      <a class="btn btn-primary" href="messages.php">Viestit <span class="fui-chat"></span></a>
      <a class="btn btn-primary" href="profile.php">Profiili <span class="fui-home"></span></a>
      <a class="btn btn-primary" href="liked.php">Tykätyt Kuvat <span class="fui-heart"></span></a>
      <a class="btn btn-primary" href="commented.php">Kommentit <span class="fui-chat"></span></a>
      <a class="btn btn-primary" href="users.php">Käyttäjät <span class="fui-user"></span></a>
      <a class="btn btn-primary" href="logout.php">Kirjaudu Ulos <span class="fui-cross"></span></a>
</div>

</div>
<br>
<br>

	</p>
		

        Tällä sivulla voit lataa kuvia KUVATON Galleriaan.<br>
		<br>
				<?php
                        if( !isset( $_POST['p'] ) ){ $_POST['p']=0; }
                        if( $_POST['p'] == 1 ){
                                include( 'dropbox/upload_file.php' );
                        }else{
                                include( 'dropbox/uploadimage.php' );
                        }

                ?>
<br><br>
				<p>NYKYISET KUVAT:</p>
         
				<?php


						$dir='uploads/'; 

						$ar=scandir($dir);

						$box=$_POST['box'];

					

						while (list ($key,$val) = @each ($box)) {

						$path=$dir	."/".$val;

						if(unlink($path)) echo "Poistettiin kuva ";


						//Tässä ilmoitetaan haetaan kuvan linkki tietokantaa varten.
						$sqllink = 'http://marcosraudkett.com/projektityo/uploads/' . $val;
						
						//Haetaan tarvittavat tiedot kuvasta
						$select_pic = mysql_query("SELECT * FROM kuvat WHERE kuvan_linkki = '$sqllink'");
						 while ($row_getpic = mysql_fetch_array($select_pic)) {
						 	//haetaan kuvan id
						 	$receive_pic_id = $row_getpic["kuva_id"];
						 }

						//Tässä vaiheessa poistetaan kaikki kommentit kuvaan!
						mysql_query("DELETE FROM kommentit WHERE kommentti_kuvan_id = '$receive_pic_id'");

						//Tässä poistetaan myös kuva tietokannasta!
						mysql_query("DELETE FROM kuvat WHERE kuva_id = '$receive_pic_id'");

						echo "$val,";

				}

						echo "<form method=post name='f1' action=''>";

						while (list ($key, $val) = each ($ar)) {

						if(strlen($val)>3){

						echo " <input type=checkbox  name=box[] value='$val'><img width='64' height='64' src='http://marcosraudkett.com/projektityo/uploads/".$val."'> $val <br>";
				}
				}
						echo "<br><input class='btn btn-primary btn-embossed btn-lg btn-wide' type=submit class='mrlogin' value='Poista valitut kuvat'></form>";

	?>

	
		<br><br><br>

	</p>

</div>
</div>
</div>
</div>
</div>


</center>

    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/application.js"></script>
    <!-- lightbox lisäosa (jotta voisi avata kuvia isompana) -->
    <script src="lightbox/dist/js/lightbox-plus-jquery.min.js"></script>

</body>
</html>

<?php

} 
 	} 

 		} else 
 //if the cookie does not exist, they are taken to the login screen 
 {			 

 header("Location: login.php"); 

 } 


 ?> 
