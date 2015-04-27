<?php

    session_start();

    include '/MVC/controller.php';

    loadAll();

    if(isset($_SESSION["account_id"]))
    {


        $ap = getLoggedInApplicant($_SESSION["account_id"]);
        $id = $ap->get_appid();

            $applicants = array();
            $jobfor = array();
            $date = array();
            $status = array();
            $time = array();
            $aid = array();
            $cid = array();
            $message = array();
            $connect= new DBConnection();
            $connect = $connect->getInstance();

            $sql = "SELECT * from applicant an, 
            application al, 
            joblisting as jl 
            where al.applicant_id = ".$id."
            and an.applicant_id = ".$id."
            and jl.job_id = al.job_id 
            and al.company_id = jl.company_id
            and al.is_interviewed = 0 and for_interview != -1 and decision = 0";    

            $result = $connect->query($sql);

            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc())
                {
                    $temp_app = new applicant();
                    $temp_app->set_appid($row['applicant_id']);
                    $temp_app->set_accid($row['account_id']);
                    $temp_app->set_firstname($row['first_name']);
                    $temp_app->set_middlename($row['middle_name']);
                    $temp_app->set_lastname($row['last_name']);
                    $temp_app->set_sex($row['sex']);
                    $temp_app->set_address($row['address']);
                    $temp_app->set_birthday($row['birthday']);
                    $temp_app->set_maritalstatus($row['marital_status']);
                    $temp_app->set_contactno($row['contact_number']);
                    $temp_app->set_notiftype($row['notification_type']);
                    $temp_app->set_city($row['city']);
                    $temp_app->set_profile(getApplicantProfileById($row['applicant_id']));
                    

                    $jobfor[] = $row['title'];
                    $date[] = $row['date'];
                    $status[] = $row['for_interview'];
                    $time[] = $row['time'];
                    $aid[] = $row['application_id'];
                    $cid[] = $row['company_id'];
                    $message[] = $row['decision_message'];
                    $applicants[count($applicants)] = $temp_app;
                }
            }


    }

    else
    {
        echo "You are not logged in.";
        header('Refresh: 3; URL=main_login.php');
        exit;   
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<link rel="shortcut icon" href="">

<!-- bootstrap css start  -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- bootstrap css end  -->



<!-- common css start  -->
<link rel="stylesheet" href="css/button.css">
<link rel="stylesheet" href="css/panels.css">
<link rel="stylesheet" href="css/errormessage.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/jobitmenu.css">
<!-- common css end  -->


<!-- specific css start -->
<link rel="stylesheet" href="css/applicantViewListOfAppointments.css">
<link rel="stylesheet" href="css/search.css">
<!-- specific css end-->

<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->
    
    <script>

            function acceptReject(index, aonid, hr){
               alert("Successfully Accepted, Refresh page to see changes.");

                var i = index+"_appointment";
                 $( "#"+i).remove();

                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            var i = index+"_appointment";
                            $( "#"+i ).remove();

                    }
                }

                xmlhttp.open("GET", "acceptReject.php?&hr="+hr+"&aonid="+aonid, true);
                xmlhttp.send();
            }

    </script>

 
</head>
<body>

<?php include 'headers/header-applicant.php'; ?>
<script src="js/applicantAppointmentsActive.js"></script>


<div class="container mainContainer">

    <div class="row containerRow">
                <div class="col-md-offset-1 col-md-10 containerCol">
                    <div class="panel panel-default profile-panel">

                    
                        <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Appointments</h3>
                                        <hr>
                                    </div>

                                </div>


                                <div class="row" id="listContainer">

                                    <div class=" col-md-12">

                                        <?php

            for($i = 0; $i<count($applicants); $i++)
            {
                $temp = $applicants[$i];
                $companyName = getCompanyNameById($cid[$i]);

                if($status[$i] == 0 || $status[$i] == null)
                    $decision = "Waiting for your acceptance";
                else if($status[$i] == 1)
                    $decision = "For interview";

            echo "<div class=\"panel panel-default\" id=\"".$i."_appointment\">
                        <div class=\"panel-heading\">
                            <h3 class=\"panel-title\">".$companyName."</h3>
                        </div>

                        <div class=\"panel-body\">
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                            <div class=\"form-group form-group-spacer\"><label class=\"col-md-12\">space</label></div> <!-- used as spacing -->
                             <label class=\"col-md-4\">Status: </label> <label class=\"col-md-8 output-label\">".$decision."</label>
                            <label class=\"col-md-4\">Position: </label> <label class=\"col-md-8 output-label\">".$jobfor[$i]."</label>
                            <label class=\"col-md-4\">Date and Time: </label> <label class=\"col-md-8 output-label\">Date: ".$date[$i]." Time: ".$time[$i]."</label>
                        </div>
                        <div class=\"col-md-6 resultButtonCol button-row\">
                            <div class=\"col-md-6\">";
                            if($status[$i] == 0)
                                echo "<input type=\"button\" class=\"btn btn-default btn-fill \" id=\"reject2\" onclick =\"acceptReject(".$i.", ".$aid[$i].", -1);\" name=\"reject2\" value=\"Reject\"/>";
                            else
                                 echo "<input type=\"button\" class=\"btn btn-default btn-fill \" id=\"reject2\" onclick =\"acceptReject(".$i.", ".$aid[$i].", -1);\" name=\"reject2\" value=\"Cancel\"/>";
                            echo "</div>
                            <div class=\"col-md-6\">
                                <input type=\"button\" class=\"btn btn-success btn-fill\" id=\"viewAppointment2\" name=\"viewAppointment2\" value=\"View Appointment\" data-toggle=\"modal\" data-target=\"#".$i."_details-popup\"/>
                            </div>

                            <div class=\"form-group form-group-spacer\"><label class=\"col-md-12\">space</label></div> <!-- used as spacing -->

                            <div class=\"col-md-12\">";
                            if($status[$i] == 0)
                                echo"<input type=\"button\" class=\"btn btn-default btn-fill\" id=\"accept2\" name=\"accept2\" value=\"Accept\" onclick =\"acceptReject(".$i.", ".$aid[$i].", 1);\" />";
                            else
                                echo"<input type=\"button\" class=\"btn btn-default btn-fill \" id=\"reject2\" value=\"Reschedule\" data-toggle=\"modal\" data-target=\"#reschedule-popup\"/>";
                            echo"</div>
                            

                        </div>
                    </div>
                </div>

            </div>";
            }
        

                                        ?>
 <!--  end of <div class="panel panel-default"> -->

                 <!--  end of <div class="panel panel-default"> -->


                                </div>



            <div class="col-md-12">         
            <hr id="bottomOfResults">
            </div>

  <!--          <nav class="center">
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav> -->



                                </div>

                            

                                




                           
                        </div>

                    </div> <!--  end of <div class="panel panel-default"> -->
                </div>
     </div>
