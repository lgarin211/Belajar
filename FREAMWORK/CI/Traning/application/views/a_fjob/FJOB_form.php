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
        <h2 style="margin-top:0px">FJOB <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">ID TUGAS <?php echo form_error('ID_TUGAS') ?></label>
            <input type="text" class="form-control" name="ID_TUGAS" id="ID_TUGAS" placeholder="ID TUGAS" value="<?php echo $ID_TUGAS; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">AT TIME <?php echo form_error('AT_TIME') ?></label>
            <input type="text" class="form-control" name="AT_TIME" id="AT_TIME" placeholder="AT TIME" value="<?php echo $AT_TIME; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">SCRORE <?php echo form_error('SCRORE') ?></label>
            <input type="text" class="form-control" name="SCRORE" id="SCRORE" placeholder="SCRORE" value="<?php echo $SCRORE; ?>" />
        </div>
	    <input type="hidden" name="ID_JOB" value="<?php echo $ID_JOB; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('a_fjob') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
