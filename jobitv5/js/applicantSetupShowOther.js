function otherCollege(input){
	var x = input.value;
	var y = document.getElementById("othercollegeinput");
	if (x == "Other"){
		y.style.display = "block";
	}
	else {
		document.getElementById("othercollege").value = "";
		y.style.display ="none";
	}
}

function otherCourse(input){
	var x = input.value;
	var y = document.getElementById("othercourseinput");
	if (x == "Other"){
		y.style.display = "block";
	}
	else {
		document.getElementById("othercourse").value = "";
		y.style.display ="none";
	}
}

function otherCert(input){
	var x = input.value;
	var div = input.parentNode;
	var y = document.getElementById("otherCertification");
	var child, child2;
	if (x == "Other"){ //get and display child
		for (i = 0; i<div.childNodes.length; i++){
			child = div.childNodes[i];
			if (child.id == "otherCertification")
				child.style.display = "block";
		}
	}
	else {
		for (i = 0; i<div.childNodes.length; i++){
			child = div.childNodes[i];
			if (child.id == "otherCertification"){
				child.style.display = "none";
			}
		}
	}
}