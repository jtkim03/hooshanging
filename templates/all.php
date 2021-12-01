<?php include("base.php")?>
    <!--All posts section-->
    <h1 class = "display-4" style = "text-align: center; margin-top: 4vh; margin-bottom: 4vh; font-family: 'Passero One', cursive;">
        All posts
    </h1>

    <div class = "container" style = "padding-bottom: 200px">
        <div class = "row no-gutters" style = "margin: 40px 0 30px">
        <div class = "row" style = "display: inline-block; margin-bottom: 50px">
            <a href="<?=$this->url?>/filterParty">
                <button type="button" class="btn btn-info" style = "width: 120px; margin: 7px">Party</button>
            </a>
            <a href="<?=$this->url?>/filterStudy">
                <button type="button" class="btn btn-info" style = "width: 120px; margin: 7px">Study Group</button>
            </a>
            <a href="<?=$this->url?>/filterClubEvent">
                <button type="button" class="btn btn-info" style = "width: 120px; margin: 7px">Club Event</button>
            </a>
        </div>
            <div class = "row">
                <?php if(!empty($_SESSION["allposts"])):
                    foreach($_SESSION["allposts"] as $i):
                        $date = date_create($i["event_datetime"]);
                        $date = $date->format('m/d/Y, H:i:s');
                ?>
                <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch" style="margin-bottom:10px;">
                    <div class="card card-default border-0">
                        <div class="card-body card-bg-light">
                            <h5 class="card-title"><?=$i['title']?></h5>
                            <p>Date: <?=$date?></p> 
                            <p>Location: <?=$i["event_address"]?></p>
                            <p class="card-text"><?=$i["description"]?></p>
                            <a class="stretched-link" data-toggle="modal" data-target="#detailModal"></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif;?>
            </div>
        </div>
    </div>

                





    <script>
    const formatDate = (dateString) => {
    const options = { year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric" }
    return new Date(dateString).toLocaleDateString(undefined, options)
    }
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
        //table.removeChild(table.getElementsByTagName("tbody")[0]);
        var body = document.createElement("tbody");
        for(var i = 0; i < posts.length; i++) {
            var post = posts[i];
            var row = document.createElement("tr");
            var th = document.createElement("th"); 

            var destination = document.createElement("td");
            var property_text = document.createTextNode(post.title);
            destination.appendChild(property_text);
            row.appendChild(destination);
            var destination = document.createElement("td");
            var property_text = document.createTextNode(post.event_address);
            destination.appendChild(property_text);
            row.appendChild(destination);
            var date = document.createElement("td");
            var property_text = document.createTextNode(formatDate(post.event_datetime));
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