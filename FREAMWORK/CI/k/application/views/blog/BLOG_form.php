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
        <h2 style="margin-top:0px">BLOG <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">LINK MATERI <?php echo form_error('LINK_MATERI') ?></label>
            <input type="text" class="form-control" name="LINK_MATERI" id="LINK_MATERI" placeholder="LINK MATERI" value="<?php echo $LINK_MATERI; ?>" />
        </div>
	    <input type="hidden" name="ID_BLOG" value="<?php echo $ID_BLOG; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('blog') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>