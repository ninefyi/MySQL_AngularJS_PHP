<?php ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../lib/bnc.css" rel="stylesheet">
    <title>BNC Residence</title>
</head>
<body>
<input type="button" onclick="window.location.href='main.php';" value="BACK"><br/>
<form id="frm" name="frm" enctype="multipart/form-data" action="import_action.php" method="post">
    <input type="file" name="file_upload" id="file_upload" />&nbsp;&nbsp;<input type="submit" value="Upload" name="btn_upload" id="btn_upload" />
</form>
</body>
</html>
<?php ob_end_flush();?>