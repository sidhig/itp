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
$main_query=$conn->query("select * from tbl_itp_main where deleted='0'");

if(isset($_POST['edit_itp']))
{
  $main_query=$conn->query("update tbl_itp_main set 
                    name = '".trim(mysqli_real_escape_string($connn,$_POST['project_name']))."',
                    created= NOW(),
                    updated= NOW()
                    where id = '".$_POST['id2']."'");
  header("location:project_list.php");

}
?>

<? include_once('header.php'); ?>
<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">


	<div id="container" >
	
     <div class="wrapper" style="border: 1px solid grey;
    float: left;
    position: absolute;
    /*margin: 30vh 0 0 -200px;*/
    top: 24vh;
    left: 5vw;
    width: 90%">
      <div style="text-align: center;">  <input type="button" class="btn btn-info" class="button edit_click1" value="Add New ITP Project" style="cursor:pointer;color: black;font-weight: bold " onclick="add()" /> <br><br></div>


    		<div class="Form_name" style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#6495ED	 ;letter-spacing:1pt;word-spacing:0pt;font-size:23px;text-align:center;font-family:verdana, sans-serif;line-height:2; background-color: #696969">ITP PROJECTS
			</div>
		
			 <table class="table table-hover" style= "border: 1px solid rgba(128, 128, 128, 0.57);">
           <thead>
        <tr style="background-color: #696969; color: white">
        <!--     <th>ITP  Number</th> -->
            <th>ITP Name</th>
            <th>ITP Edit</th>
            <th>ITP Delete</th>


           <!--  <th>Created Date</th> -->
            <th style="text-align: left;">Create ITP</th>
            <th style="text-align: left;">Create Checklist</th>
            <th>View ITP</th>

        </tr>
      </thead>

         <tbody style="" id='user'>
              <?

              while($row=$main_query->fetch_object())
                {?>
              
              <tr   style="background-color: #BDF2DF; font-size: 15px"> 
              
             
                <td><? echo $row->name ?></td>
                  <td>
              
                 <a data-toggle="modal" data-id="<? echo $row->name ?>" data-name="<? echo $row->id ?>" data-toggle="modal" title="Add this item" class="open-AddDialog btn btn-primary" href="#myModalNorm">Edit</a>
                </td>
                <td>
                  
                  <a  class="btn btn-primary" data-id="<?=$row->id ?>" id="delete" href="#">Delete</a>
                  
                </td>
         
                <td>
                  <form id="approved_form<?=$row->id?>" method="post" action="form.php" >
                  <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                  <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                  <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" class="btn btn-primary"  onclick="add_new_itp()"  class="button edit_click1" value="Creat New ITP" style="cursor:pointer; " /> <br><br>
                  </form>
                </td>
                 <td >
                  <form  method="post" action="form.php" >
                   <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                   <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                   <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" class="btn btn-primary"  onclick="add_new_check()"  class="button edit_click1" value="Create New Checklist" style="cursor:pointer; " /> <br><br>
                  </form>
                  </td>
                  <td>
                  <form  method="post" action="view_itp.php" >
                   <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                   <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                   <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" class="btn btn-primary"  onclick="view_itp()"  class="button edit_click1" value="View ITP" style="cursor:pointer; " /> <br><br>
                  </form>
                </td>
               
              </tr>

             <? } ?>
          </tbody> 
      </table>
 
   

      </div> <!-- wrapper close -->
     
        

</div><!--conntainer close-->

<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                   Edit ITP Project Here
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form  name="edit_itp" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ITP Project Name</label>
                      <input type="text" class="form-control"
                      id="Project" name="project_name" placeholder="Enter Project"/>
                      <input type="hidden" class="form-control"
                      id="id" name="id2" />
                  </div>

                  
                  <input type="submit" class="btn btn-primary" name="edit_itp" value="Save Changes">
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
               
                
            </div>
        </div>
    </div>
</div>

</body>
<footer>
  <? include("footer.php"); ?>
<footer>
<style type="text/css">
  table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}
th, td {
    border: none;
    text-align: left;
    padding: 8px;
} 
</style>
<script type="text/javascript">

function add()
{ //alert('hlo');
window.location.href="add_itp_project.php"; 
}
function add_new_check(){ //alert('hlo');
  //window.location.href="checklist_form.php"; 
}
function add_new_itp(){
  window.location.href="form.php"; 
}
}
function view_itp(){
  window.location.href="view_itp.php"; 
}
$(document).on("click", ".open-AddDialog", function () {
     var Id = $(this).data('id');
     var Id_pr = $(this).data('name');
     $(".modal-body #Project").val(Id);
     $(".modal-body #id").val(Id_pr);
    $('#myModalNorm').modal('show');
});


$(document).on('click','#delete',function(){
var element = $(this);
var del_id = element.attr("data-id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "ajax_project_delete.php",
   data: info,
   success: function(a){


 }
});
  $(this).parents("tr").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});

</script>