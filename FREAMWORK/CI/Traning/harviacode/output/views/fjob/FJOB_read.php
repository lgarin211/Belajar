<!doctype html>
<html>
    <head>
        <title>ADMIN</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">FJOB Read</h2>
        <table class="table">
	    <tr><td>ID TUGAS</td><td><?php echo $ID_TUGAS; ?></td></tr>
	    <tr><td>AT TIME</td><td><?php echo $AT_TIME; ?></td></tr>
	    <tr><td>SCRORE</td><td><?php echo $SCRORE; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('fjob') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
