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
        <h2>FJOB List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>ID TUGAS</th>
		<th>AT TIME</th>
		<th>SCRORE</th>
		
            </tr><?php
            foreach ($a_fjob_data as $a_fjob)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $a_fjob->ID_TUGAS ?></td>
		      <td><?php echo $a_fjob->AT_TIME ?></td>
		      <td><?php echo $a_fjob->SCRORE ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
