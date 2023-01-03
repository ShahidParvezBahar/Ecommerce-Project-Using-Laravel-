<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sample Form</title>
</head>
<body>
	<?php

		echo Form::open(array('url'=>'foo/bar'));
			echo Form::text('username','Username');
			echo '<br>';
			echo Form::text('email','exampl@gmail.com');
			echo '<br>';
			echo Form::password('password');
			echo '<br>';
			echo Form::checkbox('name','value');
			echo '<br>';
			echo Form::radio('sex','male');
			echo Form::radio('sex','female');
			echo '<br>';
			echo Form::file('image');
			echo '<br>';
			echo Form::select('size',array('L'=>'Large','S'=>'Small'));
			echo '<br>';
			echo Form::submit('Click Here');
			echo Form::close();
	?>

</body>
</html>