function validatePost(){
    var destination = document.getElementById("destination").value;
    var description = document.getElementById("description").value;

    if(destination.length<3 || description.length<5){
        alert("Please be more specific");
        return false; 
    }
    return true;
}

function successAlert(id,message){
    document.getElementById(id).innerHTML="<div class='alert alert-success' style = 'margin:0;'><b>"+message+"</b></div>";
    setTimeout(function(){ 
        document.getElementById(id).innerHTML = "";
    }, 3000);
}

function failAlert(id,message){
    document.getElementById(id).innerHTML="<div class='alert alert-danger' style = 'margin:0;'><b>"+message+"</b></div>";
    setTimeout(function(){ 
        document.getElementById(id).innerHTML = "";
    }, 3000);
}
