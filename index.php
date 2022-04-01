<?php
ini_set('display_errors', 0);

if (isset($_GET["p"])) {
    if ($_GET["p"] == "createStudent") {
        createStudent();
    } else if ($_GET["p"] == "readStudent") {
        readStudent();
    } else if ($_GET["p"] == "updateStudent") {
        updateStudent();
    } else if ($_GET["p"] == "deleteStudent") {
        deleteStudent();
    } else if ($_GET["p"] == "createTeacher") {
        createTeacher();
    } else if ($_GET["p"] == "readTeacher") {
        readTeacher();
    } else if ($_GET["p"] == "updateTeacher") {
        updateTeacher();
    } else if ($_GET["p"] == "deleteTeacher") {
        deleteTeacher();
    } else if ($_GET["p"] == "createCourse") {
        createCourse();
    } else if ($_GET["p"] == "readCourse") {
        readCourse();
    } else if ($_GET["p"] == "updateCourse") {
        updateCourse();
    } else if ($_GET["p"] == "deleteCourse") {
        deleteCourse();
    } else if ($_GET["p"] == "createPayment") {
        createPayment();
    } else if ($_GET["p"] == "readPayment") {
        readPayment();
    } else if ($_GET["p"] == "updatePayment") {
        updatePayment();
    } else if ($_GET["p"] == "deletePayment") {
        deletePayment();
    } else if ($_GET["p"] == "addCourseToTeacher") {
        addCourseToTeacher();
    } else if ($_GET["p"] == "createCourseToSemester") {
        createCourseToSemester();
    } else if ($_GET["p"] == "removeCourseFromSemester") {
        removeCourseFromSemester();
    } else if ($_GET["p"] == "removeCourseFromTeacher") {
        removeCourseFromTeacher();
    }

}
 function createstudent()
 {
     require_once("config.php");
     $input = @file_get_contents("php://input");
     $event_json = json_decode($input, true);
     $id = htmlspecialchars(strip_tags($event_json['id'], ENT_QUOTES));
     $dept = htmlspecialchars(strip_tags($event_json['dept'], ENT_QUOTES));
     $name = htmlspecialchars(strip_tags($event_json['name'], ENT_QUOTES));
     $nid = htmlspecialchars(strip_tags($event_json['nid'], ENT_QUOTES));
     $birth = htmlspecialchars(strip_tags($event_json['birth'], ENT_QUOTES));
     $address = htmlspecialchars(strip_tags($event_json['address'], ENT_QUOTES));
     $batch = htmlspecialchars(strip_tags($event_json['batch'], ENT_QUOTES));

     $query = "INSERT INTO `student`(id, dept, name, nid, birth,address, batch) VALUES ('$id','$dept','$name','$nid','$birth','$address','$batch')";
     $result = mysqli_query($conn, $query);
     if ($result) {
         $response["success"] = true;
         print_r(json_encode($response, true));
     } else {
         $response["success"] = false;
         print_r(json_encode($response, true));
     }
 }

function readStudent()
{
    require_once("config.php");
    $dept = $_GET['dept'];
    $batch = $_GET['$batch'];
    $query = "SELECT * FROM student WHERE dept= '$dept' AND batch='$batch'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
            "id" => $row["id"],
            "dept" => $row["dept"],
            "name" => $row["name"],
            "nid" => $row["nid"],
            "birth" => $row["birth"],
            "address" => $row["address"],
            "batch" => $row["batch"],
        );

    }
    print_r(json_encode($array, true));
}

