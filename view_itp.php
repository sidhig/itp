<?
   include 'connect.php';
   //print_r($_POST);
   error_reporting(0);
   $name=$_POST["itp_project_name"];
   $main= $_POST["itp_project"];
    $cip_name=$_POST["cip_name"];

          
         
           
?>


<html>
  <head>
    <title>ITP</title>
     <link rel="image icon" type="image/png" sizes="160x160" href="">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />


<!-- 
     <script type="text/javascript" src="jquery/jquery-1.7.2.min.js"></script>
     
<script src="js/jquery-ui/jquery-ui.js" type="text/javascript"></script>
<script src="js/bootstrap-multiselect.js"
    type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" />

<link href="css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" /> -->


    <script type="text/javascript" src="js/jquery.min.js"></script>
<link href="css/bootstrap.min.css"
    rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap-multiselect.css"
    rel="stylesheet" type="text/css" />
<script src="js/bootstrap-multiselect.js"
    type="text/javascript"></script>
    <style type="text/css">
      #log{
        max-width: 26vh;
     }
    .highlight tr{
     
     border-bottom: : 1px solid black !important;
      }
      .cp{
      padding-left: 30px !important;
      padding-right: 30px !important;
     }
     .cname { 
   height: 12.6vh;
 }
     @media only screen and (min-device-width : 768px) and (max-device-width : 1024px)  { 
     .cp{
     /* padding-left: 15px !important;
      padding-right: 15px !important;*/
     }
     .lgo{max-width: 150px;}
     .cname { 
   height: 14.6vh;
 }
   }
   

    </style>
    <style type="text/css">
./*ui-widget-overlay { opacity: .70;filter:Alpha(Opacity=70); }
#special_info{
  overflow-y: scroll;
}*/


</style>
<script type="text/javascript">
   $(document).ready(function() {     
            $('.multiselect').multiselect({
              maxHeight: 300,
              });      
    });
    $(document).ready(function(){
   $('#ref_docs').on('change',function(){
    //alert('hlo');
   
    if( $(this).val()=="other"){ 
     $("#ref_docs").hide(); 
    $("#otherType").show();
   
    }
    else{
    $("#otherType").hide()
    }
});
 });
</script>
     <script>

function edit_heading_rows(id){ 
        
      $("#id").val(id);
      
     $.ajax({
       type: "POST",
       url:"select_edit.php",
       data:"id="+id,
       success: function(data){
       alert(data);
        //arr_3=data; 
        var data_arr = data.split(",");
        var multi_arr=data_arr.slice(16, data_arr.length);
        //alert(multi_arr);
        $("#edit_id").val(data_arr[0]);
       $("#edit_activity").val(data_arr[4]);
       $("#edit_ref_docs_input").val(data_arr[5]);
       $("#edit_accept_criteria").val(data_arr[6]);
       $("#edit_key").val(data_arr[7]);
       $("#edit_person").val(data_arr[8]);
       $("#edit_remarks_rec").val(data_arr[9]);
       //$("#edit_is_doc_needed").val(data_arr[10]);
       var idNum= data_arr[10];
       ///alert(idNum);
       if(idNum == '1')
       {
         $('#edit_is_doc_needed').prop('checked',true);
       }
       else
       {
        $('#edit_is_doc_needed').prop('checked',false);
       }
      
       $.each(multi_arr, function(index,value) {
        alert(value);
          //$("#edit_ref_docs").multiselect("refresh");
        $("#edit_ref_docs option[value='" + value + "'  ]").attr('selected', true);
        $("#edit_ref_docs1 option[value='" + value +"'  ]").attr('selected', true);
         });
       
       $("#edit_ref_docs").multiselect("refresh");

       }
      });
     
    }
    $(function() { //alert('hlo');
     $("#update_heading_rows").click(function(){ 
      
          $("#id").val(id);

            $.ajax({
                 type: "POST",
                 url: "query_edit.php",
                 data: $("#edit_heading_rows_form").serialize()+"&for='heading_rows'",
                 cache: false,
                 success: function(qry){ 
                   alert(qry);
                  
                    location.reload();
                    
                 }
            });
        
    });
   });
  

