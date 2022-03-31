<?php
ini_set('display_errors', 0);

if (isset($_GET["p"])) {
    

    
    }
    else if ($_GET["p"] == "createteacher") {
        createteacher();
    }
     else if ($_GET["p"] == "getcreateteacher") {
        getcreateteacher();
    }
    
    else if ($_GET["p"] == "readteacher") {
        readteacher();
    }
     else if ($_GET["p"] == "updateteacher") {
        updateteacher();
    }
     else if ($_GET["p"] == "deleteteacher") {
        deleteteacher();
    }
}
function createteacher() {
    require_once("config.php");
    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);
    $id=htmlspecialchars(strip_tags($event_json['id'], ENT_QUOTES));
    $dept=htmlspecialchars(strip_tags($event_json['dept'], ENT_QUOTES));
    $name=htmlspecialchars(strip_tags($event_json['name'], ENT_QUOTES));
    $nid=htmlspecialchars(strip_tags($event_json['nid'], ENT_QUOTES));
    $birth=htmlspecialchars(strip_tags($event_json['birth'], ENT_QUOTES));
    $address=htmlspecialchars(strip_tags($event_json['address'], ENT_QUOTES));
    
    $query="INSERT INTO `teacher`(id, dept, name, nid, birth,address ) VALUES ('$id','$dept','$name','$nid','$birth','$address')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response,true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response,true));
    }
}
function getcreateteacher() {
    require_once("config.php");
    $query="SELECT * FROM teacher ";
    $result=mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
         
          "id" => $row["id"],
          "dept" => $row["dept"],
          "name" => $row["name"],
          "nid" => $row["nid"],
          "birth" => $row["birth"],
          "address" => $row["address"],
        );

    }
    if ($array) {
        print_r(json_encode($array, true));
    }
    else {
        print_r(json_encode(array(), true));
    }

}
function readteacher() {
    require_once("config.php");
    $query="SELECT * FROM teacher";
    $result=mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
         
          "id" => $row["id"],
          "dept" => $row["dept"],
          "name" => $row["name"],
          "nid" => $row["nid"],
          "birth" => $row["birth"],
          "address" => $row["address"],
        );

    }
    print_r(json_encode($array,true));
}
?>    