<?php
header('Access-Control-Allow-Origin: *');                 // Allow Access from any origin
header('Content-Type: application/json; charset=UTF-8');
$security=true;
$navbar=false;
require 'ssi_security.php';


if (isset($_SESSION['mps_token'])) {
    //$mps_token = $_SESSION['mps_token'];
    //$sin = new signins();
    $log = new logs();
    //$sin->load($mps_token, 'mps_token');
    //$mpa_id = $sin->values['mps_mpa_id'];
    $mpa_apik = $acct->values['mpa_apik'];
    $log->values['mpl_mpa_id'] = $mpa_id;
    $log->values['mpl_timestamp'] = date('Y-m-d H:i:s');
    $log->values['mpl_ipad'] = $_SERVER['REMOTE_ADDR'];
    $queryString = $_SERVER['QUERY_STRING'];
    $log->values['mpl_query'] = "token=" . $mpa_apik . "?" . $queryString;
    $log-> save();
    //$sin->values['mps_time_edit'] = date('Y-m-d H:i:s');
    //$sin -> update();
} else {
    // Token is missing, reject the request
    $response = json_encode(['error' => 'Access denied. No valid token provided.']);
    echo $response;
    exit;
}


$work = isset($_GET['work']) ? $mysqli->real_escape_string($_GET['work']) : null;
$scene = isset($_GET['scene']) ? $mysqli->real_escape_string($_GET['scene']) : null;
$act = isset($_GET['act']) ? $mysqli->real_escape_string($_GET['act']) : null;

if ($act !== null && $scene !== null && $work !== null) {
    $sql = "SELECT * FROM shakespeare_paragraphs
            INNER JOIN shakespeare_chapters
            ON chap_work_id = par_work_id
            AND chap_act = par_act
            AND chap_scene = par_scene
            WHERE par_work_id = '$work'
            AND par_act = '$act'
            AND par_scene = '$scene'
            ORDER BY par_number ASC";

} elseif($act !== null && $work !== null) {
  $sql = "SELECT * FROM shakespeare_chapters
          WHERE chap_work_id = '$work'
          AND chap_act = '$act'
          ORDER BY chap_id ASC";

} elseif ($work !== null) {
    $sql = "SELECT * FROM shakespeare_chapters
            WHERE chap_work_id = '$work'";
} else {
    $sql = "SELECT * FROM `shakespeare_works`";
}

$query = $mysqli->query($sql);

if ($query === false) {
    echo "Query execution error: " . $mysqli->error;
    exit;
}

$json_outt = [];

while ($data = $query->fetch_array(MYSQLI_ASSOC)) {
    if($scene !== null) {
        $scene_location = $data['chap_description'];
        $par_number = $data['par_number'];
        $par_char_id = $data['par_char_id'];
        $par_text = $data['par_text'];
        $json_outt[] = response_para($par_number, $par_char_id, $par_text);
    }elseif ($act !== null) {
        $chap_id = $data['chap_id'];
        $chap_scene = $data['chap_scene'];
        $chap_description = $data['chap_description'];
        $json_outt[] = response_act($chap_id, $chap_scene, $chap_description);
    } elseif ($work !== null) {
        $scene_id = $data['chap_id'];
        $scene_work_id = $data['chap_work_id'];
        $scene_act = $data['chap_act'];
        $scene_scene = $data['chap_scene'];
        $scene_location = $data['chap_description'];
        $json_outt[] = response_scene($scene_id, $scene_work_id, $scene_act, $scene_scene, $scene_location);
    } else {
        $work_id = $data['work_id'];
        $work_title = $data['work_title'];
        $work_long_title = $data['work_long_title'];
        $work_year = $data['work_year'];
        $work_genre = $data['work_genre'];
        $json_outt[] = response($work_id, $work_title, $work_long_title, $work_year, $work_genre);
    }
}

$mysqli->close();

if ($scene !== null) {
    $para_arr = ["scene_location" => $scene_location, "paragraphs" => $json_outt];
    echo json_encode($para_arr);
} else {
    echo json_encode($json_outt);
}

function response_para($par_number, $par_char_id, $par_text) {
    return [
        $par_number,
        $par_char_id,
        $par_text
    ];
}

function response_act($chap_id, $chap_scene, $chap_description) {
  return [
      "chap_id" => $chap_id,
      "chap_scene" => $chap_scene,
      "chap_description" => $chap_description
  ];
}

function response_scene($scene_id, $scene_work_id, $scene_act, $scene_scene, $scene_location) {
    return [
        "scene_id" => $scene_id,
        "scene_work_id" => $scene_work_id,
        "scene_act" => $scene_act,
        "scene_scene" => $scene_scene,
        "scene_location" => $scene_location
    ];
}

function response($work_id, $work_title, $work_long_title, $work_year, $work_genre) {
    return [
        "work_id" => $work_id,
        "work_title" => $work_title,
        "work_long_title" => $work_long_title,
        "work_year" => $work_year,
        "work_genre" => $work_genre
    ];
}
?>
