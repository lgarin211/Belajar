<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <a href="https://rachmat.id">coba</a>
  <form method="POST">
    <div class="form-row">
      <div class="col-7">
        <input type="text" class="form-control" name="saran" placeholder="City">
      </div>
      <input type="hidden" name="materi" value="<?= $dd['materi']; ?>">
      <input type="hidden" name="artikel" value="<?= $dd['artikel']; ?>">
      <input type="hidden" name="rule" value="<?= $dd['rule']; ?>">
      <input type="hidden" name="active" value="<?= $dd['active']; ?>">
      <input type="hidden" name="batas" value="<?= $dd['batas']; ?>">
      <input type="hidden" name="user" value="<?= $dd['user']; ?>">
      <input type="hidden" name="idtugas" value="<?= $dd['idtugas']; ?>">
      <input type="hidden" name="jawapan" value="<?= $dd['jawapan']; ?>">
      <div class="col">
        <input type="text" class="form-control" name="nilai" placeholder="State">
      </div>
    </div>
  </form>
</body>

</html>