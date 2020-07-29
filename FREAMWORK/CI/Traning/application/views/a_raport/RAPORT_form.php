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
        <h2 style="margin-top:0px">RAPORT <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">ID KELAS <?php echo form_error('ID_KELAS') ?></label>
            <input type="text" class="form-control" name="ID_KELAS" id="ID_KELAS" placeholder="ID KELAS" value="<?php echo $ID_KELAS; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID JOB <?php echo form_error('ID_JOB') ?></label>
            <input type="text" class="form-control" name="ID_JOB" id="ID_JOB" placeholder="ID JOB" value="<?php echo $ID_JOB; ?>" />
        </div>
	    <input type="hidden" name="ID_RAPORT" value="<?php echo $ID_RAPORT; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('a_raport') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
