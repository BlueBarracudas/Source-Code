<?php
  session_start();

  include 'MVC/controller.php';

loadAll();

if(isset($_SESSION["account_id"]))
  {
    
    $ap = getLoggedInApplicant($_SESSION["account_id"]);
    include 'logic_applicantsetup.php';

  }

  else
  {
    echo "You are not logged in.";
    header('Refresh: 3; URL=main_login.php'); 
  }

  

?>

<!DOCTYPE html>
<html>
	<head>
		<script src="js/jquery-2.1.1.js"></script>
		<title> Applicant Profile | Setup </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="Resources/jquery-ui-1.11.3.custom/jquery-ui.css">
		<script src="Resources/jquery-ui-1.11.3.custom/external/jquery/jquery.js"></script>
		<script src="Resources/jquery-ui-1.11.3.custom/jquery-ui.js"></script>
		<script>
		var xmlhttp;
			function loadXMLDoc(url, cfunc)
			{
				if(window.XMLHttpRequest)
				{
					xmlhttp = new XMLHttpRequest();
				}
				else
				{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}

				xmlhttp.open("POST", url, true);
				xmlhttp.send();
			}

			function updateProfile()
			{
				var skills = $('#skills')[0].value;
				var school = $('#school')[0].value;
				var college = $('#college')[0].value;
				var course = $('#course')[0].value;
				var certExams = $('#certExams')[0].value;	
				var workExp = $('#workExp')[0].value;
				

				loadXMLDoc("applicantSetupProfile.php", function()
				{
					if(xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						alert("Updated Profile Information! :>");
					}
				});
				
			}

		</script>

		<style>
		#body{
		padding-right: 10%;
		padding-left: 10%;
		}
		
		#hschooladd, #collegeadd, #courseadd, #skilladd{
		visibility: hidden;
		}

    #error{
      color:red;
    }
		</style>
		
		<script type="text/javascript">
		function performClick(elemId) {
		var elem = document.getElementById(elemId);
		if(elem && document.createEvent) {
		var evt = document.createEvent("MouseEvents");
		evt.initEvent("click", true, false);
		elem.dispatchEvent(evt);
		}
		}
		
</script>

	</head>
	
	<body>

<div class="container">
  <h2><img src="resources\ep1.png">JobIT</h2>
  <br>
   <div id ="body">
  <h3> Set-up your profile </h3>
  <p id="error"> <?php echo $reply ?> </p>
 
 <div id="body">
 
<br>

<form id = "edit-profile" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!-- form -->

<h4>Education:</h4>
<br>


  <div class="row">
   <div class="col-sm-3">High School: </div>
   <div class="col-sm-4">
            <div id="hschoollist">
                <input class="form-control input-sm classhschool" type="text" name="school">
            </div>
       <button type="button" class="btn btn-link" id="hschooladd">+add another High School.</button></div> 
 </div>
 <br>

  <div class="row">
  <div class="col-sm-3">College: </div>
    <div class="col-sm-4">
        <div id="collegelist">
            <input class="form-control input-sm classcollege" type="text" name="college">
        </div>
        <button type="button" class="btn btn-link" id="collegeadd">+add another College.</button>
      </div>
</div>

<br>

 <div class="row">
   <div class="col-sm-3">College Course: </div>
     <div class="col-sm-4">
         <div id="courselist">
         <input class="form-control input-sm classcourse" id ="idcourse" type="text" name="course">
         </div> 
                 <button type="button" class="btn btn-link" id="courseadd">+add another Course.</button>
     
     </div>
    
     
     </div>
 <br>
 <br>
  <div class="row">
   <div class="col-sm-3">Skills: </div>
     <div class="col-sm-4">
        <div id="skilllist">
            <input class="form-control input-sm" type="text" name="skills">
        </div>
        <button type="button" class="btn btn-link" id="skilladd">+add another Skill.</button>
      </div>
</div>
 <br>


 <h4>Work Experience</h4>
<br>
 <div class="row">
       
            <div class="col-sm-3">Job Title: </div>
            <div class="col-sm-4" id="titlelist">
                <input class="form-control input-sm" type="text" name="jobtitle">
            </div>
            <div class="col-sm-3">Years of Experience: </div>
            <div class="col-sm-2" id="yearslist">
                <input class="form-control input-sm" type="number" name="workExp">
            </div>
            <button type="button" class="btn btn-link" id="workadd">+add another Job Title.</button>
      
     </div>

  <br> 

    <div class="row">
  <div class="col-sm-3">Certification(s): </div> <div class="col-sm-4">
        <div id="certlist">
            <input class="form-control input-sm classcert" type="text" name="certExams">
        </div>    
        <button type="button" class="btn btn-link" id="certadd">+add another Cert.</button> </div>
  </div>
  
  
  <br> <br>
  
  
  
  <h4>Resume:</h4> 
  <a href="#" onclick="performClick('theFile');"></a>
