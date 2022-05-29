<?php

include('database_connection.php');
session_start();
$id=$_SESSION['id'];

$column = array('Emri i lendes','Emri i detyres','Deadline', 'Me shume');

$query ="SELECT Lendet.name_l, tasks.emri_t, tasks.deadline_t, tasks.pershkrimi_t from lendet
INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $id
AND tasks_done.id_s=$id";

if(isset($_POST['filter_semester'], $_POST['filter_lenda']) && $_POST['filter_semester'] != '' && $_POST['filter_lenda'] != '')
{
   $semestri=$_POST['filter_semester'];
   $lenda=$_POST['filter_lenda'];
 $query .= 'AND lendet.semestri_l = $semestri AND lendet.name_l = $lenda';
}



$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement->execute();

$result = $statement->fetchAll();



$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['name_l'];
 $sub_array[] = $row['emri_t'];
 $sub_array[] = $row['deadline_t'];
 $sub_array[] = $row['pershkrimi_t'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT lendet.name_l, tasks.emri_t, tasks.deadline_t, tasks.pershkrimi_t from lendet
 INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
 INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
 INNER JOIN klaset ON klaset.id_l=lendet.id_l WHERE klaset.id_s = $id
 AND tasks_done.id_s=$id";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($connect),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);

echo json_encode($output);

?>
