$(document).ready(function(){

console.log("Hello");
// My goal is to append the "Input value into the page"

$("#submit").on("click", function(){
    event.preventDefault();
    var LastName =  $("#lastName").val()
    var FirstName =  $("#firstName").val()
    var Suffix =  $("#suffix").val()
    var Prefix =  $("#prefix").val()

    var Everything = Prefix + ' ' + FirstName + ' ' + LastName + ' ' + Suffix;
    $(".testing").html(Everything);
    // $(".testing").html('<div>'+ Prefix+FirstName+ LastName+ Suffix+'</div>');
});

// function admin_function(evt, funct) {
//     var i, tabcontent, tablinks;
//     tabcontent = document.getElementsByClassName("tabcontent");
//     for (i = 0; i < tabcontent.length; i++) {
//         tabcontent[i].style.display = "none";
//     }
//     tablinks = document.getElementsByClassName("tablinks");
//     for (i = 0; i < tablinks.length; i++) {
//         tablinks[i].className = tablinks[i].className.replace(" active", "");
//     }
//     document.getElementById(funct).style.display = "block";
//     evt.currentTarget.className += " active";
// }


});