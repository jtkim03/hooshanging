<?php include("base.php");
include("database_credentials.php"); // define variables
/** SETUP **/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($dbhost, $dbusername, $dbpasswd, $dbname);
$stmt=$mysqli->prepare("select * from event_description where email = ?");
$stmt->bind_param("s",$_SESSION["email"]);
if(!$stmt->execute()){
    echo "Error";
}
$res=$stmt->get_result();
$posts=$res->fetch_all(MYSQLI_ASSOC);
$posts2 = json_encode($posts,JSON_PRETTY_PRINT);
echo $posts2;
?>

    <!--My posts section-->
    <h1 class = "display-4" style = "text-align: center; margin-top: 4vh; margin-bottom: 4vh; font-family: 'Staatliches', cursive;">
        My posts
    </h1>

    <div class="container">
        <table class="table table-hover" id=allpost_table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Date and Time</th>
                    <th>Description</th>
                </tr>
            </thead>
                <tbody id="mypost_data">
                </tbody> 
        </table> 
    </div>

</body>
    <script>
        function getMyPosts() {
        // instantiate the object
        var ajax = new XMLHttpRequest();
        // open the request
        ajax.open("GET", "?command=get_mypost", true);
        // ask for a specific response
        ajax.responseType = "json";
        // send the request
        ajax.send(null);
        
        // What happens if the load succeeds
        ajax.addEventListener("load", function() {
            // set question
            if (this.status == 200) { // worked 
                posts=JSON.parse(this.responseText);
                displayAllPost(posts);
            }
        });
        
        const formatDate = (dateString) => {
            const options = { year: "numeric", month: "long", day: "numeric", hour: "numeric", minute: "numeric" }
            return new Date(dateString).toLocaleDateString(undefined, options)
        }

        function displayAllPost(posts){
            var table = document.getElementById("allpost_table");
            //table.removeChild(table.getElementsByTagName("tbody")[0]);
            var body = document.createElement("tbody");
            for(var i = 0; i < posts.length; i++) {
                var post = posts[i];
                var row = document.createElement("tr");
                var th = document.createElement("th"); 

                var destination = document.createElement("td");
                var property_text = document.createTextNode(post.email);
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
        }
    </script>
<?php include("footer.php")?>