</div>  <!-- end of <div class="container mainContainer"> -->


    <!--Appointment Details Pop-up-->
<?php
    
    for($i = 0; $i<count($applicants); $i++)
    {
        $companyName = getCompanyNameById($cid[$i]);


    echo "<div id=\"".$i."_details-popup\" class=\"modal fade\" role=\"dialog\">
        <div class=\"modal-dialog\" id=\"details-container\">
            <div class=\"modal-content\">
                <!--Header-->
                <div class=\"modal-header panel-heading\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                    <h3 class=\"modal-title\" id=\"details-popup-header\">Appointment Details</h4>
                </div>
                <!--Body-->
                <div class=\"model-body\">
                    <!--Company Name-->
                    <div class=\"row\">
                        <div class=\"col-md-2\">
                            <label>Company:</label>
                        </div>
                        <div class=\"col-md-10\">
                            <p> &nbsp;&nbsp;".$companyName."</p>
                        </div>
                    </div>
                    <!--Position-->
                     <div class=\"row\">
                        <div class=\"col-md-2\">
                            <label>Position:</label>
                        </div>
                        <div class=\"col-md-10\">
                            <p>".$jobfor[$i]."</p>
                        </div>
                    </div>
                    <!--Date-->
                    <div class=\"row\">
                        <div class=\"col-md-2\">
                            <label>Date:</label>
                        </div>
                        <div class=\"col-md-10\">
                            <p>".$date[$i]."</p>
                        </div>
                    </div>
                    <!--Time-->
                    <div class=\"row\">
                        <div class=\"col-md-2\">
                            <label>Time:</label>
                        </div>
                        <div class=\"col-md-10\">
                            <p>".$time[$i]."</p>
                        </div>
                    </div>
                    <!--Message-->
                    <div class=\"row\">
                        <div class=\"col-md-2\">
                            <label for=\"detail-msg\">Message:</label>
                        </div>
                        <div class=\"col-md-8\">
                            <textarea class=\"form-control\" disabled cols=\"20\" id=\"resched-msg\">".$message[$i]."</textarea>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class=\"modal-footer\">
                    <!--Buttons-->
                    <div class=\"row\">
                        <div class=\"col-md-12 btn-row\">
                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Back </button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>";
    
    }

  ?>
    
    <!--Reschedule Pop-up-->
    <div id="reschedule-popup" class="modal fade">
        <div class="modal-dialog" id="reschedule-container">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" id="details-popup-header">Reschedule</h4>
                </div>
                <!--Body-->
                <form class="form-horizontal" role="form" id="reschedule-form">
                    <div class="modal-body">
                            <!--Reschedule Date group-->
                            <div class="form-group">
                                <label class="control-label col-md-2" for="date">Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="reschedule-date" placeholder="Enter date">
                                     <span class="error_message error_container">Error Message</span>
                                </div>
                            </div>
                            <!--Reschedule Time group-->
                            <div class="form-group">
                                <label class="control-label col-md-2" for="time">Time:</label>
                                <div class="col-md-10">
                                    <input type="time" class="form-control" id="reschedule-date" placeholder="Enter time">
                                     <span class="error_message error_container">Error Message</span>
                                </div>
                            </div>            
                            <!--Reschedule Message Row-->
                            <div class="form-group">
                               <label class="control-label col-md-2" for="msg">Message:</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="reschedule-msg" cols="50" placeholder="Enter Message"></textarea>
                                    <span class="error_message error_container">Error Message</span>
                                </div>
                            </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col-md-12 btn-row">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
    
    
    
    

</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
<script src="js/applicantViewListOfAppointments.js"></script>    
<!-- js end -->

</html>