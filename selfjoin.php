<?php
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin:*');

require_once "connection.php";

$request_method= $_SERVER["REQUEST_METHOD"];
/* This is for displaying all the data */
if($request_method == "GET"){

          $sql ="SELECT E1.employee_name ,E2.employee_name FROM employee As E1  JOIN employee As E2 ON E1.employee_id =E2.manager_id";
          $result = mysqli_query($conn,$sql) or die("Sql query failed.");

          if(mysqli_num_rows($result)>0){
              $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
              echo json_encode($output);
          }
          else{
              echo json_encode(array('message' => 'No record found.','status' => false));

          }
}
?>