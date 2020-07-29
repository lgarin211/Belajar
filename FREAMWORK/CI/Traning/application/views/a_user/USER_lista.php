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
        <h2 style="margin-top:0px">USER List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('a_user/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('a_user/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('a_user'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NAMA USER</th>
		<th>EMAIL USER</th>
		<th>PASWD USER</th>
		<th>ROLE ID</th>
		<th>ID TRAINS</th>
		<th>Action</th>
            </tr><?php
            foreach ($a_user_data as $a_user)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $a_user->NAMA_USER ?></td>
			<td><?php echo $a_user->EMAIL_USER ?></td>
			<td><?php echo $a_user->PASWD_USER ?></td>
			<td><?php echo $a_user->ROLE_ID ?></td>
			<td><?php echo $a_user->ID_TRAINS ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('a_user/read/'.$a_user->ID_USER),'Read'); 
				echo ' | '; 
				echo anchor(site_url('a_user/update/'.$a_user->ID_USER),'Update'); 
				echo ' | '; 
				echo anchor(site_url('a_user/delete/'.$a_user->ID_USER),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('a_user/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('a_user/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
