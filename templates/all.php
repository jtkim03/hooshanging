<?php include("base.php")?>
    <!--All posts section-->
    <h1 class = "display-4" style = "text-align: center; margin-top: 4vh; margin-bottom: 4vh; font-family: 'Staatliches', cursive;">
        All posts
    </h1>
    <table class="table" id=allpost_table>
            <tr>
                <th>Destination</th>
                <th>Date and Time</th>
                <th>Description</th>
            </tr>
            <tbody id="mypost_data">
            </tbody> 
        </table> 
    <div class="container" id=allpost_row>
        <div class="row no-gutters" style = "margin: 40px 0 20px">
          </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                    <div class="card card-default">
                        <img class="card-img-top" src="styles/images/uva-afc.jpg" alt="Card image cap">
                        <div class="card-body card-bg-light">
                            <h5 class="card-title">Aquatic Fitness Center</h5>
                            <p>Date: 10/5/2021</p>
                            <p>Departure Time: 11:00 AM</p>
                            <p class="card-text">Heading to the AFC to workout, anyone can hitch a ride!</p>
                            <a  class="stretched-link" data-toggle="modal" data-target="#detailModal"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                    <div class="card card-default">
                        <img class="card-img-top" src="styles/images/barracks.jpg" alt="Card image cap">
                        <div class="card-body card-bg-light">
                            <h5 class="card-title">Barracks</h5>
                            <p>Date: 9/28/2021</p>
                            <p>Time: 11:00 AM</p>
                            <p class="card-text">We are going to barracks if you want to get anything there! We request
                                a small fee of $2 for gas :)
                            </p>
                            <a type="hidden" class="stretched-link" data-toggle="modal" data-target="#detailModal"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                    <div class="card card-default">
                        <img class="card-img-top" src="styles/images/Ohill.jpg" alt="Card image cap">
                        <div class="card-body card-bg-light">
                            <h5 class="card-title">Ohill</h5>
                            <p>Date: 9/28/2021</p>
                            <p>Time: 1:00 PM</p>
                            <p class="card-text">We are going to OHill to get some food. Feel free to hitch a ride if you wanna be any
                                where neat that area!
                            </p>
                            <a class="stretched-link" data-toggle="modal" data-target="#detailModal"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                    <div class="card card-default">
                        <img class="card-img-top" src="styles/images/uva-lawn.jpg" alt="Card image cap">
                        <div class="card-body card-bg-light">
                            <h5 class="card-title">The Lawn</h5>
                            <p>Date: 9/28/2021</p>
                            <p>Time: 1:00 PM</p>
                            <p class="card-text">We are going to the lawn. Rides are free!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--RSVP-->
            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel">Post Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <h5>Contact Info</h5>
                        <p>Phone: xxx-xxx-xxxx</p>
                        <p>Email: xxx-xxx-xxxx</p>
                        <hr>
                        <h5>Description</h5>
                        <p>Description goes here</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                            <div class="card card-default">
                                <img class="card-img-top" src="styles/images/uva-afc.jpg" alt="Card image cap">
                                <div class="card-body card-bg-light">
                                    <h5 class="card-title">Aquatic Fitness Center</h5>
                                    <p>Date: 10/5/2021</p>
                                    <p>Departure Time: 11:00 AM</p>
                                    <p class="card-text">Heading to the AFC to workout, anyone can hitch a ride!</p>
                                    <a  class="stretched-link" data-toggle="modal" data-target="#detailModal"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                            <div class="card card-default">
                                <img class="card-img-top" src="styles/images/uva-afc.jpg" alt="Card image cap">
                                <div class="card-body card-bg-light">
                                    <h5 class="card-title">Aquatic Fitness Center</h5>
                                    <p>Date: 10/5/2021</p>
                                    <p>Departure Time: 11:00 AM</p>
                                    <p class="card-text">Heading to the AFC to workout, anyone can hitch a ride!</p>
                                    <a class="stretched-link" data-toggle="modal" data-target="#detailModal"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                            <div class="card card-default">
                                <img class="card-img-top" src="styles/images/uva-afc.jpg" alt="Card image cap">
                                <div class="card-body card-bg-light">
                                    <h5 class="card-title">Aquatic Fitness Center</h5>
                                    <p>Date: 10/5/2021</p>
                                    <p>Departure Time: 11:00 AM</p>
                                    <p class="card-text">Heading to the AFC to workout, anyone can hitch a ride!</p>
                                    <a  class="stretched-link" data-toggle="modal" data-target="#detailModal"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                            <div class="card card-default">
                                <img class="card-img-top" src="styles/images/uva-afc.jpg" alt="Card image cap">
                                <div class="card-body card-bg-light">
                                    <h5 class="card-title">Aquatic Fitness Center</h5>
                                    <p>Date: 10/5/2021</p>
                                    <p>Departure Time: 11:00 AM</p>
                                    <p class="card-text">Heading to the AFC to workout, anyone can hitch a ride!</p>
                                    <a  class="stretched-link" data-toggle="modal" data-target="#detailModal"></a>
                                </div>
                            </div>
                    </div>
                    </div>
    </div>
    </div>
    <script>
    var ajax=new XMLHttpRequest();
    var method="GET";
    var path="allPostQuery.php";
    var asyn=true;
    var posts = [];
    ajax.open(method,path,asyn);
    ajax.send();
    ajax.addEventListener("load", function() {
    // set question
    if (this.status == 200) { // worked   
       //alert("Text"+JSON.parse(this.responseText));
       posts=JSON.parse(this.responseText);
       displayAllPost(posts);
    }
    });
      // What happens on error
    ajax.addEventListener("error", function() {
        document.getElementById("message").innerHTML = 
            "<div class='alert alert-danger'>An Error Occurred</div>";
    });
    function displayAllPost(posts){
        var table = document.getElementById("allpost_table");
        table.removeChild(table.getElementsByTagName("tbody")[0]);
        var body = document.createElement("tbody");
        for(var i = 0; i < posts.length; i++) {
            var post = posts[i];
            var row = document.createElement("tr");
            var th = document.createElement("th"); 

            var destination = document.createElement("td");
            var property_text = document.createTextNode(post.destination);
            destination.appendChild(property_text);
            row.appendChild(destination);
            var date = document.createElement("td");
            var property_text = document.createTextNode(post.datetime);
            date.appendChild(property_text);
            row.appendChild(date);
            var descrip = document.createElement("td");
            var property_text = document.createTextNode(post.description);
            descrip.appendChild(property_text);
            row.appendChild(descrip);
            body.appendChild(row);
        }
        table.appendChild(body);
}


</script>
    <?php include("footer.php")?>