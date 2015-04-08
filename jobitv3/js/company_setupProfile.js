$(document).ready(function(){


	$("#submitBtn").mouseover(function(){
		$("#submitBtn").css("background-color", "rgba(255,82,0, 0.8)");
		$("#submitBtn").css("border-color", "rgba(255,82,0, 0.8)");
	});

	$("#submitBtn").mouseout(function(){
		$("#submitBtn").css("background-color", "rgba(255,82,0, 1)");
		$("#submitBtn").css("border-color", "rgba(255,82,0, 1)");
	});

});