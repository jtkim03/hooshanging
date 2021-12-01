<?php include("base.php");?>
    <h1 class = "display-4" style = "text-align: center; margin-top: 4vh; margin-bottom: 4vh; font-family: 'Passero One', cursive;">
        Welcome, <?=$_SESSION["name"]?>
    </h1>
    <!--Departing soon featured-->
    <div class="container">
        <div class="row no-gutters" style = "margin: 40px 0 20px">
            <div class = "col-12 col-sm-6 col-md-8">
                <h1 class = "display-6 light-text" style = "font-family: 'Passero One', cursive;">Happening soon</h1>
            </div>
            
            <div class = "container" style = "padding-bottom: 200px">
        <div class = "row no-gutters" style = "margin: 40px 0 20px">
            <div class = "row">
                <?php if(!empty($_SESSION["soonposts"])):
                    foreach($_SESSION["soonposts"] as $i):
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
                        </div>
                    </div>
                </div>
                <?php endforeach; endif;?>
            </div>
        </div>
    </div>
            <!--Post Details Modal-->
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
        </div>
    </div>
<?php include("footer.php")?>

