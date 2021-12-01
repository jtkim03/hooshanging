
<!DOCTYPE html>
<html lang="en" data-theme = "light">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Joon Kim and Crystal Ho">
    <meta name="description" content="Dashboard for hangout website">  
    
    <title>Hoos HitchHiking</title>
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <!--Styles-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> 
    <!--JS Scripts-->
    <script type="text/javascript" src="script.js"></script>
    <script src = "base.js"></script>

    <!-- For development, we may want a better-printed CSS, but with larger download size.  Ignore "min"
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.css" rel="stylesheet"> 
    -->

    <link rel="stylesheet" href="styles/styles.css" /> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top navbar-light"  style = "font-family: 'Staatliches', cursive;">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$this->url?>/myposts">My Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$this->url?>/allposts">All Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$this->url?>/faq">FAQ</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="index.php">Hoos HitchHiking?</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#profileModal">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$this->url?>/create">Create Post</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" style = "padding-bottom: 0">
                        <i class = "fas fa-sun fa-3x mt-0 theme-icon" style = "font-size: 25px;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--Profile Modal-->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action ="<?=$this->url?>/updateProfile" method = "post">
                    <div class="form-group">
                        <input type="hidden" id="email" name="email" value=<?=$_SESSION['email']?>>
                        <label for="name">Name</label>
                        <input type="text" class="form-control" value=<?=$_SESSION['name']?> id="name" name = "name" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="contact" name="contact" value=<?=$_SESSION['contact']?>>
                        <label for="contactInfo">Contact</label>
                        <input type="text" class="form-control" value=<?=$_SESSION['contact']?> id="contact" name = "contact" aria-describedby="emailHelp">
                    </div>
                    <a class="btn btn-primary" href="<?=$this->url?>/logout"  role="button">Logout</a>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>

    <div id="profileAlert"><?php if(!empty($_SESSION["updateProfile"])){echo $_SESSION["updateProfile"];}?> </div>

    