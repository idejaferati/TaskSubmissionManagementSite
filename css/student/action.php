<?php

require '../dbconfig/config.php';
if(isset($_POST['action'])){
    $sql="Select lendet.name_l, tasks.emri_t, tasks_done.grade_d, tasks.pershkrimi_t, lendet.semestri_l from lendet
    INNER JOIN tasks ON lendet.id_l=tasks.lendaid_t
    INNER JOIN tasks_done ON tasks.id_t=tasks_done.id_t
    INNER JOIN klaset ON klaset.id_l=lendet.id_l where semestri_l is not null ";

     if(isset($_POST['semester'])){
header("Location:home_s.php");
         $semester=implode("','",$_POST['semester']);
         $sql .="AND semestri_l IN('".$semester."')";
     }
     if(isset($_POST['name_l'])){
        $semester=implode("','",$_POST['name_l']);
        $sql .="AND name_l IN('".$name_l."')";
    }

    $result=$conn->query($sql);
    $output='';

    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $output .='<div class="col-md-3 mb-2">
            <div class="card-deck">
                <div class="card border-secondary">
                    <img src="../photo/uni_logo.png" class="card-img-top">
                    
                    <div class="card-body">
                    <h6 class="text-light bg-info text-center rounded p-1">'.$row['name_l'].'</h6> 
                        <h4 class="card-title text-danger">Semestri: '.number_format($row['semestri_l']).'</h4>
                        <p>
                            Detyra: '.$row['emri_t'].'<br>
                            Nota: '.$row['grade_d'].'<br>
                            Pershkrimi: '.$row['pershkrimi_t'].'<br>               
                        </p>
                        <a href="#" class="btn btn-success btn-block">Me shume</a>

                     </div>
                </div>
            </div>
        </div>';
        }
    }
    else{
        $output="<h3>Asnje detyre nuk u gjet!</3>";
    }
    $output="<h3>Asnje detyre nuk u gjet!</3>";
    echo $output;
}
?>