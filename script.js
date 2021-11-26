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

// var post=null;
// function getPost(){
//     var ajax = new XMLHttpRequest();
//     ajax.open("GET","?command=createPost",true);
//     ajax.responseType="json";
//     ajax.send(null);
//    // What happens if the load succeeds
//    // anonymous function
//    ajax.addEventListener("load", function() {
//     // set question
//     if (this.status == 200) { // worked   
//        post=this.response;
//        //alert("Text"+JSON.parse(this.responseText));
//        console.log("Post:"+this.response);
//        displayMyPost();
//     }
//     });

//     // What happens on error
//     ajax.addEventListener("error", function() {
//         document.getElementById("message").innerHTML = 
//             "<div class='alert alert-danger'>An Error Occurred</div>";
//     });
// }

// // Method to display a post
// function displayMyPost() {
//     document.getElementById("testing2").innerHTML = "Post:";
// }
// // Method to display a post
// // function displayAllPost() {
// //     document.getElementById("testing").innerHTML = "hello";
// // }
// getPost();
