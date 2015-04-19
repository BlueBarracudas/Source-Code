<?php

    session_start();

    include '/MVC/controller.php';

    loadAll();

    if(isset($_SESSION["account_id"]))
    {
        $ap = getLoggedInApplicant($_SESSION["account_id"]);

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
<link rel="stylesheet" href="css/emptymessage.css">    
<link rel="stylesheet" href="css/style.css">
<!-- common css end  -->


<!-- specific css start -->
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/applicantViewListOfAppointments.css">   
<!-- specific css end-->

<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>
<script src="js/companyViewListOfAppointments.js"></script>
<!-- important initialization js files end -->


 
</head>
<body>

<link rel="stylesheet" href="css/jobitmenu.css">
    <?php include 'headers/header-company.php'; ?>
    <script src="js/companyAppointmentsActive.js"></script>


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
        <div class="panel panel-default" id="appointment1">
                <div class="panel-heading">
                    <h3 class="panel-title">Applicant name here</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
                            <label class="col-md-4">Position: </label> <label class="col-md-8 output-label">Position here</label>
                            <label class="col-md-4">Date and Time: </label> <label class="col-md-8 output-label">Date and time here</label>
                        </div>
                        <div class="col-md-6 resultButtonCol button-row">
                            <div class="col-md-6">
                                <input type="button" class="btn btn-default btn-fill " id="reject1" name="reject1" value="Reject" onclick="deleteDiv(this)"/>
                            </div>
                            <div class="col-md-6">
                                <input type="button" class="btn btn-success btn-fill" id="reschedule1" name="reschedule1" value="Reschedule" data-toggle="modal" data-target="#reschedule-popup"/>
                            </div>

                            <div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

                            <div class="col-md-12">
                                <input type="button" class="btn btn-default btn-fill " id="viewAppointment1" name="viewAppointment1" value="View Appointment" data-toggle="modal" data-target="#details-popup"/>
                            </div>
                            

                        </div>
                    </div>
                </div>

            </div> <!--  end of <div class="panel panel-default"> -->

            <div class="panel panel-default" id="appointment2">
                <div class="panel-heading">
                    <h3 class="panel-title">Applicant name here</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
                            <label class="col-md-4">Position: </label> <label class="col-md-8 output-label">Position here</label>
                            <label class="col-md-4">Date and Time: </label> <label class="col-md-8 output-label">Date and time here</label>
                        </div>
                        <div class="col-md-6 resultButtonCol button-row">
                            <div class="col-md-6">
                                <input type="button" class="btn btn-default btn-fill " id="reject2" name="reject2" value="Reject" onclick="deleteDiv(this)"/>
                            </div>
                            <div class="col-md-6">
                                <input type="button" class="btn btn-success btn-fill" id="reschedule2" name="reschedule2" value="Reschedule" data-toggle="modal" data-target="#reschedule-popup"/>
                            </div>

                            <div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

                            <div class="col-md-12">
                                <input type="button" class="btn btn-default btn-fill " id="viewAppointment2" name="viewAppointment2" value="View Appointment" data-toggle="modal" data-target="#details-popup"/>
                            </div>
                            

                        </div>
                    </div>
                </div>

            </div> <!--  end of <div class="panel panel-default"> -->



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
    <div id="details-popup" class="modal fade" role="dialog">
        <div class="modal-dialog" id="details-container">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" id="details-popup-header">Appointment Details</h4>
                </div>
                <!--Body-->
                <div class="model-body">
                    <!--Company Name-->
                    <div class="row">
                        <div class="col-md-3">
                            <label>Applicant Name:</label>
                        </div>
                        <div class="col-md-8">
                            <p>{{applicant.Name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Applicant Email:</label>
                        </div>
                        <div class="col-md-8">
                            <p>{{applicant.email}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Applicant Phone Number:</label>
                        </div>
                        <div class="col-md-8">
                            <p>{{applicant.cp#}}</p>
                        </div>
                    </div>
                    <!--Date-->
                    <div class="row">
                        <div class="col-md-3">
                            <label>Date:</label>
                        </div>
                        <div class="col-md-8">
                            <p>{{appointment.Date}}</p>
                        </div>
                    </div>
                    <!--Time-->
                    <div class="row">
                        <div class="col-md-3">
                            <label>Time:</label>
                        </div>
                        <div class="col-md-8">
                            <p>{{appointment.times}}</p>
                        </div>
                    </div>
                    <!--Message-->
                    <div class="row">
                        <div class="col-md-3">
                            <label for="detail-msg">Message:</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" disabled cols="20" id="resched-msg">{{Reschedule.Msg}}</textarea>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <!--Buttons-->
                    <div class="row">
                        <div class="col-md-12 btn-row">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Back </button>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
        
        
        
            
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
<!-- js end -->

</html>