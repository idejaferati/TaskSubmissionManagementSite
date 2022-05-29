<?php

include('database_connection.php');
session_start();
$idstudent=$_SESSION['id'];

$semester = '';
$query = "SELECT DISTINCT lendet.semestri_l from lendet
INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $idstudent
 AND tasks_done.id_s=$idstudent";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $semester .= '<option value="'.$row['semestri_l'].'">'.$row['semestri_l'].'</option>';
}

$lenda = '';
$query = "SELECT DISTINCT lendet.name_l from lendet
INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $idstudent
 AND tasks_done.id_s=$idstudent";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
 $lenda .= '<option value="'.$row['name_l'].'">'.$row['name_l'].'</option>';
}

?>

<html>
 <head>
  <title>Custom Search in jQuery Datatables using PHP Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
 </head>
 <body>
  <div class="container box">
   <h3 align="center">Custom Search in jQuery Datatables using PHP Ajax</h3>
   <br />
   <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
     <div class="form-group">
      <select name="filter_semester" id="filter_semester" class="form-control" required>
       <option value="">Select semester</option>
       <?php echo $semester; ?>
      </select>
     </div>
     <div class="form-group">
      <select name="filter_lenda" id="filter_lenda" class="form-control" required>
       <option value="">Select lenden</option>
       <?php echo $lenda; ?>
      </select>
     </div>
     <div class="form-group" align="center">
      <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
     </div>
    </div>
    <div class="col-md-4"></div>
   </div>
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="20%">Emri i detyres</th>
       <th width="10%">Semestri</th>
       <th width="25%">Detyrat</th>
       <th width="25%">Detyrat</th>
      
      </tr>
     </thead>
    </table>
    <br />
    <br />
    <br />
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fill_datatable();
  
  function fill_datatable(filter_gender = '', filter_country = '')
  {
   var dataTable = $('#customer_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : false,
    "ajax" : {
     url:"fetch.php",
     type:"POST",
     data:{
      filter_gender:filter_semester, filter_country:filter_lenda
     }
    }
   });
  }
  
  $('#filter').click(function(){
   var filter_lenda = $('#filter_lenda').val();
   var filter_semester = $('#filter_semester').val();
   if(filter_lenda != '' && filter_country != '')
   {
    $('#customer_data').DataTable().destroy();
    fill_datatable(filter_lenda, filter_semester);
   }
   else
   {
    alert('Select Both filter option');
    $('#customer_data').DataTable().destroy();
    fill_datatable();
   }
  });
  
  
 });
 
</script>
