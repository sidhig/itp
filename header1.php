<?php
error_reporting(0);
session_start();
include_once('connect.php');

if(!isset($_SESSION['admin']))
{
  header("location:logout.php");
}
else
{
  $user= $_SESSION['admin'];
}

// $project_name_query=$connn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id")->fetch_object();
?>

<!DOCTYPE html>
<html>
<header>
  <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico"/>

 <!--  <script src="js/jquery.min.1.12.0.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="index_files/mbcsmbmcp.css" type="text/css" />
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</header>
<body>
   <div>
      <div class ="Name" style="width: 100% ; float: left; background-color: #333; color:#A9A9A9;object-position: 2; "> 
     <div  style="width: 100% ; float: left; background-color: #333; color:#A9A9A9;object-position: 2;margin-top:20px;position: relative; top:2px"> 
         <a href="header.php" style="text-decoration: none; color: #A9A9A9;"> Home Page - ITP </a> 
     </div> 
      
<div class="logout" style="float: right;   background-color: #333; color: white ;margin-left: 50px;"> <a href="logout.php" data-hover="Logout"> <img src="image/Logout.png"> 
</a>  </div>

      
      </div>
      
   </div>
   <br>
<div class="nav_wrap" style="margin-top:-10px; background-color:#333">
<nav id="primary_nav_wrap" >
<div class="nav_container" style="">
  <div id="mbmcpebul_wrapper">
  <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient38" style="width: 99px;"><div class="arrow"><a class="button_1" style="color:#A9A9A9">ITP Forms</a></div></div>
    <ul class="gradient_menu gradient108">
    <li class="first_item"><a href="project_list.php" class="" title="">ITP Projects</a>
      </li>
      </ul>   
</div>
  
</div>
</nav>




 <div class="col-sm-3 col-md-3" style="float: right;margin-top: 2vw;margin-left: 1vw">
        <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" id="search2" name="q">
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
    </div>
 <!-- <form class="navbar-form" role="search" style="background-color:#333;">
         <div class="input-group" id= "search_site" style="margin-top: 5vh">
            <input type="text" class="form-conntrol" placeholder="Search" id="search2" name="q" style="margin-left: 1vw;width: 6vw">
            <div class="input-group-btn">
                <button class="btn btn-default" id="submit_search_site" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
</form> -->

</div>



  <? include('footer.php') ?>

</body>

<style>
  
  body {
    background-color: white;
    height: 0vh;
    margin: 0px;
    overflow-x: hidden;

}


html *
{
  
   font-family: Arial;
   /*zoom: 0%;*/
}



.nav_container
{
     
    margin-top: 1vh;
    margin-left: 3.5vw;
    float: left;
    margin-bottom: 1vh;
    font-size: 1.4vw;
   }

.nav_wrap
{
  
  
  
  float: left;
  width: 100%;
  height: 11vh;
  background-color: #333;
  margin-top: -2px;


}

.logout a
{
     display: block;
    text-decoration: none;
    font-size: 13px;
    line-height: 32px;
    padding: 4px 25px;
    color: white;
    text-shadow:1px 1px 1px rgba(128,125,122,1);
    font-weight:bold;color:white;
    letter-spacing:1pt;
    word-spacing:-10pt;
    text-align:left;
    font-family:Arial;
  
}

.logout a:hover
{
-webkit-transform: scale(1.2);
-ms-transform: scale(1.2);
transform: scale(1.2);
transition: 0.3s ease;

}

.effect_item:hover
{
box-shadow: 0 0 0 2px white;
transition: 0.4s ease;
}



.welcome
{   
  text-shadow:1px 1px 1px rgba(222,222,222,1);font-weight:normal;color:#255915;background-color:#EBFCA4;letter-spacing:2pt;word-spacing:6pt;font-size:15px;text-align:center;font-family:impact, sans-serif;line-height:1;
}

.logo
{
border: 1px solid black;
float: left;
height: 100%;
right: 0;
top: 0;
}

.sub-sub_menu
{
  background-color: white;
}

.Name
{
 padding-top: 1vw;
padding-left: 3.5vw;


  
  text-shadow:1px 1px 1px rgba(0,0,0,1);font-weight:normal;color:#F5F5F5;letter-spacing:1pt;word-spacing:2pt;font-size:27px;text-align:left;font-family:arial, helvetica, sans-serif;line-height:1;
}

#search_site
{
/*  left: 3%;*/
  margin-top: 28px;
  float: right;
}
#submit_search_site
{
    margin-left: 0.5px;
    height: 34px;
    float: right;
  }
  

</style>
</html>