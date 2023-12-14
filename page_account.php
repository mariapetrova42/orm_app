<?
require 'init.php'; // database connection, etc
session_start();

if (isset($_SESSION['mps_token'])) {
  $task = "edit";
  $mps_token = $_SESSION['mps_token'];
  $sin = new signins();
  $sin->load($mps_token, 'mps_token');
  $mpa_id = $sin->values['mps_mpa_id'];
  $acct = new accounts();
  $acct->load($mpa_id, 'mpa_id');
} else {
  $task= "save";

}

// All the states from the database table in proper format to pass to  lib::menu_from_assoc_array()
//$states = states::get_states_assoc_array();
//email verification
$email_regex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";

switch ($task) {
    case 'save':
        // Save the form data then transfer to the listing page
        // Static Method - don't need new people object.
        //$accts = new accounts();
        $accts = new accounts();
        $sinn = new signins();
        $accts->load_from_form_submit();

         // Some simple validation.
        if ( ! trim($accts->values['mpa_name']) || !trim($accts->values['mpa_email']) || !trim($accts->values['mpa_password']) ) {
          $message = "You must fill out all fields.";
          break; // fall back to form without saving
        }

        if ( preg_match($email_regex, $accts->values['mpa_email']) == 0) { //this may still be incorrect, make sure you check later
           $message = "You must provide a valid email";
           break; // fall back to form without saving
        }

        if ( strlen(trim($accts->values['mpa_name'])) < 2) {
           $message = "Name must be at least 2 characters";
           break; // fall back to form without saving
        }

        if ( strlen(trim($accts->values['mpa_password'])) < 5) {
           $message = "Password must be at least 5 characters";
           break; // fall back to form without saving
        }

        $acct2 = new accounts();
        $acct2->load(trim($accts->values['mpa_email']) ,'mpa_email');

        if ( trim($acct2->values['mpa_email']) ) {
           $message = "This email is already in use.";
           break; // fall back to form without saving
        }

        if ( trim($accts->values['mpa_password']) != trim($get_post['ver_password']) ) {
           $message = "Passwords must match.";
           break; // fall back to form without saving
        }

        $accts->values['mpa_timestamp'] = date('Y-m-d H:i:s');
        $accts->values['mpa_ipad'] = $_SERVER['REMOTE_ADDR'];

        $password = $accts->values['mpa_password'];
        $accts->values['mpa_password'] = hash('sha256', $password);

        $eml = $accts->values['mpa_email'];
        $tmsp = time();
        $accts->values['mpa_apik'] = hash('md5', $tmsp . $eml );



        // Save the contents of the object to the database.
        $accts->save();

        $apik = hash('md5', $eml . $tmsp);
        $sinn->set_id_value($apik);
        $sinn->values['mps_mpa_id'] = $accts->get_id_value();
        $sinn->values['mps_time_init'] = date('Y-m-d H:i:s');
        $sinn->values['mps_time_edit'] = $sinn->values['mps_time_init'];
        $sinn->values['mps_ipad'] = $_SERVER['REMOTE_ADDR'];
        $sinn->save();

        //$acct2->delete();
        $mpa_id = $accts->get_id_value();
        $_SESSION['mps_token'] = $sinn->get_id_value();
        header ("Location: page_home.php");
        exit;
        break;

    ///////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////
    case 'edit':
        //we are signed in with $sin and have $acct loaded up by mpa_id
        $sin->values['mps_time_edit'] = date('Y-m-d H:i:s');
        $sin->update();

        $accts = new accounts();
        $accts->load_from_form_submit();

        // Some simple validation.
        if ( ! trim($accts->values['mpa_name']) || !trim($accts->values['mpa_email']) || !trim($accts->values['mpa_password']) ) {
          $message = "You must have all fields filled out.";
          break; // fall back to form without saving
        }

        if ( preg_match($email_regex, $accts->values['mpa_email']) == 0) { //this may still be incorrect, make sure you check later
            $message = "Your email must be valid.";
            break; // fall back to form without saving
          }

        if ( strlen(trim($accts->values['mpa_name'])) < 2) {
            $message = "Name must be at least 2 characters";
            break; // fall back to form without saving
        }

        $acct2 = new accounts();
        $acct2->load(trim($accts->values['mpa_email']) ,'mpa_email');

        if ( trim($acct2->values['mpa_email']) && ($acct2->values['mpa_email'] != $acct->values['mpa_email'])) {
           $message = "This email is not available.";
           break; // fall back to form without saving
        }

        if (hash('sha256', $accts->values['mpa_password']) != $acct->values['mpa_password'] ) {
           $message = "Password incorrect. Changes unsaved.";
           break; // fall back to form without saving
        }

        $acct->values['mpa_name'] = $accts->values['mpa_name'];
        $acct->values['mpa_email'] = $accts->values['mpa_email'];

        $acct->update();
        header ("Location: page_home.php");
        exit;
        break;

    ///////////////////////////////////////////////////////////////////
    default:
      // No incoming task gives empty form

}

