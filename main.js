console.log("Hello");
// My goal is to append the "Input value into the page"
$("#submit").on("click", function(){
  var LastName =  $("#lastName").val()
  var FirstName =  $("#firstName").val()
  var Suffix =  $("#suffix").val()
  var Prefix =  $("#prefix").val()

  var Ndiv ="<div>"; 
  Ndiv.append( Prefix,FirstName, LastName, Suffix);

    $(".test").html(Ndiv);

});


