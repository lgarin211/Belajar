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
        <h2 style="margin-top:0px">TUGAS Read</h2>
        <table class="table">
	    <tr><td>DATE LINE</td><td><?php echo $DATE_LINE; ?></td></tr>
	    <tr><td>ID JOB</td><td><?php echo $ID_JOB; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('tugas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>