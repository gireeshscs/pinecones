<!doctype html>
<html>
  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <meta name="viewport" content="width=device-width; initial-scale=1.0;"/>
    <?php print $styles; ?>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'/>
    <?php print $scripts; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        startRotator('#hero_image ul');
      });
      function rotateBanners(elem) {
        var active = $(elem + ' li.active');
        var next = active.next();
        if(next.length == 0) next = $(elem + ' li:first');
        active.removeClass('active').fadeOut(1000);
        next.addClass('active').fadeIn(3000);
      }
      function prepareRotator(elem) {
        $(elem + ' li').fadeOut(0);
        $(elem + ' li:first').fadeIn(0).addClass('active');
      }
      function startRotator(elem) {
        prepareRotator(elem);
        setInterval("rotateBanners('" + elem + "')", 10000);
      }
    </script>   
  </head>
  <body>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
  </body>
</html>