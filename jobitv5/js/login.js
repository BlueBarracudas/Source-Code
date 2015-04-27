if ( window.addEventListener ) {  
	  	var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];  
	  	window.addEventListener("keydown", function(e) {  
	    if ( e.keyCode == konami[state] ) state++;  
	    else state = 0;  
	    if ( state == 10 ) {
	    	var div = document.getElementById('loginHeader');
	    	signInAdmin();
	    } 
	    }, true);  
	} 

function signInAdmin()
{
	alert("Admin login");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function (){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("loginHeader").innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open("GET", "logic/logic_login.php?q=" + 1, true);
        xmlhttp.send();
}

$(document).ready(function(){

	$("#loginBtn").mouseover(function(){
		$("#loginBtn").css("background-color", "rgba(255,82,0, 0.8)");
		$("#loginBtn").css("border-color", "rgba(255,82,0, 0.8)");
	});

	$("#loginBtn").mouseout(function(){
		$("#loginBtn").css("background-color", "rgba(255,82,0, 1)");
		$("#loginBtn").css("border-color", "rgba(255,82,0, 1)");
	});

});