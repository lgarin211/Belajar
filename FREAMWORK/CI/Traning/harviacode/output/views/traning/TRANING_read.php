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
        <h2 style="margin-top:0px">TRANING Read</h2>
        <table class="table">
	    <tr><td>TOPIK TRANING</td><td><?php echo $TOPIK_TRANING; ?></td></tr>
	    <tr><td>ID BLOG</td><td><?php echo $ID_BLOG; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('traning') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
