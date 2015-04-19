
<?php
    session_start();
    include '../mvc/controller.php';

    $_SESSION['company_id'] = 1;

      $position = $course = $location = $day = $jobtitle = $cert= "";
      $hours = $slots = "";

      $isErr = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(!(empty($_POST["position"]))) {
           $position = test_input($_POST["position"]);
        }

       if(!(empty($_POST["collegeCourseInput"]))){
			    if(strcmp($_POST['collegeCourseInput'],"Other") == 0)
                {
                    
                    $course = test_input($_POST["othercourse"]);
                }
                else
                {
                    $course= test_input($_POST["collegeCourseInput"]);
                }
                
				if (!preg_match("/^[a-zA-Z0-9-,.() ]*$/", $course)) {
       				$couErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       				$isErr = true;echo "collegeCourseInput".$course;
     			}
			}
            if(!(empty($_POST["location"]))) {
                $location = test_input($_POST["location"]);
            }
            if(!(empty($_POST["hours"]))) {
                $hours = test_input($_POST["hours"]);
            } 
            if(!(empty($_POST["monday"])))
            {
                $day = "1";
            }
            if(!(empty($_POST["tuesday"])))
            {
                $day = $day.",2";
            }
            if(!(empty($_POST["wednesday"])))
            {
                $day = $day.",3";
            }
            if(!(empty($_POST["thursday"])))
            {
                $day = $day.",4";
            } 
            if(!(empty($_POST["friday"])))
            {
                $day = $day.",5";
            }
            if(!(empty($_POST["saturday"])))
            {
                $day = $day.",6";
            }
            if(!(empty($_POST["sunday"])))
            {
                $day = $day.",7";
            }
               
            if(isset($_POST['jobtitle'])){
                $cnt = 0;
				foreach($_POST["jobtitle"] as $key => $temp_we)
				{
					if($cnt == 0)
						$jobtitle = test_input($temp_we);
					else
						$jobtitle .= ", ". test_input($temp_we);

					if (!preg_match("/^[a-zA-Z0-9,. ]*$/", $jobtitle)) {
       					$weErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       					$isErr = true;echo "jobtitle";
     				}

     				$cnt++;
     			}
        }
        if(isset($_POST['certification'])){
			
				$cnt = 0;

				foreach($_POST["certification"] as $key => $temp_cert)
				{
					if($cnt == 0)
						$certExams = test_input($temp_cert);
					else
						$certExams .= ", ". test_input($temp_cert);

					if (!preg_match("/^[a-zA-Z0-9-,.() ]*$/", $certExams)) {
       					$ceErr = "Only letters, numbers, white spaces, and commas, periods are allowed"; 
       					$isErr = true; echo "certification".$certExams;
     				}

     				$cnt++;
                }
			}
               
            if(!(empty($_POST["totalSlots"]))) {
                $slots = test_input($_POST["totalSlots"]);
            }
            
        if($isErr == false){
            $pdf = $_SESSION['company_id']."pdf";
                
            createJobListing($_SESSION['company_id'],$position, $location, $course, $hours, $day, $jobtitle, $cert, $pdf, $slots);
            header('Location: ../companyViewJobListings.php');
        }

        if($isErr == true) 
            $reply = "Oops!";

    }

    ?>