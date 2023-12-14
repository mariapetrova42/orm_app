<?
$navbar=false;
$security=false;
require 'ssi_top.php';
if (isset($_SESSION['mps_token'])) {
  header ("Location: page_home.php");
}


// All the states from the database table in proper format to pass to  lib::menu_from_assoc_array()
//$states = states::get_states_assoc_array();

if (isset($_COOKIE["remember"]) && $_COOKIE["remember"] == "yes") {
    $remembered_email = isset($_COOKIE["email"]) ? $_COOKIE["email"] : "";
} else {
    $remembered_email = "";
}


$task = $get_post['task'];
switch ($task) {
    case 'save':
        // Save the form data then transfer to the listing page

        $sinn = new signins();
        $accts = new accounts();

        $accts->load(trim($get_post['email']), 'mpa_email');

        if(!isset($accts->values['mpa_email'])) {
          $message = "User does not exist. <a href='page_account.php'>Create a new account here. </a>";
          break;
        }

        if($accts->values['mpa_password'] != hash('sha256', $get_post['password'])) {
          $message = "Password incorrect.";
          break;
        }


        $eml = $accts->values['mpa_email'];
        $tmsp = time();
        $apik = hash('md5', $eml . $tmsp);

        $sinn->set_id_value($apik);
        $sinn->values['mps_mpa_id'] = $accts->get_id_value();
        $sinn->values['mps_time_init'] = date('Y-m-d H:i:s');
        $sinn->values['mps_time_edit'] = date('Y-m-d H:i:s');
        $sinn->values['mps_ipad'] = $_SERVER['REMOTE_ADDR'];

        $sinn->save();

        $remember_time = time() + 60*60*24*7;

        if (isset($_POST["remember"])) {
          setcookie("email", $eml, $remember_time, "/");
          setcookie("remember", "yes", $remember_time, "/");
        }

        $_SESSION['mps_token'] = $sinn->get_id_value();
        header ("Location: page_home.php");
        exit;
        break;

    default:
      // No incoming task gives empty form

}



// Common Page Top for all Application Pages

?>
<br><br>
<? if ($message) { ?>
  <div style="color:red;"><?=$message?></div><br>
<? } ?>

<form name="form1" action="index.php" method="POST">
   <input type="hidden" name="task" value="save">
   <input type="hidden" name="mps_token" value="<?= $mps_token ?>">
   <br>Log in or <a href="page_account.php">create a new account</a>.<br>
   <br>
   Email: <input type="email" name="email" style="border: 2px inset #a0a0a0;" value="<? echo htmlspecialchars($remembered_email); ?>">
   <br>
   <br>
   Password: <input type="password" name="password" style="border: 2px inset #a0a0a0;">
   <br>
   <br>
   <input type="checkbox" name="remember" checked="yes" value="yes"> Remember me on this device
   <br>
   <br>
   <br>
   <button type="submit"> Submit </button>
   <br>
   <br>
   <br>
   <br>

</form>



<?
// Common Page Top for all Application Pages
require 'ssi_bottom.php';
?>
