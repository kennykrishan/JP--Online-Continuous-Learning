<?php
include "../lookbox/connect.php";
session_start();
if(!isset($_SESSION['id']))
{
	header('Location: ../demoPage.php');
}
$id= $_SESSION['id'];
$query1="SELECT * from wallet where email='$id';";
$result1=mysqli_query($con,$query1);
$query2="SELECT * from user where email='$id';";
$result2=mysqli_query($con,$query2);
$r1=mysqli_fetch_assoc($result2);
$r2=mysqli_fetch_assoc($result1);

?>

<!doctype html>
<html lang="en-US">
<head>
  
  <title>Wallet</title>
  <link rel="stylesheet" type="text/css" media="all" href="styles.css">
  <style>
        @import url(http://fonts.googleapis.com/css?family=Raleway);
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a {
  margin-top: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu:after,
#cssmenu > ul:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
}
#cssmenu {
  width: auto;
  border-bottom: 3px solid #47c9af;
  font-family: 'Raleway', sans-serif;
  line-height: 1;
}
#cssmenu ul {
  background: #ffffff;
}
#cssmenu > ul > li {
  float: left;
}
#cssmenu.align-center > ul {
  font-size: 0;
  text-align: center;
}
#cssmenu.align-center > ul > li {
  display: inline-block;
  float: none;
}
#cssmenu.align-right > ul > li {
  float: right;
}
#cssmenu.align-right > ul > li > a {
  margin-right: 0;
  margin-left: -4px;
}
#cssmenu > ul > li > a {
  z-index: 2;
  padding: 18px 25px 12px 25px;
  font-size: 15px;
  font-weight: 400;
  text-decoration: none;
  color: #444444;
  -webkit-transition: all .2s ease;
  -moz-transition: all .2s ease;
  -ms-transition: all .2s ease;
  -o-transition: all .2s ease;
  transition: all .2s ease;
  margin-right: -4px;
}
#cssmenu > ul > li.active > a,
#cssmenu > ul > li:hover > a,
#cssmenu > ul > li > a:hover {
  color: #ffffff;
}
#cssmenu > ul > li > a:after {
  position: absolute;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: -1;
  width: 100%;
  height: 120%;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  content: "";
  -webkit-transition: all .2s ease;
  -o-transition: all .2s ease;
  transition: all .2s ease;
  -webkit-transform: perspective(5px) rotateX(2deg);
  -webkit-transform-origin: bottom;
  -moz-transform: perspective(5px) rotateX(2deg);
  -moz-transform-origin: bottom;
  transform: perspective(5px) rotateX(2deg);
  transform-origin: bottom;
}
#cssmenu > ul > li.active > a:after,
#cssmenu > ul > li:hover > a:after,
#cssmenu > ul > li > a:hover:after {
  background: #47c9af;
}

.image {
     margin-top:10px;
}
  </style>
  
</head>
<body>
  
  <div id='cssmenu'>
<ul>
   <li><a href='index1.php'>Home</a></li>
   <li><a href='sample.php'>My Profile</a></li>
   <li><a href='logout.php'>logout</a></li>   
</ul>
</div>

  <div id="wrapper">
  
  <h1><?php echo ucfirst($r1['fname'])."'s Card Details" ?></h1>
  <div class="image">
  <?php
              if($r1['picture'] == "")              	  
                  echo "<img width='350' height='300'  src='default.jpg' alt='Default Profile Pic'>";
              else {
                  echo "<img width='350' height='350'  src='".$r1['picture']."' alt='Profile Pic'>";
                   }
                                
                        
  ?>
</div>
  <form name="wallet" action="" method="POST">
  <div class="col-2">
    <label>
      Name <br><br>
     </label>
     <label>
        <?php echo $r1['fname']." ".$r1['lname'] ?>
    </label>
  </div>
  <div class="col-2">
    <label>
      Email <br><br>
    </label>
    <label>
      <?php echo $r1['email'] ?>
    </label>
  </div>
  
  <div class="col-3">
    <label>
      Card Number
     </label>
      <label>
       <?php echo $r2['card'] ?>
    </label>
  </div>
  <div class="col-3">

    <label>
      Amount
      </label>
      <label>
      <?php echo $r2['amount'] ?>
    </label>
  </div>
    
      </form>
  </div>
</body>
</html>
