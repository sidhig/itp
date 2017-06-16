<?php
// error_reporting(0);
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
if(isset($_POST['save']))
{
  /*echo "insert into tbl_itp_main set 
                    id = '".trim(mysqli_real_escape_string($conn,$_POST['project_id']))."',
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    created= NOW(),
                    deleted=0,
                    updated= NOW()";*/
  $insert_query="insert into tbl_itp_main set 
                    id = '".trim(mysqli_real_escape_string($conn,$_POST['project_id']))."',
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    created= NOW(),
                    deleted=0,
                    updated= NOW()";
                     if (mysqli_query($conn, $insert_query)) {
                      $id= mysqli_insert_id($conn);

         //echo $id;
                        
                          //echo "insert into tbl_itp_form_heading_header set main_id='".trim(mysqli_real_escape_string($conn,$_POST['project_id']))."',title='".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',created=now(),updated=now()";
                      $res_que1=$conn->query("insert into tbl_itp_form_heading_header set main_id='".trim(mysqli_real_escape_string($conn,$_POST['project_id']))."',title='".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',created=now(),updated=now()");
           


  }
  if($insert_query)
  {
  
  $success=1;

}
}
 


// $project_name_query=$connn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id")->fetch_object();
$main_query=$conn->query("select * from tbl_itp_main");
$get_id=$conn->query("select max(id)+1 as id from tbl_itp_main")->fetch_object();
?>
<? include_once('header.php'); ?>
<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">


	<div id="conntainer">
	
     <div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: 30vh 0 0 -200px;*/
    top: 24vh;
    left: 5vw;
    width: 90%">
     


    		<div class="Form_name" style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#6495ED	 ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2; background-color: #696969">NEW ITP PROJECT
			</div>
       <form class="well form-horizontal" action=" " method="post"  id="conntact_form">
<div class="alert alert-success" role="alert" style="<? if($success!='1'){ echo 'display:none;';}?>">
  <strong>Well done!</strong> You successfully Added New Project.&nbsp
  <button onclick="back()"> Go Back</button>
</div>

<div class="form-group">
   <label class="col-md-4 conntrol-label" style="text-align: left;color: #E74C3C"><u>ITP DETAIL</u></label> 
  
</div>

<!-- Text input-->
<input name="project_id" id="date_show" placeholder="Id" class="form-conntrol"  type="hidden" value="<?=$get_id->id;?>" readonly>

<div class="form-group">
  <label class="col-md-4 conntrol-label" >ITP Project Name</label> 
    <div class="col-md-4 inputGroupconntainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphiconn glyphiconn-star"></i></span>
  <input  placeholder="ITP Project Name" class="form-conntrol"  type="text" value="" name="project_name" required>
    </div>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 conntrol-label"></label>
  <div class="col-md-4">
    <input type="submit" class="btn btn-success" value="Submit" name="save"> <span class="glyphiconn glyphiconn-share-alt"></span></input>
  </div>
</div>

</fieldset>
</form>
			
			 

   

      </div> <!-- wrapper close -->
     
        

</div><!--conntainer close-->
	


</body>
<footer>
  <? include("footer.php"); ?>
<footer>
<script type="text/javascript">
  
function back()
{
window.location.href="project_list.php"; 
}

</script>
