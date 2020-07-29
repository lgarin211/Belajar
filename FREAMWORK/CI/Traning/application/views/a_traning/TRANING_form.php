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
        <h2 style="margin-top:0px">TRANING <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">TOPIK TRANING <?php echo form_error('TOPIK_TRANING') ?></label>
            <input type="text" class="form-control" name="TOPIK_TRANING" id="TOPIK_TRANING" placeholder="TOPIK TRANING" value="<?php echo $TOPIK_TRANING; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID BLOG <?php echo form_error('ID_BLOG') ?></label>
            <input type="text" class="form-control" name="ID_BLOG" id="ID_BLOG" placeholder="ID BLOG" value="<?php echo $ID_BLOG; ?>" />
        </div>
	    <input type="hidden" name="ID_TRANING" value="<?php echo $ID_TRANING; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('a_traning') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
