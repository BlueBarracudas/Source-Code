$(document).ready(function(){

	$("#loginBtn").mouseover(function(){
		$("#loginBtn").css("background-color", "rgba(255,82,0, 0.8)");
		$("#loginBtn").css("border-color", "rgba(255,82,0, 0.8)");
	});

	$("#loginBtn").mouseout(function(){
		$("#loginBtn").css("background-color", "rgba(255,82,0, 1)");
		$("#loginBtn").css("border-color", "rgba(255,82,0, 1)");
	});


	$("#saveBtn").mouseover(function(){
		$("#saveBtn").css("background-color", "rgba(255,82,0, 0.8)");
		$("#saveBtn").css("border-color", "rgba(255,82,0, 0.8)");
	});

	$("#saveBtn").mouseout(function(){
		$("#saveBtn").css("background-color", "rgba(255,82,0, 1)");
		$("#saveBtn").css("border-color", "rgba(255,82,0, 1)");
	});

});