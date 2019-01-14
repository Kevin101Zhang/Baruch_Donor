// let disableprefix = $('#pc_id'); 
// $("#prefix").on(
// "input propertychange",
// event => disableprefix.prop(
// 'disabled',
// event.value !== ""));

// let disablefn = $('#pc_id'); 
// $("#first_name").on(
// "input propertychange",
// event => disablefn.prop(
// 'disabled',
// event.value !== ""));

// let disableln = $('#pc_id'); 
// $("#last_name").on(
// "input propertychange",
// event => disableln.prop(
// 'disabled',
// event.value !== ""));

// let disablesuffix = $('#pc_id'); 
// $("#suffix").on(
// "input propertychange",
// event => disablesuffix.prop(
// 'disabled',
// event.value !== ""));

// let disableinput2 = $('.block'); 
// $("#pc_id").on(
// "input propertychange",
// event => disableinput2.prop(
// 'disabled',
// event.value !== ""));


function disablefld() {
// var a = document.getElementById("prefix").value;
// var b = document.getElementById("first_name").value;
// var c = document.getElementById("last_name").value;
// // var d = document.getElementById("suffix").value;
var a = $('#prefix').value;
var b = $('#first_name').value;
var c = $('#last_name').value;
var d = $('#suffix').value;
if(a != "" || b != "" || c != "" || d != ""){
    document.getElementById("pc_id").disabled = true;
}
else{
    document.getElementById("pc_id").disabled = false;
}
}


           