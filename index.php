<?php
error_reporting(0);
session_start();
include_once('connect.php');
if(isset($_SESSION['admin']))
{


// unset($_SESSION['admin']); 
// unset($_SESSION['induction']); 
// unset($_SESSION['pin']); 
}

$sql_project =$conn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id group by project_id");
// print_r($_SESSION);


?>

<html>

<title> Login - Site Admin </title>
<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico" />
<script src="js/prefixfree.min.js"></script>
<script src="js/jquery.min.1.12.0.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script> -->


<script src="js/mini-jquery-bgswitcher.js"></script>

<!-- <script src="js/fullclip2.js"></script> -->

<!-- <center><div class="welcome">Login </div> </center>
 -->

<body class="fullBackground">

  <div class="login">
      <div class="logo" style="text-align: center;font-family: helvetica;"><br><br> <img src="image/logo.png" height="100px" width="100vw"> </div>
   <center>  <p style="color: white;font-size: 17px;"><span style="opacity: 0.8">sign</span> <strong  style="opacity: 1">in</strong></p></center>
    <form method= "POST" id= "login_form_id" name= "login_form_name" autocomplete="off">
    <div class="form_text">
   <label class="username_label">Pin Number</label>
    <input type="text" id="username" name="user" class="user_name_css"> <br> 
    <label class="username_label">Password</label>
    <input type="password"  id="password" name="pass" class= "password_css"> <br>
    <input type="checkbox" class="username_label">
    <label style="font-size: 13px;">Keep me signed in</label><br>
    <input type="button" value="OK" name = "login_btn" id="myBtn" onclick="validate();" style="float: right">
  </div>
  <div id="loading"></div>
    <div> <a id="anchor" style="display: hidden" href="#login_form"></a> </div>
    <div id="loading" style="margin: 7vh 7vw; font-size: 14;font-style: italic; font-weight: 200"></div>
     <!-- <button class="btn_induction"> <a href="login_site_induction_form.php"> Go To Site Induction </a></button> -->
    
  <div style="text-align: center;margin-right: 2vw;margin-top: 12vh"><img src="image/Line 1.png" height="1vh" width="220vw"></div>
  <div class="forgot_pass" style="text-align: center;"> <p id="forgot_text">Forgot Password? <span><button id="forgot_btn">Go</button></span></p></div>



    <div id="error" style="<? if($err!='1'){ echo 'display:none;';}?> width:86%; height:60px; top:5px; color:#00FCE9;"> 
      <h5 style="width: 120%;font-size:.9rem; text-align: center;">Please enter valid Pin Number/ Password<h5>
      </div>

       
    </form>

  </div>
  <div style="visibility: hidden;" id="hidden_project_name"></div>
  <div id="hidden_induction_no"></div>
  <div id="hidden_pin"></div>

</body>


<style>
@font-face {
  font-family: 'Helvetica_Nue';
   src: url('fonts/helvetica-neue-5923ee0f5f95b.ttf');
}



    body{
/* background-image: url("image/login BG.png");
     background-repeat: no-repeat;
    background-attachment: fixed;
background-size: 100vw 100vh;

    height: 0vh;
    margin: 0px;*/



 /* background-position: center center;
  background-attachment: fixed;
  background-size: cover;
  /*position: absolute;*/
 /* top: 0;
  left: 0;*/
 */

}

.fullBackground
{
  overflow: hidden;
}
    
    html *
{
  
   font-family: Helvetica_Nue;
   

}

    #a1:hover , #a2:hover , #a3:hover , #a4:hover , #a5:hover,#a6:hover,#a7:hover,#a8:hover{
    background-color:  #ab302a;
     }
     .active{
      background-color:  #ab302a;
     }
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    .navbar-inverse {
     background-color: #101010;; 
     border-color: #101010;
    }
   footer {
   position:fixed;
   left:0px;
   bottom:0px;
   height:50px;
   width:100%;
   background:grey;
   padding-left: 45%;
    }
   .login {

    /* z-index:1;
    background-color: rgba(222, 222, 222, 0.91);*/
    background-image: url('image/9.png');
    
    z-index: -1;
/*  background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.3)), url('image/4.png');
  z-index: -1;
  */
 
  
  background-repeat: no-repeat;
    background-attachment: fixed;
background-size: 200vw 88vh;

  height: 75vh;
  margin: 12vh auto 0;
  width: 28vw;



  

  color:black;
 /* box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);*/
}
input[type="password"], input[type="text"] {
  /*background: url('http://i.minus.com/ibhqW9Buanohx2.png') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);*/
  background-color: #DF5430;
  /*border: 1px solid #a1a3a3;*/
  border-radius: 20px;
 /* box-shadow: 0 1px #fff;
  box-sizing: border-box;*/
  color: white;
  height: 39px;
  /*margin: 41px 0 0 55px;*/
  border-color: transparent;
  margin-bottom: 2vh;
  margin-left: 3vw;
  padding-left: 1vw;
  transition: box-shadow 0.3s;
  width: 18vw;
}
#myBtn {

  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  font-family: Arial;
  color: #ffffff;
  font-size: 10px;
  background: #516470;
  padding: 10px 20px 10px 20px;
  margin-right: 4.5vw;
  text-decoration: none;
  border-color: transparent;
  margin-right: 5vw;
  outline: none;

}
#btn:hover {
 
transform: skew(-10deg);
box-shadow:
1px 1px #373737,
2px 2px #373737,
3px 3px #373737,
4px 4px #373737,
5px 5px #373737,
6px 6px #373737;
-webkit-transform: translateX(-3px);
transform: translateX(-3px);
transition: 0.20s ease;
}
#forgot_btn:hover {
 

