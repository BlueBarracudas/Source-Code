<?php

    session_start();

    include '/MVC/controller.php';

    loadAll();

    if(isset($_SESSION["account_id"]))
    {
        $ap = getLoggedInAccount($_SESSION["account_id"]);
        $company = getCompanyById($_SESSION["account_id"]);

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

<script>

    function viewPopup(anid, appid){
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            document.getElementById("forPopup").innerHTML = xmlhttp.responseText;
                    }
                }

                xmlhttp.open("GET", "viewAppointmentPopup.php?&q="+anid+"&aid="+appid, true);
                xmlhttp.send();
            }

</script>


 
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
       <?php loadAppointmentsWithApplicants($company->get_companyid()); ?>

        <!--  end of <div class="panel panel-default"> -->

                                </div>
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
    <div id="forPopup" class="modal fade" role="dialog">
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