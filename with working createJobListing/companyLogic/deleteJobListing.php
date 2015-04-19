<?PHP
    include '../mvc/model.php';
    
    if($_POST['action'] == "delete") {

        $job_id = $_POST['job_id'];

        $connect= new DBConnection();
        $connect = $connect->getInstance();

                echo "whut";
                $del = "DELETE FROM `jobit`.`joblisting` WHERE `job_id` = '$job_id';";
                echo $del;

                if ($connect->query($del) !== TRUE) {
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
                      }

        $connect->close();
    }
?>