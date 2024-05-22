<?php

include('../db/dbconn.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];
switch($requestMethod){
    case 'GET':
        if(isset($_GET['id'])){
            $sql = "SELECT title FROM `landsurvey`";
            $result = mysqli_query($conn, $sql);

            if($result->num_rows > 0){
                while($row->fetch_assoc($result)){
                    $data[] = $row;
                }
            }
        }
        break;
    case 'POST':

        $lot = $_POST['lot'];
        $address = $_POST['address'];
        $coordinates = $_POST['coordinates'];
        $owner_info = $_POST['owner_info'];
        $status = $_POST['status'];

        $sql = "INSERT INTO landsurvey (lot, address, coordinates, owner_info, status) VALUES ('$lot', '$address', ST_GeomFromText('$coordinates'), '$owner_info', '$status')";
        break;

        default:
        echo json_encode(array('error' => 'Invalid REQUEST'));
        break;
}

