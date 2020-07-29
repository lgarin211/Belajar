<?php
var_dump($id);
?>
<form action="<?=base_url() ?>run/kirim" method="post">
	<h1>NAMA</h1><input type="text" name="NAME_USER" value="">
	<h1>EMAIL</h1><input type="text" name="EMAIL_USER" value="">
	<h1>PASSWORD</h1><input type="text" name="PASWD_USER" value="">
	<h1>ROLE</h1><input type="text" name="ROLE_ID" readonly value="1">
	<h1>TRAINS</h1><input type="text" name="ID_TRAINS" value="<?php echo $id+1;?>">
	<button type="submit">kirim</button>
</form>
