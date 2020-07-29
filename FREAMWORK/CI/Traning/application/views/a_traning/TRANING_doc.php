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
        <h2>TRANING List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>TOPIK TRANING</th>
		<th>ID BLOG</th>
		
            </tr><?php
            foreach ($a_traning_data as $a_traning)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $a_traning->TOPIK_TRANING ?></td>
		      <td><?php echo $a_traning->ID_BLOG ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
