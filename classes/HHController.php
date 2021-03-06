<?php

class HHController {

    private $db;
    
    private $url = "/hooshanging";

    //will have instance of database object
    public function __construct() {
        $this->db = new Database();
    }
    //handles logic of methods
    public function run($command) {
        switch($command) {
            case "updateProfile":
                $this->updateProfile();
                break;
            case "myposts":
                $this->getMyPost();
                break;
            case "allposts":
                $this->getAllPost();
                break;
            case "createPost":
                $this->createPost();
                break;
            case "deletePost":
                $this->deletePost();
                break;
            case "filterParty":
                $this->filterParty();
                break;
            case "filterStudy":
                $this->filterStudy();
                break;
            case "filterClubEvent":
                $this->filterClubEvent();
                break;
            case "home":
                $this->getHappeningSoonPost();
                break;
            case "myposts":
                include("templates/my-posts.php");
                break;
            case "all":
                include("templates/all.php");
                break;
            case "faq":
                include("templates/faq.php");
                break;
            case "create":
                include("templates/create.php");
                break;
            case "logout":
                $this->destroySession();           
            case "signin":
            default:
                $this->signin();
                break;
        }
            
    }

    //destroy and restart
    public function destroySession() {          
        session_destroy();
        session_start();

    }

    public function signin() {
            $error_msg = ""; 
            require 'google-api/vendor/autoload.php';
           
            // Creating new google client instance
            $client = new Google_Client();
            // Enter your Client ID
            $client->setClientId($this->db->clientID);
            // Enter your Client Secrect
            $client->setClientSecret($this->db->clientSecret);
            // Enter the Redirect URL
            $client->setRedirectUri($this->db->redirectUri);
           
            // Adding those scopes which we want to get (email & profile Information)
            $client->addScope("email");
            $client->addScope("profile");
           if(isset($_GET['code'])){
            
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            if(!isset($token["error"])){
                $db_connection=$this->db->mysqli;
                $client->setAccessToken($token['access_token']);
    
                // getting profile information
                $google_oauth = new Google_Service_Oauth2($client);
                $google_account_info = $google_oauth->userinfo->get();
                
                // Storing data into database
                $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
                $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
                // $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);
                //check if UVA Student
                $regex="<[a-z][a-z][a-z]?[0-9][a-z][a-z]?[a-z]?@virginia.edu>";
                if(preg_match($regex,$email)){
                    // checking user already exists or not
                    $get_user = mysqli_query($db_connection, "SELECT `email` FROM `appuser` WHERE `email`='$email'");
                    if(mysqli_num_rows($get_user) > 0){
                        //retrieve user data
                        $stmt = $this->db->mysqli->prepare("select * from appuser where email = ?;");
                        $stmt->bind_param("s", $email);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        $data = $res->fetch_all(MYSQLI_ASSOC);
                        $_SESSION['email'] = $email; 
                        $_SESSION['name'] = $full_name;
    
                        header('Location: /hooshanging/home');
                        return;
    
                    }
                    else{
    
                        // if user not exists we will insert the user
                        $insert = mysqli_query($db_connection, "INSERT INTO `appuser`(`name`,`email`) VALUES('$full_name','$email')");
    
                        if($insert){
                            $_SESSION['email'] = $email;
                            $_SESSION['name'] = $full_name;  
                            $_SESSION["loc"] = "";
                            $_SESSION["car_desc"] ="";
                            $_SESSION["contact"] ="";
    
                            header('Location: /hooshanging/home');
                            return;
                        }
                        else{
                            echo "Sign up failed!(Something went wrong).";
                        }
    
                    }
                }
                else{
                    $error_msg="Must be a UVA student!";
                    $_SESSION['error']="<div class='alert alert-danger'style = 'margin:0;'><b>Error: $error_msg </b></div>";
                    header('Location: /hooshanging/home');
                }
    
            }
            }
            include("templates/signin.php");
        }
            
    
    public function updateProfile() {
        if ($_POST["name"] != "" || $_POST["contact"] != "") {
            $stmt = $this->db->mysqli->prepare("update appuser set
                                name = ?,
                                contact = ?
                                where email = ?;");
            $stmt->bind_param("sss", $_POST["name"], $_POST["contact"], $_POST["email"]);
            if ($stmt->execute()) {
                $_SESSION["updateProfile"] = "<div class='alert alert-success' style = 'margin:0;'><b>Profile successfully updated!</b></div>";
                $_SESSION["name"] = $_POST["name"];
                $_SESSION["contact"] = $_POST["contact"];
            $stmt->bind_param("sss", $_POST["name"], $_POST["contact"],$_POST["email"]);
            if ($stmt->execute()) {
                $_SESSION["updateProfile"] = "<script type='text/javascript'>
                successAlert('profileAlert','Profile sucessfully updated!');;
            </script>";
            }
        }
            else {
                $_SESSION["updateProfile"]  = "<script type='text/javascript'>
                failAlert('profileAlert','Error: Profile did not update!');;
            </script>";
            }
            header("Location:home");
    }

}
    public function getHappeningSoonPost() {
        $stmt = $this->db->mysqli->prepare("select * from event_address natural join event_occurance natural join event_description order by event_datetime");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_all(MYSQLI_ASSOC);
        if ($data === false) {
            $_SESSION["soonposts"] = "";
        }
        else {
            $_SESSION["soonposts"] = $data;
        }
        include("templates/home.php");
    }
    public function getMyPost(){
        $stmt = $this->db->mysqli->prepare("select * from event_description natural join event_address natural join event_occurance where email = ?");
        $stmt->bind_param("s",$_SESSION["email"]);
        $stmt->execute();
        $res=$stmt->get_result();
        $data=$res->fetch_all(MYSQLI_ASSOC);
        if ($data === false) {
            $_SESSION["myposts"] = "";
        }
        else {
            $_SESSION["myposts"] = $data;
        }
        include("templates/my-posts.php");
    }
    
    public function getAllPost() {
        $stmt = $this->db->mysqli->prepare("select * from event_address natural join event_occurance natural join event_description");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_all(MYSQLI_ASSOC);
        if ($data === false) {
            $_SESSION["allposts"] = "";
        }
        else {
            $_SESSION["allposts"] = $data;
        }
        include("templates/all.php");
    }
    public function createPost(){

        $post_details = array('email' => $_SESSION["email"],
                            'title' => $_POST["title"],
                            'location' => $_POST["location"], 
                            'datetime' => $_POST["datetime"], 
                            'description' => $_POST["description"],
                            'type' => $_POST['type']
                        );

        $stmt = $this->db->mysqli->prepare("insert into event_address (host_name, event_address) values (?,?);");
        $stmt->bind_param("ss",$_SESSION["name"],$post_details["location"]);
        $stmt->execute();

        $stmt = $this->db->mysqli->prepare("insert into event_occurance(title, event_datetime) values (?,?);");
        $stmt->bind_param("ss",$post_details["title"], $post_details["datetime"]);
        $stmt->execute();

        $stmt = $this->db->mysqli->prepare("insert into event_description(title, email, description,type) values (?,?,?,?);");
        $stmt->bind_param("ssss",$post_details["title"], $_SESSION["email"], $post_details["description"], $_POST["type"]);
        $stmt->execute();

        $stmt = $this->db->mysqli->prepare("insert into creates(email) values (?);");
        $stmt->bind_param("s",$post_details["email"]);
        $stmt->execute();

        header("Location:home");

    }
    public function deletePost() {
        echo $_GET["event_id"];
        echo $_GET["title"];
        $stmt = $this->db->mysqli->prepare("delete from event_address where event_id = ?");
        $stmt->bind_param("i",$_GET["event_id"]);
        $stmt->execute();

        $stmt = $this->db->mysqli->prepare("delete from event_occurance where title = ?");
        $stmt->bind_param("s",$_GET["title"]);
        $stmt->execute();

        $stmt = $this->db->mysqli->prepare("delete from event_description where title = ?");
        $stmt->bind_param("s",$_GET["title"]);
        $stmt->execute();

        $stmt = $this->db->mysqli->prepare("delete from creates where event_id = ?");
        $stmt->bind_param("i",$_GET["event_id"]);
        $stmt->execute();

        header("Location: /hooshanging/myposts");
    }

    public function filterParty() {
        $stmt = $this->db->mysqli->prepare("select * from (event_address natural join event_occurance natural join event_description) where type = 'party';");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_all(MYSQLI_ASSOC);
        if ($data === false) {
            $_SESSION["allposts"] = "";
        }
        else {
            $_SESSION["allposts"] = $data;
        }
        include("templates/all.php");
    }

    public function filterStudy() {
        $stmt = $this->db->mysqli->prepare("select * from (event_address natural join event_occurance natural join event_description) where type = 'group';");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_all(MYSQLI_ASSOC);
        if ($data === false) {
            $_SESSION["allposts"] = "";
        }
        else {
            $_SESSION["allposts"] = $data;
        }
        include("templates/all.php");
    }

    public function filterClubEvent() {
        $stmt = $this->db->mysqli->prepare("select * from (event_address natural join event_occurance natural join event_description) where type = 'club_event';");
        $stmt->execute();
        $res = $stmt->get_result();
        $data = $res->fetch_all(MYSQLI_ASSOC);
        if ($data === false) {
            $_SESSION["allposts"] = "";
        }
        else {
            $_SESSION["allposts"] = $data;
        }
        include("templates/all.php");
    }
}