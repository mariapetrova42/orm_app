<? $mpa_email = $acct->values['mpa_email'];
   $mpa_name = $acct->values['mpa_name'];?>

<table width="100%;" margin="0" border:"0">
  <tr>
    <td width="25%" style="text-align:center;" border:"0">
      <a href="page_home.php">Home</a>
    </td>
    <td width="25%" style="text-align:center;" border:"0">
      <a href="page_account.php">Edit Account</a>
    </td>
    <td width="25%" style="text-align:center;" border:"0">
      <a href="page_api_stats.php">API Hits</a>
    </td>
    <td width="25%" style="text-align:center;" border:"0">
      <a href="page_history.php">Sign In History</a>
    </td>
  </tr>
  <tr>
    <td style="text-align:center;"><?= $mpa_email?></td>
    <td></td>
    <td></td>
    <td style="text-align:center;"><a href="page_signout.php"> Sign Out <?= $mpa_name?></a></td>
  </tr>
</table>
