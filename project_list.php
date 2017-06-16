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



  
$main_query1=$conn->query("select * from tbl_itp_main where deleted='0'");


if(isset($_POST['edit_itp']))
{ 
  echo "update tbl_itp_main set 
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    updated= NOW()
                    where id = '".$_POST['id2']."'";
  $main_query=$conn->query("update tbl_itp_main set 
                    name = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    updated= NOW()
                    where id = '".$_POST['id2']."'");
  echo "update tbl_itp_form_heading_header set 
                    title = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    updated= NOW()
                    where main_id = '".$_POST['id2']."'";
  $main_query2=$conn->query("update tbl_itp_form_heading_header set 
                    title = '".trim(mysqli_real_escape_string($conn,$_POST['project_name']))."',
                    updated= NOW()
                    where main_id = '".$_POST['id2']."'");
  header("location:project_list.php");

}
?>

<? include_once('header.php'); ?>
<body onbeforeunload=”HandleBackFunctionality()” style="background-color: white">

  <?
$project_name_query=$conn->query("select tbl_project.id as project_id,project_name as name,number from tbl_project_register left join tbl_project on tbl_project_register.project_id = tbl_project.id where tbl_project.id='".$_SESSION['admin']."'  group by project_id");
while ($obj_3=$project_name_query->fetch_object()) {
  //print_r($obj_3);
  ?>
  


	<div class="conntainer" >
    <div class="wrapper">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div style="text-align: center;padding: 10px;">  <input type="button" class="btn btn-info" class="button edit_click1" value="Add New ITP Project" style="cursor:pointer;color: black;font-weight: bold " onclick="add()" /></div>
        </div>
      </div>
      <div class="row" style="border-bottom: 1px solid #333;border-left: 1px solid #333;border-right: 1px solid #333;">
          <div class="col-md-12">
              <h3 align="center" style="text-shadow:1px 1px 1px rgba(18,18,18,1);font-weight:normal;color:#6495ED  ;letter-spacing:1pt;word-spacing:0pt;text-align:center;font-family:verdana, sans-serif;line-height:2; background-color: #696969;margin-bottom: 1px;margin-top: 1px;">ITP PROJECTS</h3>
          </div>
          <div class="col-md-12" style="padding-bottom: 50px;">    
              <div class="col-sm-3 hh"><h5 align="center">ITP Name</h5></div>
              <div class="col-sm-1 hh"><h5 align="center">ITP Edit</h5></div>
              <div class="col-sm-2 hh"><h5 align="center">ITP Delete</h5></div>
              <div class="col-sm-2 hh"><h5 align="center">Create ITP</h5></div>
              <div class="col-sm-2 hh"><h5 align="center">Create Checklist</h5></div>
              <div class="col-sm-2 hh"><h5 align="center">View ITP</h5></div>
          </div>
          <div class="col-md-12">
            <?

              while($row=$main_query1->fetch_object())
                {?>
              <div class="col-sm-3"><? echo $row->name ?></div>

              <div class="col-sm-1 text-center"><a data-toggle="modal" data-id="<? echo $row->name ?>" data-name="<? echo $row->id ?>" data-toggle="modal" title="Add this item" class="open-AddDialog btn btn-primary" href="#myModalNorm">Edit</a></div>

              <div class="col-sm-2 text-center"><a  class="btn btn-primary" data-id="<?=$row->id ?>" id="delete" href="#">Delete</a></div>
               
              <div class="col-sm-2 text-center">
                <form id="approved_form<?=$row->id?>" method="post" action="form.php" >
                  <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                  <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                  <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" class="btn btn-primary"  onclick="add_new_itp()"  class="button edit_click1" value="Creat New ITP" style="cursor:pointer; " />
                  </form></div>

              <div class="col-sm-2 text-center">
                <form  method="post" action="form.php" >
                   <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                   <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                   <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" class="btn btn-primary"  onclick="add_new_check()"  class="button edit_click1" value="Create New Checklist" style="cursor:pointer; " /> <br><br>
                  </form></div>

              <div class="col-sm-2 text-center">
                <form  method="post" action="view_itp.php" >
                   <input type="hidden"  name="itp_project" value="<?=$row->id?>" />
                   <input type="hidden" name="itp_project_name" value="<?=$row->name?>">
                   <input type="hidden" name="cip_name" value="<?=$obj_3->name?>">
                  <input type="submit" class="btn btn-primary"  onclick="view_itp()"  class="button edit_click1" value="View ITP" style="cursor:pointer; " /> <br><br>
                  </form></div>
                
               <? } ?>
               <?}?>
          </div>
      </div>

    </div> 
	
    
     
        

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
function add_new_check(){ alert('hlo');
  window.location.href="checklist_form.php"; 
}
function add_new_itp(){
  window.location.href="form.php"; 
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
<? include("footer.php"); ?>
</body>


</html>