<input type="file" id="theFile" />
 <br><br><br>
  <input type="submit" value = "Submit">  <!-- button -->
  <br>
 </div>

  
</div>
</div>

</form> <!-- form end -->

<script>
var colleges = [ "University of the Philippines Diliman", "De La Salle University Manila", "Ateneo de Manila University"];
var highschools = [ "De La Salle Zobel", "La Salle Greenhills ", "Grace Christian High School", "Xavier School", "Imaculate Conception Academy"];
var Courses = [ "Computer Science", "Information Technology", "Communication Technology"];
var certifications = [ "CCNA", "CCNP", "CCIE"];
$( ".classcollege" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( colleges, function( item ){
              return matcher.test( item );
          }) );
      }
});



$( ".classhschool" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( highschools, function( item ){
              return matcher.test( item );
          }) );
      }
});


$( "#idcourse" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( Courses, function( item ){
              return matcher.test( item );
          }) );
      }
});


$( ".classcert" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep(certifications, function( item ){
              return matcher.test( item );
          }) );
      }
});

$( "#certadd" ).click(function(){
        var br = document.createElement('br');
     var br2 = document.getElementById("certlist");
    br2.appendChild(br);
    var newfield = document.createElement("input");
    newfield.setAttribute("class","form-control input-sm classcert");
    newfield.setAttribute("type","text");
    newfield.setAttribute("name","certification");
    $("#certlist").append(newfield);
    $("#certlist .classcert").last().autocomplete({
            source: function( request, response ) {
                var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                response( $.grep(certifications, function( item ){
                    return matcher.test( item );
                }) );
            }
    });
});
    
$( "#hschooladd" ).click(function(){
        var br = document.createElement('br');
     var br2 = document.getElementById("hschoollist");
    br2.appendChild(br);
    var newfield = document.createElement("input");
    newfield.setAttribute("class","form-control input-sm classhschool");
    newfield.setAttribute("type","text");
    newfield.setAttribute("name","hschool");
    $("#hschoollist").append(newfield);
    $("#hschoollist .classhschool").last().autocomplete({
            source: function( request, response ) {
                var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                response( $.grep( highschools, function( item ){
                    return matcher.test( item );
                }) );
            }
    });
});
    
$( "#collegeadd" ).click(function(){
    var br = document.createElement('br');
     var br2 = document.getElementById("collegelist");
    br2.appendChild(br);
    var newfield = document.createElement("input");
    newfield.setAttribute("class","form-control input-sm classcollege");
    newfield.setAttribute("type","text");
    newfield.setAttribute("name","college");
    $("#collegelist").append(newfield);
    $("#collegelist .classcollege").last().autocomplete({
            source: function( request, response ) {
                var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                response( $.grep( colleges, function( item ){
                    return matcher.test( item );
                }) );
            }
    });
});
    

    $( "#courseadd" ).click(function(){
         var br = document.createElement('br');
     var br2 = document.getElementById("courselist");
        br2.appendChild(br);
    var newfield = document.createElement("input");
    newfield.setAttribute("class","form-control input-sm classcourse");
    newfield.setAttribute("type","text");
    newfield.setAttribute("name","course");
    $("#courselist").append(newfield);
    $("#courselist .classcourse").last().autocomplete({
            source: function( request, response ) {
                var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                response( $.grep( Courses, function( item ){
                    return matcher.test( item );
                }) );
            }
    });
});
    
    
$( "#skilladd" ).click(function(){
        var br = document.createElement('br');
     var br2 = document.getElementById("skilllist");
    br2.appendChild(br);
    var newfield = document.createElement("input");
    newfield.setAttribute("class","form-control input-sm");
    newfield.setAttribute("type","text");
    newfield.setAttribute("name","skill");
    $("#skilllist").append(newfield);        
});

$( "#workadd" ).click(function(){
        var br = document.createElement('br');
      var br2 = document.createElement('br');
    


    var workfield = document.createElement("input");
    workfield.setAttribute("class","form-control input-sm");
    workfield.setAttribute("type","text");
    workfield.setAttribute("name","title");
        $("#titlelist").append(br);
    $("#titlelist").append(workfield);
    
    var yearfield = document.createElement("input");
    yearfield.setAttribute("class","form-control input-sm");
    yearfield.setAttribute("type","number");
    yearfield.setAttribute("name","years");
     $("#yearslist").append(br2);
    $("#yearslist").append(yearfield);
});

</script>




</body>
</html>

	
<!--
	<body>

	<h3> Please input the required information:

	<form id = "edit-profile" method="POST" action="applicantSetupProfile.php">
			Skills <input type="text" name = "skills" placeholder ="Skills"/><br>
			School: <input type="text" name = "school" placeholder ="School"/><br>
			Course: <input type="text" name = "course" placeholder ="Course"/><br>
			Work Experience: <input type="text" name ="workExp" placeholder ="Indicate how many years"/><br>

		<input type="submit" value="Submit">
	</form>
	
	</body>
</html>