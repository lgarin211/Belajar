<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">USER Read</h2>
        <table class="table">
	    <tr><td>NAMA USER</td><td><?php echo $NAMA_USER; ?></td></tr>
	    <tr><td>EMAIL USER</td><td><?php echo $EMAIL_USER; ?></td></tr>
	    <tr><td>PASWD USER</td><td><?php echo $PASWD_USER; ?></td></tr>
	    <tr><td>ROLE ID</td><td><?php echo $ROLE_ID; ?></td></tr>
	    <tr><td>ID TRAINS</td><td><?php echo $ID_TRAINS; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>