<!doctype html>
<html>
    <head>

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
        <h2>BLOG List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>LINK MATERI</th>
		
            </tr><?php
            foreach ($a_blog_data as $a_blog) {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $a_blog->LINK_MATERI ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
