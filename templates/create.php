<?php include("base.php")?>
<!--Create Post form-->
<body>
    <h1 class = "display-4" style = "text-align: center; margin-top: 4vh; margin-bottom: 4vh;">
        Create a Post
    </h1>
    <p id="testing2"></p>
    <div class = "container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                <form action = "<?=$this->url?>/createPost" method = "post">
                <div class = "row" style = "text-align: center;">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style = "text-align: center;">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="type" id="party" value ="party" autocomplete="off" checked> Party
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="type" id="group" value ="group" autocomplete="off"> Study Group
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="type" id="club_event" value ="club_event" autocomplete="off"> Club Event
                        </label>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="location">Event Title</label>
                        <input type="text" class="form-control" id="title" name = "title" aria-describedby="emailHelp" placeholder="Enter event name">
                    </div>
                    <div class="form-group">
                    <label for="location">Event Location</label>
                        <input type="text" class="form-control" id="location" name = "location" aria-describedby="emailHelp" placeholder="Enter event address">
                        <div id = "destinationHelp" class = "form-text"></div>
                    </div>
                    <div class="form-group">
                        <label for="datetime">Date and Time</label>
                        <input type="datetime-local" class = "form-control" id="datetime" name="datetime" name="meeting-time">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name = "description" rows="7"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" onclick="getPost()"  style = "margin-top: 2vh;">Create</button>
                </form>
            </div>
        </div>
    </div>
</body>


<?php include("footer.php")?>

<script type = "text/javascript">

    //Set minimum time
    var today = new Date().toISOString().split('T')[0];
    var time=new Date().toISOString().split('T')[1];
    time=time.substring(0,5)
    document.getElementsByName("datetime")[0].setAttribute('min', today+"T"+time);
    
    function Post(destination, description, datetime, type) {
        this.destination = destination;
        this.description = description;
        this.datetime = datetime;
        this.type = type;
    }

</script>
