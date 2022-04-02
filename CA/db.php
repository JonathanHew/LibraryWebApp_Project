<html>
	<head>

	</head>
	<body>
		<?php
			echo "<pre>\n";
			$db = mysqli_connect('localhost', 'root', '', 'CA_Books');
			if ($db === False ) die ('Fail Message');
		?>
	</body>
</html>