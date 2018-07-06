<?php session_start();
if(isset($_GET['regis'])){
  $userId = $_GET['regis'];
}
  
//include('Connections/dbnurse.php'); ?>
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=1;">
  <title>ลงทะเบียนโรงพยาบาลร้อยเอ็ด</title>
  <link rel="shortcut icon" href="jquerymobile/demos/DrawIt.ico">
  <link rel="stylesheet"  href="jquerymobile/demos/css/themes/default/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" href="jquerymobile/demos/_assets/css/jqm-demos.css">
  <script src="jquerymobile/demos/js/jquery.js"></script>
  <script src="jquerymobile/demos/_assets/js/index.js"></script>
  <script src="jquerymobile/demos/js/jquery.mobile-1.4.5.min.js"></script>
  <head>
<script type="text/javascript">

function dofo() {
document.login.lineid.focus();
}

</script>
</head> 
<body onLoad=dofo()><center>
<?php

?>
<br>
<center><br><img src="logo.png" alt="โลโก้" height="80" width="80" >
  <h2><font color ="green" >โรงพยาบาลร้อยเอ็ด</h2>
<?php //echo "สำนักงานปลัดกระทรวงสาธารณสุข"; ?></font>
<h2><font color=" #009900">ลงทะเบียนแจ้งเตือนเงินเดือนบุคคลากร<br>ผ่าน LINE@</font></h2>
 <form method="POST" action="index2.php" name=login  data-ajax="false" autocomplete="off" >
<table border="0" width =95%>       
    <tr>
       <td >
          <label>
          <font color=" #009900"> เลขบัตรประชาชน 13 หลัก </font><font color="red">*</font>
          </label>
          <input type="text"  name="line_id"  placeholder="เลขบัตรประชาชน 13 หลัก" required  data-clear-btn="false" value=""/>
      </td>
    </tr>
    <tr>
        <td >  
          <label>
            <font color=" #009900"> ชื่อ-สกุล</font><font color="red"> </font><font color="red">*</font>
          </label>
          <input type="text"  name="pname"  placeholder="ชื่อ-สกุล" required  data-clear-btn="false" value="" />
        </td>
    </tr>
    <tr>
        <td >
          <font color=" #009900">
            <input type="hidden" name="userId" value="<?= $userId ?>">
              <input class="submit"  type="submit"  name="submit" value="ตกลง" data-role="button" data-theme="b" />
          </font>
        </td>
        </tr>
</table>
      </form>
</center>
