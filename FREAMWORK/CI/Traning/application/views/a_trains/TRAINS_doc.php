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
        <h2>TRAINS List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ID KELAS</th>
		<th>ID RAPORT</th>
		<th>ID JOB</th>
		
            </tr><?php
            foreach ($a_trains_data as $a_trains)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $a_trains->ID_KELAS ?></td>
		      <td><?php echo $a_trains->ID_RAPORT ?></td>
		      <td><?php echo $a_trains->ID_JOB ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
