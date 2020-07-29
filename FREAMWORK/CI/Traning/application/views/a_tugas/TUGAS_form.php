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
        <h2 style="margin-top:0px">TUGAS <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">DATE LINE <?php echo form_error('DATE_LINE') ?></label>
            <input type="text" class="form-control" name="DATE_LINE" id="DATE_LINE" placeholder="DATE LINE" value="<?php echo $DATE_LINE; ?>" />
        </div>
	    <input type="hidden" name="ID_TUGAS" value="<?php echo $ID_TUGAS; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('a_tugas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
