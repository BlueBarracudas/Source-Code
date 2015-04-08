if ( window.addEventListener ) {  
	  	var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];  
	  	window.addEventListener("keydown", function(e) {  
	    if ( e.keyCode == konami[state] ) state++;  
	    else state = 0;  
	    if ( state == 10 ) {
	    	var div = document.getElementById('loginHeader');
	    	div.innerHTML += ' as Admin';
	    } 
	    }, true);  
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