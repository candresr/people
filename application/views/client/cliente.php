<!DOCTYPE html>
<html>
<head>
	<title>People</title>
</head>
<body>
<?php echo $this->session->userdata('email');?>
<form action='<?php echo base_url('/index.php/web_home/logout');?>'>
	<input type="submit" name="cerrar sesion" id="cerrar sesion" value="cerrar sesion">
</form>
</body>
</html>