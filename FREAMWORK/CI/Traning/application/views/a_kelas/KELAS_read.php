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
        <h2 style="margin-top:0px">KELAS Read</h2>
        <table class="table">
	    <tr><td>NAMA KELAS</td><td><?php echo $NAMA_KELAS; ?></td></tr>
	    <tr><td>ID TRANING</td><td><?php echo $ID_TRANING; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('a_kelas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
