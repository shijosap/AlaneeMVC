<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<base href="<?php echo $this->rootPath; ?>">
<title><?php echo $this->pageTitle; ?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/icon">
<link rel="icon" href="favicon.ico" type="image/icon">
<script type="text/javascript" src="<?php echo $this->javascript."jquery.min.js";?>"></script>
<script type="text/javascript" src="<?php echo $this->javascript."prettify.js";?>"></script>
<?php echo $this->getAllJavascript(); ?>
<link href="<?php echo $this->css."prettify.css";?>" rel="stylesheet" type="text/css" />
<?php echo $this->getAllCss(); ?>
</head>
<body>
	<?php
	$this->view();
	?>
</body>
</html>