if ( window.addEventListener ) {  
	  	var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];  
	  	window.addEventListener("keydown", function(e) {  
	    if ( e.keyCode == konami[state] ) state++;  
	    else state = 0;  
	    if ( state == 10 ) {
	    	//var div = document.getElementById('loginHeader');
	    	//div.innerHTML += ' as Admin';
            window.location="admin_sign_in.php";
	    } 
	    }, true);  
	} 