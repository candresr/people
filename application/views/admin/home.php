<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
		<title>People</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/styles/jquery-ui.css" />
		<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/styles/jquery.datetimepicker.css" />
		<script src="<?=base_url()?>assets/js/jquery-1.9.1.js"></script>
		<script src="<?=base_url()?>assets/js/jquery-ui.js"></script>
		<script src="<?=base_url()?>assets/js/jquery.datetimepicker.min.js"></script>
		<script src="<?=base_url()?>assets/js/jquery.datetimepicker.full.js"></script>

		<script type="text/javascript" src="http://www.google.com/jsapi"></script>
		<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
		<script>
		$(function() {
			$( ".datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy'
			});

			$('.datetimepicker').datetimepicker({
				datepicker:false,
				format:'H:i',
				step:5
			});
			<?php	echo (isset($ajax))? $ajax : '';?>
		});

		</script>

<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}

</style>
</head>
<body>

	<?php
	//$table = ($this->session->userdata("table"))? $this->session->userdata("table") : '';
	$id = $this->session->userdata("users_id");
	if($this->session->userdata("logged_in") == TRUE){?>
			<div align='right'><?php echo $this->session->userdata("email"); ?></div>

				<div style='height:20px;'><?php
				  echo (isset($menu))? $menu : '';
					echo br(2);
					echo (isset($mensaje))? $mensaje : '';
				?>
				</div>
			    <div>
	<?php
			echo (isset($tabs))? $tabs : '';
			echo (isset($validation_errors))? $validation_errors : '';
			echo (isset($form))? $form : '';
			echo (isset($service))? $service : '';
			echo (isset($scheduling))? $scheduling : '';
			echo (isset($search))? $search : '';
			echo (isset($tables))? $tables : '';
			echo (isset($profile))? $profile : '';
	}else{
		echo (isset($warning))? $warning : '';
		$data = array(
		  'name'        => 'email',
		  'id'          => 'email',
		  'autocomplete' => 'off',
		  'value'       => 	'',
		);

		$data2 = array(
		  'name'        => 'password',
		  'id'          => 'password',
		  'value'       => '',
		  'type'	    => 'password',
		);
		echo form_open('admin/verify');
		echo form_input($data);
		echo form_input($data2);
		echo form_submit('botonSubmit', 'Autenticar');
		echo form_close().br(2);
		echo (isset($validation_errors))? $validation_errors : '';
		echo (isset($formWeb))? $formWeb : '';
		echo (isset($content))? $content : '';
	}
	?>
    </div>
</body>

</html>