/*  $(document).ready(function(){ //alert('hlo');
  $('[data-dismiss=modal]').on('click', function () {
     var $t = $(this),
        target =  $t.data("target") || $t.parents('.modal') || [];
    
  $(target)
   .find("input").val('').end() 
   .find("input[type=checkbox]")
       .prop("checked")
       .end();
      
});
});*/
   
 /*$(document).ready(function() { 
   $('[data-dismiss=modal]').on('click', function () {alert('hlo');
  
    $('#activity').val("helo");
    $('#ref_docs').val("");
    $('#ref_docs_input').val("");
    $('#key').val("");
    $('#remarks_rec').val("");
    $('#is_doc_needed').val("");
  });
});
*/
     




function add_heading_rows(index,id,title){ //alert(title); 
        
        $("#title").val(title);
       $("#index").val(index);
      $("#id").val(id);
    
$("#modal_add").show();
   /* $("#dialog_add").dialog({
      modal: true,
      title: title,
      width: 600,
      autoOpen: false,
      draggable: false,
      
      
      
    });
      $('#dialog_add').dialog('open');*/
     
    }

$(function() { 


     
     

    $("#save_heading_rows").click(function(){
      
         
            $.ajax({
                 type: "POST",
                 url: "query_add.php",
                 data: $("#add_heading_rows_form").serialize()+"&for='heading_rows'",
                 cache: false,
                 success: function(data){ 
                   alert(data);
                  
                   
                    //$('#dialog_add').dialog('close');
                    //$("#add_heading").hide();
                    location.reload();
                    
                 }
            });
        //}
    });


});



</script>


<script type="text/javascript">
 /*function changeText2(){
var special_info = document.getElementById('special_info').value;
document.getElementById('boldStuff2').innerHTML = special_info;
var node=document.createElement("LI");
var textnode=document.createTextNode(special_info);
node.appendChild(textnode);
document.getElementById("demo").appendChild(node);
 }*/


 