?>

<!-- All the form element names (except task) match the DB table names
https://dev.to/incoderweb/password-strength-checker-in-html-css-and-javascript-1oh4
reference for pawword checker^^^-->

<form name="form1" action="page_account.php" method="POST">
   <input type="hidden" name="mpa_id" value="<?= $acct->values['mpa_id'] ?>">
   <? if (isset($_SESSION['mps_token'])) {
     $task = "edit";
     $message = "Update your account information here. Enter password to save changes.<br>";
     $showpass = false;
     $security = true;
     $navbar = true;
     require 'ssi_top.php';
   } else {
     $task= "save";
     $message = "Create your account here: <br>";
     $showpass=true;
     $security = false;
     $navbar = false;
     require 'ssi_top.php';

   } ?>

   <? if ($message) { ?>
     <div style="color:red;"><?=$message?></div><br>
   <? } ?>

   Name: <input type="text" name="mpa_name" style="border: 2px inset #a0a0a0;" value="<?= $acct->values['mpa_name'] ?>">
   <br><br>
   Email: <input type="email" name="mpa_email" style="border: 2px inset #a0a0a0;" value="<?= $acct->values['mpa_email'] ?>" >
   <br>
   <? if($showpass): ?>
   <br>Password:
   <span class="form-group">
       <input type="password" id="passwordChecker" name="ver_password">
       <span class='passTypeToggle' title="Show"><i class="fa-solid fa-eye"></i></span>
   </span><br>
   <div class="message"></div>
 <? endif; ?><br>
   Verify Password: <input type="password" name="mpa_password" style="border: 2px inset #a0a0a0;">
   <br><br>

   <br><br>
   <button type="submit"> Submit </button>

</form>

<script>
let input = document.querySelector('#passwordChecker')
let formGroup = document.querySelector('.form-group')
let message = document.querySelector('.message')
let passTypeToggle = document.querySelector('.passTypeToggle')
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')

document.body.addEventListener('click', function (e) {
    if (input.contains(e.target)) {
        formGroup.classList.add('focus')
    } else {
        if(input.value == ''){
            formGroup.classList.remove('focus')
        }
    }
});

let checkPasswordStrength = (password) => {
    let message = {}

    if(strongPassword.test(password)) {
        message = {
            strength : 'strong'
        }
    } else if(mediumPassword.test(password)) {
        message = {
            strength : 'medium'
        }
    } else {
        message = {
            strength : 'weak'
        }
    }
    return message
}

input.addEventListener('keyup', e => {
    let password = e.target.value

    password != "" ? passTypeToggle.style.display = 'block' : passTypeToggle.style.display = 'none'

    if(password == ''){
        message.classList.remove('weak')
        message.classList.remove('medium')
        message.classList.remove('strong')

        formGroup.classList.remove('weak')
        formGroup.classList.remove('medium')
        formGroup.classList.remove('strong')

        message.innerHTML = ''
    }else{
        let result = checkPasswordStrength(password)

        if(result.strength == 'weak'){
            message.classList.remove('medium')
            message.classList.remove('strong')
            formGroup.classList.remove('medium')
            formGroup.classList.remove('strong')
            message.classList.add('weak')
            formGroup.classList.add('weak')
            message.innerHTML = 'Password strength: WEAK'
        }else if(result.strength == 'medium'){
            formGroup.classList.remove('weak')
            formGroup.classList.remove('strong')
            message.classList.remove('weak')
            message.classList.remove('strong')
            message.classList.add('medium')
            formGroup.classList.add('medium')
            message.innerHTML = 'Password strength: MID'
        }else{
            formGroup.classList.remove('weak')
            formGroup.classList.remove('medium')
            message.classList.remove('weak')
            message.classList.remove('medium')
            message.classList.add('strong')
            formGroup.classList.add('strong')
            message.innerHTML = 'Password strength: STRONG'
        }
    }

})

passTypeToggle.addEventListener('click', e => {
    input.getAttribute('type') == 'password' ? input.setAttribute('type', 'text') : input.setAttribute('type', 'password')
    input.getAttribute('type') == 'password' ? passTypeToggle.setAttribute('title', 'Show') : passTypeToggle.setAttribute('title', 'Hide')
    document.querySelector('.passTypeToggle i').classList.toggle('fa-eye')
    document.querySelector('.passTypeToggle i').classList.toggle('fa-eye-slash')
})</script>

<?
// Common Page Top for all Application Pages
require 'ssi_bottom.php';
?>
