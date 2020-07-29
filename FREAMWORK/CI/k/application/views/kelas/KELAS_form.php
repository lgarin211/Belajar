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
        <h2 style="margin-top:0px">KELAS <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NAMA KELAS <?php echo form_error('NAMA_KELAS') ?></label>
            <input type="text" class="form-control" name="NAMA_KELAS" id="NAMA_KELAS" placeholder="NAMA KELAS" value="<?php echo $NAMA_KELAS; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">ID TRANING <?php echo form_error('ID_TRANING') ?></label>
            <input type="text" class="form-control" name="ID_TRANING" id="ID_TRANING" placeholder="ID TRANING" value="<?php echo $ID_TRANING; ?>" />
        </div>
	    <input type="hidden" name="ID_KELAS" value="<?php echo $ID_KELAS; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>