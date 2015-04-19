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
<!-- specific css end-->

<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->


 
</head>
<body>

<link rel="stylesheet" href="css/jobitmenu.css">
    <script src="js/jobitmenuCompany.js"></script>
    <script src="js/companyJobListingActive.js"></script>
   

<div class="container mainContainer">

    <div class="row containerRow">
                <div class="col-md-offset-1 col-md-10 containerCol">
                    <div class="panel panel-default profile-panel">

                    
                        <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Job Listings</h3>
                                        <hr>
                                    </div>

                    <?php
                        session_start();
                        include 'mvc/model.php';
                            $connect= new DBConnection();
			                $connect = $connect->getInstance();

                         $company_id = $_SESSION['company_id'];
                         $joblistresult = mysqli_query($connect, "SELECT * FROM `jobit`.`joblisting` WHERE company_id = '$company_id';");

                       
                        while($row = mysqli_fetch_assoc($joblistresult))
                        {
                     ?>

    <div class="row" id="listContainer">

        <div class=" col-md-12">
          <div class="panel panel-default" id="listing1">
		        <div class="panel-heading">
		            <h3 class="panel-title"><?php echo $row['position']?></h3>
		        </div>

		        <div class="panel-body">
		            <div class="row">
		            	<div class="col-md-6">
		            		<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
                            <div class="row"><label class="col-md-5">College Course Required: </label> <label class="col-md-6 output-label"><?php echo $row['course']?></label></div>
                            
                                 <div class="row"><label class="col-md-5">Total Slots: </label> <label class="col-md-6 output-label"><?php echo $row['slots_available']?></label></div>
                            
                                 <div class="row"><label class="col-md-5">Available Slots: </label> <label class="col-md-6 output-label"><?php echo $row['slots_available'] - $row['slots_taken']?></label></div>
                            
		            		
		            	</div>
		            	<div class="col-md-6 resultButtonCol button-row">
		            		<div class="col-md-6">
		            			<input type="button" class="btn btn-default btn-fill " id="delete1" name="delete1" onclick="deleteDiv(this, <?PHP echo $row['job_id']; ?>)" value="Delete"/>
		            		</div>
		            		<div class="col-md-6">
		            			<input type="button" class="btn btn-success btn-fill " id="edit1" name="edit1" value="Edit"  data-toggle="modal" data-target="#edit-popup"/>
		            		</div>

		            		<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

		            		<div class="col-md-12">
		            			<input type="button" class="btn btn-default btn-fill" id="view1" name="view1" value="View" data-toggle="modal" data-target="#viewJobListingModal"/>
		            		</div>
		            		

		            	</div>
		            </div>
		        </div>

			</div> <!--  end of <div class="panel panel-default"> -->

                <?PHP
                        
                    }
                        $connect->close();
                ?>
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

</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
<script src="js/companyViewJobListings.js"></script>    
<!-- js end -->

</html>