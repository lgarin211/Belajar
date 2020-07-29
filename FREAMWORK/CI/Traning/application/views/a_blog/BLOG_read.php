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
        <h2 style="margin-top:0px">BLOG Read</h2>
        <table class="table">
	    <tr><td>LINK MATERI</td><td><?php echo $LINK_MATERI; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('a_blog') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
