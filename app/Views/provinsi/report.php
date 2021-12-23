<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Provinsi</title>
</head>
<body>
  
  <h1 style="text-align: center;">Laporan Jumlah Penduduk Tiap Provinsi</h1>

  <table border="1" width="100%">
    
    <thead style="background-color: cadetblue;">
      <tr>
        <th>No</th>
        <th>Nama Provinsi</th>
        <th>Total Penduduk</th>
      </tr>
    </thead>

    <tbody style="text-align: center;">
      <?php $no = 1; ?>
      <?php foreach ($provinsi as $p): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $p['nama_provinsi']; ?></td>
          <td><?= $p['jumlah_penduduk']; ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>

  </table>

</body>
</html>