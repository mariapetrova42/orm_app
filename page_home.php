<?
$navbar=true;
$security = "true";
require 'ssi_top.php';

?>

<br><br><br>
<h2>See your account details below: </h2>
<br>
  <center>

  <table width="" border="1" cellspacing="0" cellpadding="5">
  <tr  valign="top">
      <td style="background-color: #e2e0e8; text-align: center;">Name</td>
      <td style="background-color: #e2e0e8; text-align: center;">Email</td>
      <td style="background-color: #e2e0e8; text-align: center;">Date Created</td>
      <td style="background-color: #e2e0e8; text-align: center;">IP Address</td>
      <td style="background-color: #e2e0e8; text-align: center;">API Access Token</td>
   </tr>
   <tr  valign="top">
      <td><?= $acct->values['mpa_name']; ?></td>
      <td><?= $acct->values['mpa_email']; ?></td>
      <td><?= $acct->values['mpa_timestamp']; ?></td>
      <td><?= $acct->values['mpa_ipad']; ?></td>
      <td><?= $acct->values['mpa_apik']; ?></td>
   </tr>

 </table></center>

 <br><br><br>

<center>
  <table><th margin="30px;" padding="15px;"style="font-size: 21px;" ><a href="api.php">Visit API</a></th></table>
<br><br><br>
<table width="300px;" margin="17px;">
  <th margin="30px;"> Actions </th>
  <tr><td style="text-align: center;">
    <a href="page_account.php">Edit Account</a>
  </td></tr>
  <tr><td style="text-align: center;">
    <a href="page_api_stats.php">API Hits</a>
  </td></tr>
  <tr><td style="text-align: center;">
    <a href="page_history.php">Sign In History</a>
  </td></tr>
</table>
<br><br>
</center>



 <br><br><br><br>


<?
// Common Page Top for all Application Pages
require 'ssi_bottom.php';
?>
