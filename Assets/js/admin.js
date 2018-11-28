$(document).ready(function(){

console.log("Hello");
// My goal is to append the "Input value into the page"

$("#submit").on("click", function(){
    var LastName =  $(".last_name").val()
    var FirstName =  $(".first_name").val()
    var Suffix =  $(".suffix").val()
    var Prefix =  $(".prefix").val()

    var Everything = Prefix + ' ' + FirstName + ' ' + LastName + ' ' + Suffix;
    console.log(Everything);
    //doc1 to background.html
    $("#name_here").html(Everything);

});

});