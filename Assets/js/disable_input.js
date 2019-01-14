
function disable_pc() {
    var a = document.getElementById("prefix").value;
    var b = document.getElementById("first_name").value;
    var c = document.getElementById("last_name").value;
    var d = document.getElementById("suffix").value;
    if(a != "" || b != "" || c != "" || d != ""){
        document.getElementById("pc_id").disabled = true;
    }
    else{
        document.getElementById("pc_id").disabled = false;
    }
}
