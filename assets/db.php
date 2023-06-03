<?php 
    $conn = new mysqli('localhost','root','','mybank');
    define('bankname', 'United Bank',true);
    $uid = '';
    if(isset($_SESSION['userId']))
    $uid = $_SESSION['userId'];
    if(isset($_SESSION['cashId']))
    $uid = $_SESSION['cashId'];
    if(isset($_SESSION['managerId']))
    $uid = $_SESSION['managerId'];
    $userData = [];
    if(!empty($uid)){
      $arrray = $conn->query("select * from useraccounts,branch where id = '{$uid}' AND useraccounts.branch = branch.branchId");
      $userData = $arrray->fetch_assoc();
    }
?>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>