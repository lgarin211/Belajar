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
        <h2 style="margin-top:0px">USER <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NAMA USER <?php echo form_error('NAMA_USER') ?></label>
            <input type="text" class="form-control" name="NAMA_USER" id="NAMA_USER" placeholder="NAMA USER" value="<?php echo $NAMA_USER; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">EMAIL USER <?php echo form_error('EMAIL_USER') ?></label>
            <input type="text" class="form-control" name="EMAIL_USER" id="EMAIL_USER" placeholder="EMAIL USER" value="<?php echo $EMAIL_USER; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">PASWD USER <?php echo form_error('PASWD_USER') ?></label>
            <input type="text" class="form-control" name="PASWD_USER" id="PASWD_USER" placeholder="PASWD USER" value="<?php echo $PASWD_USER; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ROLE ID <?php echo form_error('ROLE_ID') ?></label>
            <input type="text" class="form-control" name="ROLE_ID" id="ROLE_ID" placeholder="ROLE ID" value="<?php echo $ROLE_ID; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID TRAINS <?php echo form_error('ID_TRAINS') ?></label>
            <input type="text" class="form-control" name="ID_TRAINS" id="ID_TRAINS" placeholder="ID TRAINS" value="<?php echo $ID_TRAINS; ?>" />
        </div>
	    <input type="hidden" name="ID_USER" value="<?php echo $ID_USER; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
