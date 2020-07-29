<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WELCOME</title>
</head>
<body>
	<h1>Welcome To The Traning</h1>
	<div class="billing_tabs_text_part">
	<?php foreach ($user_data as $row) {?>
                  <p><?php echo $row->ID_USER; ?>|
									<?php echo $row->NAMA_USER; ?>|
									<?php echo $row->EMAIL_USER; ?>|
									<?php echo $row->ROLE_ID; ?>|
									<?php echo $row->ID_TRAINS; ?>
									<?php echo $row->PASWD_USER; }?></p>
                </div>
<a href="<?= base_url() ?>run/form_view">ADD NEW MEMBER</a>
<a href="<?= base_url() ?>run/ADMIN">ADMIN VIEW</a>

							</body>
</html>