$(document).ready(function(){
   


    $('#special_info').keyup(function() {
       $("#info").val($(this).val());
    });
});
$(document).ready(function(){
    $("#location").keyup(function(){
     //var comments = this.value;
     //alert($(this).val());
       $("#loc").val($(this).val());
    });
});
$(document).on('click','#submit',function(){
 $.ajax({
   type: "POST",
   url:"query.php",
   data:$("#head_data").serialize(),
   success: function(data){ alert(data);
   
   }
 });
});
 $(document).on('click','#delete',function(){
var element = $(this);
var del_id = element.attr("data-id");
alert(del_id);
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({ 
   type: "POST",
   url: "row_heading_delete.php",
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



 
  </head>
  <body>
       <div  class="container-fluid cp" style="margin-top:50px;">
          <div class="col-xs-12" style="margin-bottom: 10px;">
            <div class="col-xs-2" style="padding-left: 0;" ><img src="image/logo.png"></div>
            <div class="col-xs-10" style="border:1px solid;border-color: #9d9d9d;margin-top:2vh;">
            <div class="col-xs-8" style="color: #FA5536;font-weight: bold;font-size: 2.5vw;padding-bottom: 4.3vh; " >QUALITY MANAGEMENT SYSTEM<br><span style="color:#333333;font-size: 1.5vw">Bulk Earthworks (Cut to Fill) </span>
          </div>
            <div class="col-xs-4"  style="border-left:1px solid;border-color: #9d9d9d;" >
              <div style="border-bottom:1px solid;font-size: 1.5vw; ">QMS</div>
              <div style="border-bottom:1px solid;font-size: 1.5vw; ">Doc. Code: C-Q-ITP-0202C</div>
              <div style="border-bottom:1px solid;font-size: 1.5vw; ">Issue Date: TBC</div>
             <div style="font-size: 1.5vw;" >Issue No: 4</div>
             </div>
             </div>
      </div>
    

    
                      
       <div class="col-xs-12">       
        <center >
          <div style="text-align: left;">
            <p style="font-size: 14px;font-family: Arial;font-weight: bold">Inspection And Test Plan</p>
            <p style="font-size: 14px;font-family: Arial;font-weight: bold">Project: Auto Upload from Business Register</p>
          </div>

           <?
   //echo "SELECT * FROM tbl_itp_form_heading_header WHERE main_id='$main'";
     $res2=mysqli_query($conn,"SELECT * FROM tbl_itp_form_heading_header WHERE main_id='$main'");
        
                  
                   $row=mysqli_fetch_array($res2);
                      
                       //print_r($row) ;
                      ?>
          <form id="head_data">
            <input type="hidden" name="main" value="<?=$main?>">
            <input type="hidden" name="name" value="<?=$name?>">
            <table class="table table-bordered table-responsive" id="head_table" style="font-size: small;">
              <tr>
                <td colspan="3" style="font-size: 1.5vw;font-family: Arial;border:1px solid black;"><strong>TITLE :<?=$row[6]?></strong> 
                </td>
                <td colspan="2" style="font-size: 1.5vw;font-family: Arial;border:1px solid black;"><strong>LOCATION: <!-- <input type="text" id="location" name="location" value="<?=$row[2];?>"> --><?=$row[2];?></strong> 
                <input type="hidden" name="loc" id="loc">
                </td>
              </tr>
              <tr>
                <td style="font-size: 1.5vw;font-family: Arial;border:1px solid black;"><strong>Completed by: </strong></td>
                <td style="font-size: 1.5vw;font-family: Arial;border:1px solid black;"><strong>Date:<?= date("d/m/Y");?> </strong></td>
                <td style="font-size: 1.5vw;font-family: Arial;border:1px solid black;"><strong>Project Name:<?=$cip_name;?> </strong></td>
                <td style="font-size: 1.5vw;font-family: Arial;border:1px solid black;"><strong>Audited By: </strong></td>
                <td style="font-size: 1.5vw;font-family: Arial;border:1px solid black;"><strong>Date:<?= date("d/m/Y");?></strong></td>
              </tr>
              <tr>
               <?
                $res2="SELECT * FROM `tbl_itp_form_heading_header` WHERE main_id='$main'";
                 $result=mysqli_query($conn,$res2);
                  $row=mysqli_fetch_array($result);
                      ?>
                <td colspan="2" style="font-size: 1.5vw;font-family: Arial;border:1px solid black;" ><label >Trade Contractors Name:</label>&nbsp;&nbsp; <span style="background-color: yellow;text-align: center;" ><?=$row[7];?></span><!-- <select    id="trade_name" name="trade_name">
              <?
               $sql=$conn->query("select *  from tbl_employer");
                   while($ob_2 =$sql->fetch_object())
                    {
                        
                     ?>
                   <option <?=($row[7]==$ob_2->company_name)?'selected':''?> ><?=$ob_2->company_name;?></option>
                     
                     
                      <?}
                    
                      ?> 
               </select> -->
          
  
              </td>
            <?
             //echo "SELECT * FROM `tbl_itp_form_heading_header` WHERE main_id='$main'";
            $res="SELECT * FROM `tbl_itp_form_heading_header` WHERE main_id='$main'";
            $result=mysqli_query($conn,$res);
            $row=mysqli_fetch_array($result,MYSQLI_NUM);
            //print_r($row);
             /* $req=explode(",", $row);
                echo $req;*/
                 ?> 
              <td   rowspan="2" colspan="2" style="font-size: 1.5vw;font-family: Arial;border:1px solid black;">
              <strong>SPECIAL INFORMATION/ COMMENTS: <br> <!-- <textarea cols="40" rows="3"  placeholder="Enter special information  here..." id="special_info" name="special_info" > --> <span style="background-color: yellow;" ><?=$row[5]?></span><!-- </textarea> -->
             <input type="hidden" name="info" id="info">
            
         
           </strong>   
              </td>
              <td rowspan="2" colspan="2" style="font-size: 1.5vw;font-family: Arial;border:1px solid black;" >
              Attach Reports, <br>Certificates, NCR’s and <br>QA Documents to ITP.<br><!-- <input type='hidden' name='qry_type' value='add'><input type='button'   id="submit" value='Submit' /> -->
              </td>
            <tr>
              <td colspan="2"  style="font-size: 1.5vw;font-family: Arial;border:1px solid black;">
             Key Controls: H – Hold, W – Witness, S – Surveillance,
             </td>
            </tr>
          </tr> 
        </table>
        </form>
           
        <table id="heading_table" class="table table-bordered table-responsive" style="font-size: small;">
          <tr>
            <th  style="background-color: #ccc;border:1px solid black;text-align: center;font-size: 1.3vw;"><br>
              Item No.
            </th>
            <th style="background-color: #ccc;border:1px solid black;font-weight: bold;text-align: center;font-size: 1.3vw;"><br>
              Activity<br><span >(Including the Necessary Inspections)</span> 

            </th>
            <th width="100px;" style="word-wrap:break-word;background-color: #ccc;border:1px solid black;font-weight: bold;text-align: center;font-size: 1.3vw;"><br>
              Reference Documents <br><span style="font-weight: normal;">(Specify the required drawing numbers, relevant specifications, procedures, etc.) </span>

            </th>
            <th style="background-color: #ccc;border:1px solid black;text-align: center;font-size: 1.3vw;"><br><br>
              Acceptance Criteria 
            </th>
            <th style="background-color: #ccc;border:1px solid black;text-align: center;font-size: 1.3vw;"><br><br>
              Key
            </th>
            <th style="background-color: #ccc;border:1px solid black;text-align: center;font-size: 1.3vw;"><br><br>
              Person 
            </th>
            <th style="background-color: #ccc;border:1px solid black;text-align: center;font-size: 1.3vw;"><br>
             CIP PIN And Date 
            </th>
            <th style="background-color: #ccc;border:1px solid black;text-align: center;font-size: 1.3vw;"><br>
              Client Sign/ PIN And Date 
            </th>
            <th style="background-color: #ccc;border:1px solid black;text-align: center;font-size: 1.3vw;"><br>
              Remarks/Records<br><span style="font-weight: normal;">(E.g. Report/ Certificate/Checklist No, NCR No, Testers Name, Test Frequency etc.) </span>
            </th>
          </tr>
          <tr>
            <th colspan="9" style="font-weight: bold;border:1px solid black;font-size: 1.3vw;">Pre-Compliance Documents</th>
            </tr>
          
         <?
           //echo "select * from tbl_from_data_heading ";
            $qry = "select * from tbl_from_data_heading ";
           
            $result1 = mysqli_query($conn,$qry);

                     while($row=mysqli_fetch_array($result1))
                     {
                        ?> 
            
          
              <tr class="highlight">
                <td style="border-bottom:1px solid black;border-right-color:white;border-left:1px solid black;font-weight: bold;color: #33C9FF;"><?= $row['index']; ?></td>

                <td colspan="8" style="border-bottom:1px solid black;border-right:1px solid black;font-weight: bold;color: #33C9FF;"><?=$row['title'];?>
                  
              </td>            
           </tr>
          
           
          
              <tr>
              <? 
             //echo "SELECT * FROM tbl_from_data_row where main_id='$main' and data_heading_id='".$row['id']."' and is_deleted='0'";
           $qry_row = $conn->query("SELECT * FROM tbl_from_data_row where main_id='$main' and data_heading_id='".$row['id']."' and is_deleted='0'");
           
            while ($row_1 = mysqli_fetch_array($qry_row)) {
         
              ?>
                <td style="font-weight: bold;border:1px solid black;font-size: 1.1vw;"><?=$row_1['item_no']?></td>
                <td style="border:1px solid black;font-size: 1.1vw;"><?=$row_1['activity']?></td>
                
                <td style="border:1px solid black;">
                              <div style="word-wrap: break-word;width: 100px;font-size: 1.1vw;">
                                  
                          <?
                                $result = mysqli_query($conn,"select * from tbl_ref_doc left join tbl_form_image ON tbl_form_image.ref_doc_id = tbl_ref_doc.id and tbl_form_image.is_deleted = '0' where tbl_ref_doc.row_id ='".$row_1['id']."' and tbl_ref_doc.is_deleted='0'");

                                 while ($row_2 = mysqli_fetch_array($result)) {
                                    
                                     
                                 if($row_2['image_name'] !="" )
                                 {
                                  echo "<a href=/API/Uploads/".$row_2['image_name'].">".$row_2['ref_doc']."</a>"."<br>";
                                                              }
                                                              else
                                                              {
                                                                echo $row_2['ref_doc']."<br>";
                                                              }
                                           
                                   }
                                 ?>

                              
                              <br >
                              <?
                              $res_2=$conn->query("SELECT *,tbl_from_data_row.id ,tbl_form_data_filled.id as filled_data_id FROM tbl_from_data_row LEFT JOIN tbl_form_data_filled ON tbl_form_data_filled.row_id = tbl_from_data_row.id Where tbl_from_data_row.data_heading_id ='".$row['id']."' and tbl_from_data_row.item_no= '".$row_1['item_no']."'  AND tbl_from_data_row.main_id='$main'")->fetch_object();

                              if($res_2->ref_doc_input!='')
                              {
                                ?>
                                <SPAN style="background-color:yellow;"><?=$res_2->ref_doc_data?></SPAN>
                          <?
                              }
                              else
                              {
                                ?>
                                <SPAN style="background-color:yellow;"><?=""?></SPAN>
                              
                              <? }

                              ?>
                              
                              
                          
                              </div>
                </td>
                <td style="border:1px solid black;font-size: 1.1vw;"><?=$row_1['acc_criteria']?></td>
                <td style="border:1px solid black;font-size: 1.1vw;"><?=substr($row_1['key'],0,1);?></td>
                <td style="border:1px solid black;font-size: 1.1vw;"><?=$row_1['person']?></td>
                <td style="border:1px solid black;font-size: 1.1vw;"></td>
                <td style="border:1px solid black;font-size: 1.1vw;"></td>
               
                <td style="border:1px solid black;font-size: 1.1vw;"><?=$row_1['comments']?>&nbsp;<br><span>User Comments:</span> 

                <?
               
                $res_1=$conn->query("SELECT *,tbl_from_data_row.id ,tbl_form_data_filled.id as filled_data_id FROM tbl_from_data_row LEFT JOIN tbl_form_data_filled ON tbl_form_data_filled.row_id = tbl_from_data_row.id Where tbl_from_data_row.data_heading_id ='".$row['id']."' AND tbl_from_data_row.item_no='".$row_1['item_no']."' AND tbl_from_data_row.main_id='$main'");

                // echo "SELECT *,tbl_from_data_row.id ,tbl_form_data_filled.id as filled_data_id FROM tbl_from_data_row LEFT JOIN tbl_form_data_filled ON tbl_form_data_filled.row_id = tbl_from_data_row.id Where tbl_from_data_row.data_heading_id ='".$row['id']."'AND tbl_from_data_row.main_id='$main'";
                while($row_comm=$res_1->fetch_array()){
                //print_r($row_comm);
                ?><?= $row_comm['remark']?>
                
                <?
                 }
                ?>
            </td>

              </tr>
              
             
              <?
              }
              ?>
             
                
                <?
                     }
                 
                 ?>
               
           
        


              
          
        </table>


    
    <h4 align="left"><u>Final Sign Off</u></h4>
    <table class="table table-bordered table-responsive" style="border:1px solid black;" class="table">
  <thead>
  <tr>
    <th   colspan="4" style="text-align: center;border:1px solid black;background-color: #ccc;font-size: 2.2vw">The personnel below confirm that the ITP form has been satisfactorily completed.</th>
  
  </tr>
    <tr>
      <th style="border:1px solid black;background-color: #ccc;font-size: 2vw">Position</th>
      <th style="border:1px solid black;background-color: #ccc;font-size: 2vw">Name</th>
      <th style="border:1px solid black;background-color: #ccc;font-size: 2vw">Signature</th>
      <th style="border:1px solid black;background-color: #ccc;font-size: 2vw">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th style="font-weight: normal;border:1px solid black;font-size: 1.5vw">Project Manager</th>
      <td style="border:1px solid black;font-size: 1.5vw"></td>
      <td style="border:1px solid black;font-size: 1.5vw"></td>
      <td style="border:1px solid black;font-size: 1.5vw"></td>
    </tr>
    <tr>
      <th style="font-weight: normal;border:1px solid black;font-size: 1.5vw">Site Manager</th>
      <td style="border:1px solid black;font-size: 1.5vw"></td>
      <td style="border:1px solid black;font-size: 1.5vw"></td>
      <td style="border:1px solid black;font-size: 1.5vw"></td>
    </tr>
    
  </tbody>
</table>
    </center>
</div>
 

  




   </div>
   </div>

  </body>
</html>