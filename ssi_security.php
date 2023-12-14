<?

require 'init.php'; // database connection, etc
session_start();

if (isset($_SESSION['mps_token'])) {
    $mps_token = $_SESSION['mps_token'];
    $sin = new signins();
    $sin->load($mps_token, 'mps_token');
    $mpa_id = $sin->values['mps_mpa_id'];
    $acct = new accounts();
    $acct->load($mpa_id, 'mpa_id');
} else {
    //$response = json_encode(['error' => 'Access denied. No valid token provided. Sign in to gain access.']);
    //echo $response;
    $message="Access Denied. Sign in below:";
    header ("Location: index.php");
    exit();
}
if($navbar){
  require 'ssi_navbar.php';
}


?>