function updateStudent()
{
    require_once("config.php");
    $id = $_GET['id'];
    $dept = $_GET['dept'];
    $name = $_GET['name'];
    $nid = $_GET['nid'];
    $birth = $_GET['birth'];
    $address = $_GET['address'];
    $query = "UPDATE `student` SET `dept`='$dept',`name`='$name',`nid`='$nid',`birth`='$birth',`address`='$address' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function deleteStudent()
{
    require_once("config.php");
    $id = $_GET['id'];
    $query = "DELETE FROM `student` WHERE id= '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function createTeacher()
{
    require_once("config.php");
    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);
    $id = htmlspecialchars(strip_tags($event_json['id'], ENT_QUOTES));
    $dept = htmlspecialchars(strip_tags($event_json['dept'], ENT_QUOTES));
    $name = htmlspecialchars(strip_tags($event_json['name'], ENT_QUOTES));
    $nid = htmlspecialchars(strip_tags($event_json['nid'], ENT_QUOTES));
    $birth = htmlspecialchars(strip_tags($event_json['birth'], ENT_QUOTES));
    $address = htmlspecialchars(strip_tags($event_json['address'], ENT_QUOTES));

    $query = "INSERT INTO `teacher`(id, dept, name, nid, birth,address ) VALUES ('$id','$dept','$name','$nid','$birth','$address')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function readTeacher()
{
    require_once("config.php");
    $dept = $_GET['dept'];
    $query = "SELECT * FROM teacher dept='$dept'";
    $result = mysqli_query($conn, $query);
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
    print_r(json_encode($array, true));
}

function updateTeacher()
{
    require_once("config.php");
    $id = $_GET['id'];
    $dept = $_GET['dept'];
    $name = $_GET['name'];
    $nid = $_GET['nid'];
    $birth = $_GET['birth'];
    $address = $_GET['address'];
    $query = "UPDATE `teacher` SET `dept`='$dept',`name`='$name',`nid`='$nid',`birth`='$birth',`address`='$address' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function deleteTeacher()
{
    require_once("config.php");
    $id = $_GET['id'];
    $query = "DELETE FROM `teacher` WHERE id= '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function createCourse()
{
    require_once("config.php");
    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);
    $id = htmlspecialchars(strip_tags($event_json['id'], ENT_QUOTES));
    $dept = htmlspecialchars(strip_tags($event_json['dept'], ENT_QUOTES));
    $title = htmlspecialchars(strip_tags($event_json['title'], ENT_QUOTES));
    $credit = htmlspecialchars(strip_tags($event_json['credit'], ENT_QUOTES));
    $syllabus = htmlspecialchars(strip_tags($event_json['syllabus'], ENT_QUOTES));
    $semester = htmlspecialchars(strip_tags($event_json['semester'], ENT_QUOTES));

    $query = "INSERT INTO `course`(id, dept, title, credit, syllabus,semester ) VALUES ('$id','$dept','$title','$credit','$syllabus','$semester')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function readCourse()
{
    require_once("config.php");
    $dept = $_GET['dept'];
    $semester = $_GET['semester'];
    $query = "SELECT * FROM course WHERE dept='$dept' AND  semester ='$semester'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
            "id" => $row["id"],
            "dept" => $row["dept"],
            "title" => $row["title"],
            "credit" => $row["credit"],
            "syllabus" => $row["syllabus"],
        );

    }
    print_r(json_encode($array, true));
}


function updateCourse()
{
    require_once("config.php");
    $id = $_GET['id'];
    $dept = $_GET['dept'];
    $name = $_GET['name'];
    $title = $_GET['title'];
    $credit = $_GET['credit'];
    $syllabus = $_GET['syllabus'];
    $query = "UPDATE `course` SET `dept`='$dept',`name`='$name',`title`='$title',`credit`='$credit',`syllabus`='$syllabus' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function deleteCourse()
{
    require_once("config.php");
    $id = $_GET['id'];
    $query = "DELETE FROM `course` WHERE id= '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function createPayment()
{
    require_once("config.php");
    $input = @file_get_contents("php://input");
    $event_json = json_decode($input, true);
    $payment_id = htmlspecialchars(strip_tags($event_json['payment_id'], ENT_QUOTES));
    $student_id = htmlspecialchars(strip_tags($event_json['student_id'], ENT_QUOTES));
    $amount = htmlspecialchars(strip_tags($event_json[' amount'], ENT_QUOTES));
    $date = htmlspecialchars(strip_tags($event_json['date '], ENT_QUOTES));

    $query1 = "INSERT INTO `payment`(payment_id, student_id, amount, date) VALUES ('$payment_id','$student_id','$amount','$date')";
    $result = mysqli_query($conn, $query1);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }

}

function readPayment()
{
    require_once("config.php");
    $dept = $_GET['dept'];
    $student_id = $_GET['student_id'];
    $query = "SELECT * FROM payment WHERE dept='$dept' AND  student_id ='$student_id'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result)) {
        $array[] = array(
            "payment_id" => $row["payment_id"],
            "student_id" => $row["student_id"],
            "amount" => $row["amount"],
            "date" => $row["date"]
        );

    }
    print_r(json_encode($array, true));
}

function updatePayment()
{
    require_once("config.php");
    $payment_id = $_GET['payment_id'];
    $student_id = $_GET['student_id'];
    $amount = $_GET['amount'];
    $date = $_GET['date'];
    $query = "UPDATE `payment` SET `payment_id`='$payment_id',`student_id`='$student_id',`amount`='$amount',`date`='$date' WHERE payment_id = '$payment_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function deletePayment()
{
    require_once("config.php");
    $id = $_GET['payment_id'];
    $query = "DELETE FROM `payment` WHERE id= '$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function addCourseToTeacher()
{
    require_once("config.php");
    $course_id = $_GET['course_id'];
    $teacher_id = $_GET['teacher_id'];
    $query = "UPDATE `teacher_id` SET `teacher_id`='$teacher_id' WHERE course_id = '$course_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function createCourseToSemester()
{
    require_once("config.php");
    $course_id = $_GET['course_id'];
    $semester = $_GET['semester'];
    $query = "UPDATE `course` SET `semester`='$semester' WHERE course_id = '$course_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function removeCourseFromSemester()
{
    require_once("config.php");
    $course_id = $_GET['course_id'];
    $semester = $_GET['semester'];
    $query = "UPDATE `course` SET `semester`='' WHERE course_id = '$course_id' AND semester='$semester' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}

function removeCourseFromTeacher()
{
    require_once("config.php");
    $course_id = $_GET['course_id'];
    $teacher_id = $_GET['teacher_id'];
    $query = "UPDATE `course` SET `teacher_id`='' WHERE course_id = '$course_id' AND teacher_id='$teacher_id' ";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $response["success"] = true;
        print_r(json_encode($response, true));
    } else {
        $response["success"] = false;
        print_r(json_encode($response, true));
    }
}


?>