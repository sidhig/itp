<?
 error_reporting(0);
 include 'connect.php';
//print_r($_POST['id']);
 //var_dump($_POST['ref_docs']);
$do_edit= $_POST['docs'];
$edit=$_POST['ref_docs'];
print_r($do_edit);
print_r($edit);

 

      //echo "update  tbl_from_data_row set activity='".$_POST['activity']."',ref_doc_input=' ".$_POST['ref_docs_input']."',acc_criteria='".$_POST['accept_criteria']."',`key`='".$_POST['key']."',person='".$_POST['person']."',comments='".$_POST['remarks_rec']."',is_doc_needed='".$_POST['is_doc_needed']."',updated=now() where id='".$_POST['id']."'";
    $res="update  tbl_from_data_row set activity='".$_POST['activity']."',ref_doc_input=' ".$_POST['ref_docs_input']."',acc_criteria='".$_POST['accept_criteria']."',`key`='".$_POST['key']."',person='".$_POST['person']."',comments='".$_POST['remarks_rec']."',is_doc_needed='".$_POST['is_doc_needed']."',updated=now() where id='".$_POST['id']."'";
    if (mysqli_query($conn, $res)) {
    foreach ($do_edit as $key=> $value) 
    {
      foreach ($edit as  $key2=>  $value1) 
      {
        if ($value === $value1) {
          unset($edit[$key2]);
          unset($do_edit[$key]);
      }
     }
      
    }
    if($res_edit){
     echo "Data updated  Successfully."; 
    }
    
    //Insert this
    //print_r($edit);
    // Delete this
    //print_r($do_edit);

  foreach ($do_edit as $key=> $value){
    echo "update tbl_ref_doc set updated=now() ,is_deleted='1' where row_id='".$_POST['id']."' and  ref_doc='$value' ";
   $res_edit= $conn->query("update tbl_ref_doc set updated=now() ,is_deleted='1' where row_id='".$_POST['id']."' and  ref_doc='$value' ");
   
  }
 
 foreach ($edit as  $key2=>  $value1) {
    //echo "insert into tbl_ref_doc set row_id='".$_POST['id']."',ref_doc='$value1',created=now(),updated=now()";
    $qry= $conn->query("insert into tbl_ref_doc set row_id='".$_POST['id']."',ref_doc='$value1',created=now(),updated=now()");
    
    
  }
   if ($qry){
      echo "Data Added Successfully.";
      
    }

   }

  ?>