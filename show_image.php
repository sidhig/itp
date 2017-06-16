 <?

  //error_reporting(0);
 include 'connect.php';
 print_r($_POST);

              $sql_img="SELECT * FROM `tbl_form_image` WHERE row_id='".$_POST['row_id']."' and ref_doc_id='".$_POST['id']."'";
              $res_img=mysqli_query($conn,$sql_img);
               $row=mysqli_fetch_array($res_img,MYSQLI_NUM);
               print_r($row);
               ?>