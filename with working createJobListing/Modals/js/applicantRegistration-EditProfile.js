
$(document).ready(function(){
	
		 $('[data-toggle="tooltip"]').tooltip()
		var options = '';
		for(var i=1; i<=31; i++){
				if(i !=1){
		options +='<option value='+i+'>'+i+'</option>';
		}else{
		options +='<option value='+i+' selected>'+i+'</option>';
		}
		}
    $('#DOBday').html(options);
	
		options = '';
		for(var i=1940; i<=1996; i++){
			if(i !=1940){
		options +='<option value='+i+'>'+i+'</option>';
		}else{
		options +='<option value='+i+' selected>'+i+'</option>';
		}
		
		}
    $('#DOByear').html(options);
	
//	console.log(  $('#DOByear').val());
	
$('#DOBmonth').change(function() {
	days=31;
    var options = "";
    if($(this).val()%2 == '1') {
      days=31;
    }
    else if ($(this).val() == '2'){
       days=28
    }else{
		days=30
	}
	for(var i=1; i<=days; i++){

         if(i == 1){
            options +='<option value='+i+' selected>'+i+'</option>';
        }


		options +='<option value='+i+'>'+i+'</option>';
	}
    $('#DOBday').html(options);
});

$('#nextButton').click(function(){
	$('#container1').css("display", "none");
	$('#container2').css("display", "inline-block");
});

});
