var colleges = [ "University of the Philippines Diliman", "De La Salle University Manila", "Ateneo de Manila University"];
var highschools = [ "De La Salle Zobel", "La Salle Greenhills ", "Grace Christian High School", "Xavier School", "Imaculate Conception Academy"];
var Courses = [ "Computer Science", "Information Technology", "Communication Technology"];
var certifications = [ "CCNA", "CCNP", "CCIE"];
var numOfSkills = 1;
var numOfJobTitles = 1;
var numOfCertifications = 1;    

// $( ".classcollege" ).autocomplete({
//   source: function( request, response ) {
//           var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//           response( $.grep( colleges, function( item ){
//               return matcher.test( item );
//           }) );
//       }
// });



// $( ".classhschool" ).autocomplete({
//   source: function( request, response ) {
//           var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//           response( $.grep( highschools, function( item ){
//               return matcher.test( item );
//           }) );
//       }
// });


// $( "#idcourse" ).autocomplete({
//   source: function( request, response ) {
//           var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//           response( $.grep( Courses, function( item ){
//               return matcher.test( item );
//           }) );
//       }
// });


// $( ".classcert" ).autocomplete({
//   source: function( request, response ) {
//           var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//           response( $.grep(certifications, function( item ){
//               return matcher.test( item );
//           }) );
//       }
// });



// $( "#skilladd" ).click(function(){
//         var br = document.createElement('br');
//      var br2 = document.getElementById("skilllist");
//     br2.appendChild(br);
//     var newfield = document.createElement("input");
//     newfield.setAttribute("class","form-control input-sm");
//     newfield.setAttribute("type","text");
//     newfield.setAttribute("name","skills[]");
//     var newerrormsg = document.createElement("div");
//     numOfSkills++;
//     newerrormsg.setAttribute("class","error_container");
//     newerrormsg.setAttribute("id","skill_errorMessageContainer"+numOfSkills);
//     var newerrorlbl = document.createElement("label");
//     newerrorlbl.setAttribute("class","error_message");
//     newerrorlbl.setAttribute("id","skill_errorMessage"+numOfSkills);
//     newerrorlbl.setAttribute("name","skill_errorMessage"+numOfSkills);
//     newerrorlbl.innerHTML = "<?php echo $skErr; ?>";
//     newerrormsg.appendChild(newerrorlbl);
//     $("#skilllist").append(newfield);
//     $("#skilllist").append(newerrormsg);
//     var remove = document.createElement("button");
//     remove.setAttribute("class","btn btn-link");
//     remove.innerHTML = "Remove Skill"
//     remove.onclick = function() {
//         $(this).prev().remove();
//         $(this).prev().remove();
//         $(this).prev().remove();
//         $(this).remove();
//         numOfSkills--;
//     }
//     $("#skilllist").append(remove);
// });




//Replace the "Hi!" string with the description

$('[data-toggle="tooltip"]').attr('title','Check if you have passed Experts Academy\'s Skill Assesment Test for this Certification');    
$('[data-toggle="tooltip"]').tooltip({
        placement : 'right'
});






