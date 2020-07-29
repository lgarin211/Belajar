<!doctype html>
<html>
    <head>
        <title>ADMIN</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>USER List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NAMA USER</th>
		<th>EMAIL USER</th>
		<th>PASWD USER</th>
		<th>ROLE ID</th>
		<th>ID TRAINS</th>
		
            </tr><?php
            foreach ($a_user_data as $a_user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $a_user->NAMA_USER ?></td>
		      <td><?php echo $a_user->EMAIL_USER ?></td>
		      <td><?php echo $a_user->PASWD_USER ?></td>
		      <td><?php echo $a_user->ROLE_ID ?></td>
		      <td><?php echo $a_user->ID_TRAINS ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
