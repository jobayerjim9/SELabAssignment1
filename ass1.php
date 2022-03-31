<?php
ini_set('display_errors', 0);

if (isset($_GET["p"])) {
    if($_GET["p"] == "createStudent(t") {
        createStudent();
    }
    else if ($_GET["p"] == "getcreateStudent") {
        getcreateStudent();
    }
     else if ($_GET["p"] == "readStudent") {
        readStudent();
    }

    else if ($_GET["p"] == "createCourse") {
        createCourse();
    }
    else if ($_GET["p"] == "getcourses") {
        getcourses();
    }
    else if ($_GET["p"] == "createteacher") {
        createteacher();
    }
     else if ($_GET["p"] == "getcreateteacher") {
        getcreateteacher();
    }
    else if ($_GET["p"] == "readCourse") {
        readCourse();
    }
    else if ($_GET["p"] == "readteacher") {
        readteacher();
    }
    else if ($_GET["p"] == "createpayment") {
        createpayment();
    }
    else if ($_GET["p"] == "readpayment") {
        readpayment();
    }
    else if ($_GET["p"] == "updateCourse") {
       updateCourse();
    }
    else if ($_GET["p"] == "updatestudent") {
        updatestudent();
    }
     else if ($_GET["p"] == "updateteacher") {
        updateteacher();
    }
     else if ($_GET["p"] == "updatepayment") {
        updatepayment();
    }
     else if ($_GET["p"] == "deletestudent") {
        deletestudent();
    }
     else if ($_GET["p"] == "deleteteacher") {
        deleteteacher();
    }
     else if ($_GET["p"] == "deletepayment") {
        deletepayment();
    }

}
 function createstudent() {
    require_once("config.php");
    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);
    $id=htmlspecialchars(strip_tags($event_json['id'], ENT_QUOTES));
    $dept=htmlspecialchars(strip_tags($event_json['dept'], ENT_QUOTES));
    $name=htmlspecialchars(strip_tags($event_json['name'], ENT_QUOTES));
    $nid=htmlspecialchars(strip_tags($event_json['nid'], ENT_QUOTES));
    $birth=htmlspecialchars(strip_tags($event_json['birth'], ENT_QUOTES));
    $address=htmlspecialchars(strip_tags($event_json['address'], ENT_QUOTES));
    
    $query="INSERT INTO `student`(id, dept, name, nid, birth,address ) VALUES ('$id','$dept','$name','$nid','$birth','$address')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response,true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response,true));
    }
}

function getcreateStudent() {
    require_once("config.php");
    $query="SELECT * FROM student";
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
function readStudent() {
    require_once("config.php");
    $query="SELECT * FROM student";
    $result=mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
         
          
          "dept" => $row["dept"],
          "batch" => $row["batch"],
         
        );

    }
    print_r(json_encode($array,true));
}
function createCourse() {
    require_once("config.php");
    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);
    $id=htmlspecialchars(strip_tags($event_json['id'], ENT_QUOTES));
    $dept=htmlspecialchars(strip_tags($event_json['dept'], ENT_QUOTES));
    $title=htmlspecialchars(strip_tags($event_json['title'], ENT_QUOTES));
    $credit=htmlspecialchars(strip_tags($event_json['credit'], ENT_QUOTES));
    $syllabus=htmlspecialchars(strip_tags($event_json['syllabus'], ENT_QUOTES));
    
    $query="INSERT INTO `course`(id, dept, title, credit, syllabus ) VALUES ('$id','$dept','$title','$credit','$syllabus')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response,true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response,true));
    }
}
function getCourses() {
    require_once("config.php");
    $query="SELECT * FROM course";
    $result=mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
            "id" => $row["id"],
            "dept" => $row["dept"],
            "title" => $row["title"],
            "credit" => $row["credit"],
            "syllabus" => $row["syllabus"],
            
        );

    }
    if ($array) {
        print_r(json_encode($array, true));
    }
    else {
        print_r(json_encode(array(), true));
    }

}
function readcourse() {
    require_once("config.php");
    $query="SELECT * FROM course";
    $result=mysqli_query($conn,$query);

     while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
            "id" => $row["id"],
            "dept" => $row["dept"],
            "title" => $row["title"],
            "credit" => $row["credit"],
            "syllabus" => $row["syllabus"],
            
        );

    }
    print_r(json_encode($array,true));
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

function createpayment() {
    require_once("config.php");
    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);
    $payment_id=htmlspecialchars(strip_tags($event_json['payment_id'], ENT_QUOTES));
    $student_id,=htmlspecialchars(strip_tags($event_json['student_id,'], ENT_QUOTES));
    $amount=htmlspecialchars(strip_tags($event_json[' amount'], ENT_QUOTES));
    $date =htmlspecialchars(strip_tags($event_json['date '], ENT_QUOTES));

    $query1="INSERT INTO `payment`(payment_id, student_id, amount, date) VALUES ('$payment_id','$student_id','$amount','$date')";
    $result = mysqli_query($conn, $query1);
    if ($result) {
        $id = mysqli_insert_id($conn);
        $response["success"] = true;
        $response["id"] = $id;
        print_r(json_encode($response,true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response,true));
    }

}
function getcreatepayment() {
    require_once("config.php");
    $query="SELECT * FROM payment ";
    $result=mysqli_query($conn,$query);

    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
         
          "payment_id" => $row["payment_id"],
          "student_id" => $row["student_id"],
          "amount" => $row["amount"],
          "date" => $row["date"],
         
        );

    }
    if ($array) {
        print_r(json_encode($array, true));
    }
    else {
        print_r(json_encode(array(), true));
    }

}

?>