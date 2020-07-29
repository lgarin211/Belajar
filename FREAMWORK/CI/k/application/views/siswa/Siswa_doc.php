<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
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
        <h2>Siswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nisn</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Jurusan</th>
		<th>Profile</th>
		<th>Paswd</th>
		<th>Acc</th>
		
            </tr><?php
            foreach ($siswa_data as $siswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $siswa->nisn ?></td>
		      <td><?php echo $siswa->nama ?></td>
		      <td><?php echo $siswa->email ?></td>
		      <td><?php echo $siswa->jurusan ?></td>
		      <td><?php echo $siswa->profile ?></td>
		      <td><?php echo $siswa->paswd ?></td>
		      <td><?php echo $siswa->acc ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>