/*background-color: #41C9B5;
transition: 0.20s ease;
*/

 background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #fc8d83));
  background:-moz-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
  background:-webkit-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
  background:-o-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
  background:-ms-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
  background:linear-gradient(to bottom, #e4685d 5%, #fc8d83 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#fc8d83',GradientType=0);
  background-color:#e4685d;

/*background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #41C9B5));
  background:-moz-linear-gradient(top, #e4685d 100%, #41C9B5 100%);
  background:-webkit-linear-gradient(top, #e4685d 100%, #41C9B5 100%);
  background:-o-linear-gradient(top, #e4685d 5%, #41C9B5 100%);
  background:-ms-linear-gradient(top, #e4685d 5%, #41C9B5 100%);
  background:linear-gradient(to bottom, #e4685d 5%, #41C9B5 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#41C9B5',GradientType=0);*/

} 
.welcome
{

height: 20px;
font-size: 25px;
height: auto;
background-color:  #2c3338;
font-family: "Comic Sans MS", cursive, sans-serif;
color: #3498db;
font-style: bold;
}

.error
{
  border: 2px solid;
  border-color: black;
  height: 10px;
}
.btn_induction {
  width:240px;
  height:35px;
  display:block;
  font-family:Arial, "Helvetica", sans-serif;
  font-size:16px;
  font-weight:bold;
  color:black;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  text-shadow:1px 1px 0px #37a69b;
  padding-top:6px;
  margin: 29px 0 0 29px;
  position:relative;
  cursor:pointer;
  border: none;  
  background-color: #3498db;
  background-image: linear-gradient(top,#3db0a6,#3111);
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius:5px;
  box-shadow: inset 0px 1px 0px #2ab7ec, 0px 5px 0px 0px #497a78, 0px 10px 5px #999;
}

.btn_induction:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
  transform: skew(-10deg);
box-shadow:
1px 1px #373737,
2px 2px #373737,
3px 3px #373737,
4px 4px #373737,
5px 5px #373737,
6px 6px #373737;
-webkit-transform: translateX(-3px);
transform: translateX(-3px);
transition: 0.20s ease;
}

/* The Modal (background) */





#myBtn:hover {
 /* background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #41C9B5));
  background:-moz-linear-gradient(top, #e4685d 5%, #41C9B5 100%);
  background:-webkit-linear-gradient(top, #e4685d 5%, #41C9B5 100%);
  background:-o-linear-gradient(top, #e4685d 5%, #41C9B5 100%);
  background:-ms-linear-gradient(top, #e4685d 5%, #41C9B5 100%);
  background:linear-gradient(to bottom, #e4685d 5%, #41C9B5 100%);
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#41C9B5',GradientType=0);*/
  background-color:#41C9B5;
}
#myBtn:active {
  position:relative;
  top:1px;
}

.username_label
{

 margin-left: 4vw;
font-size: 12;
color: #CECECE;
/* margin-bottom: 2vh;*/
}

#username,#password
{
  outline: none;
}
.form_text
{
  margin-top: 12vh;

}
#forgot_text
{
  color: white;
  font-size: 14;
}
#forgot_btn
{
-webkit-border-radius: 60;
  -moz-border-radius: 60;
  border-radius: 60px;
  font-family: Arial;
  color: #ffffff;
  font-size: 12px;
  margin-left: 1vw;
  background: transparent;
  /*padding: 10px 20px 10px 20px;*/
  border: solid #ffffff 1px;
  text-decoration: none;

}

#login_form_id
{
  margin-top: -8vh;
  margin-left: 2vw;
}

</style>
<script>


function validate()
{


$("#error").css("display", "none");
$('#loading').html('<img src="https://d.zmtcdn.com/images/ajax-loader.gif">&nbsp Please Wait');
$('#loading').show();
 var id= document.getElementById('username').value;
 var pass= document.getElementById('password').value;

 // $("#error").css("display", "none");
  
  $.ajax({
                      type: "POST",
                      url: "index_validate.php",
                      data: {text1: id,text2: pass},
                      // dataType: 'json',

                      success: function(data) {
                            
                     // alert(data);
                           var json = JSON.parse(data);
                            // alert(json);
                            if(json == "")
                            {
                             $("#error").css("display", "block");
                            }
                            else
                            {
                              var id=json[0]["number"];
                              var pin=json[0]["pin"];
                              var project_id=json[0]["project_id"];
                               index_validate(id,pin,project_id);

                            }

                            $('#loading').hide(1000);    
                          }
                         
                      
                      
                    
                       
                  });
              

}

  function index_validate(id,pin,project_id)
  {
    
    
     $.ajax({
                      type: "POST",
                      url: "ajax_index_session.php",
                      data: {text1: id,text2: pin,text3: project_id},
                      // dataType: 'json',

                      success: function(data) {
                           
                           var res = data.split(",");
                        $('#hidden_pin').val(res[2]);
                        $('#hidden_induction_no').val(res[1]);
                        $('#hidden_project_name').val(res[0]);

                        window.location="header.php";
                         
                      
                                
                          }
                         
                      
                      
                    
                       
                  });
      
  }
 






</script>




<script>
var images = ['image/slider_1.jpg', 'image/slider_2.jpg', 'image/slider_3.jpg','image/slider_4.jpg'];
  bgSlider({images:images, animDuration: 1900, slideDuration: 20000});
  el:'body';


</script>


<style>


#loading
{
  text-align: center;
}


.bg-slider-img {
/*  position: absolute;
  z-index: -1;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
 
background-size:cover ;
  background-position: center;*/

  position: absolute;

  z-index: -1;

  top: 0;

  left: 0;

  height: 100vh;
  width: 100vw;
  background-size: cover;
  background-position: center;




  /* Hide thing by pushing it outside by default */
  
}

</style>
</html>