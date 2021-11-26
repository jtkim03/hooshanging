<?php include("base.php")?>
    <!--Create Post form-->
    <h1 class = "display-4" style = "text-align: center; margin-top: 4vh; margin-bottom: 4vh;">
        Create a Post
    </h1>
    <div class = "container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-6">
                <form action = "createPost.php" method = "post">
                <div class = "row" style = "text-align: center;">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style = "text-align: center;">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="requestOrOffer" id="request" value ="request" autocomplete="off" checked> Request
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="requestOrOffer" id="offer" value ="offer" autocomplete="off"> Offer
                        </label>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="destination">Destination</label>
                    <input type="text" class="form-control" id="destination" name = "destination" aria-describedby="emailHelp" placeholder="Enter event name">
                    </div>
                    <div class="form-group">
                        <label for="datetime">Date and Time of Departure</label>
                        <input type="datetime-local" class = "form-control" id="datetime" name="datetime" name="meeting-time">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name = "description" rows="7"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success" style = "margin-top: 2vh;">Create</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php")?>