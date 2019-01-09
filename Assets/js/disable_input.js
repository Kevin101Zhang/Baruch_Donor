let disableprefix = $('#pc_id'); 
$("#prefix").on(
"input propertychange",
event => disableprefix.prop(
'disabled',
event.currentTarget.value !== ""));

let disablefn = $('#pc_id'); 
$("#first_name").on(
"input propertychange",
event => disablefn.prop(
'disabled',
event.currentTarget.value !== ""));

let disableln = $('#pc_id'); 
$("#last_name").on(
"input propertychange",
event => disableln.prop(
'disabled',
event.currentTarget.value !== ""));

let disablesuffix = $('#pc_id'); 
$("#suffix").on(
"input propertychange",
event => disablesuffix.prop(
'disabled',
event.currentTarget.value !== ""));

let disableinput2 = $('.block'); 
$("#pc_id").on(
"input propertychange",
event => disableinput2.prop(
'disabled',
event.currentTarget.value !== ""));
