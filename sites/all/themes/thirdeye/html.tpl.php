<?php
?>
<!DOCTYPE html>
<html>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:600' rel='stylesheet' type='text/css'>
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<!--[if IE 7]>
  <style type="text/css">
    h1{line-height:17px;}
    .pb_cell h6{line-height:11px;}
  </style>
<![endif]-->
<!--[if lte IE 9]>
  <style type="text/css">
    h1{margin-top: -5px;}
    h2{margin-top: 18px;}
    .nav_second li a { line-height:40px;}
  </style>
<![endif]-->
<?php print $scripts; ?>
</head>
<body>
<?php print $page_top; ?>
<?php print $page; ?>
<?php print $page_bottom; ?>
</body>
</html>