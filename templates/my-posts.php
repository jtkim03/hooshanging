<?php include("base.php")
?>

    <!--My posts section-->
    <h1 class = "display-4" style = "text-align: center; margin-top: 4vh; margin-bottom: 4vh; font-family: 'Passero One', cursive;">
        My posts
    </h1>

    <div class = "container" style = "padding-bottom: 200px">
        <div class = "row no-gutters" style = "margin: 40px 0 20px">
            <div class = "row">
                <?php if(!empty($_SESSION["myposts"])):
                    foreach($_SESSION["myposts"] as $i):
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
                            <a href="<?=$this->url?>/deletePost?title=<?=$i["title"]?>&event_id=<?=$i["event_id"]?>">
                                <button type="button" title="delete" class="btn btn-danger btn-square-md"><i class="fa-solid fa-trash-can"></i></button>
                            </a>
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

    </script>
<?php include("footer.php")?>