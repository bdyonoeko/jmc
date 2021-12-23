<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Provinsi</title>
</head>
<body>
  
  <h1 style="text-align: center;">Laporan Jumlah Penduduk Di <?= $detail_provinsi['nama_provinsi']; ?></h1>

  <table width="50%" style="margin-bottom: 20px;">

    <tr>
      <td>Nama Provinsi</td>
      <td>:</td>
      <td><?= $detail_provinsi['nama_provinsi']; ?></td>
    </tr>

    <tr>
      <td>Nama Ibukota</td>
      <td>:</td>
      <td><?= $ibukota == null ? 'Ibukota belum di update' : $ibukota['nama_kabupaten'] ?></td>
    </tr>

    <tr>
      <td>Total Penduduk</td>
      <td>:</td>
      <td><?= $penduduk['jumlah_penduduk'] == null ? 'Total penduduk belum bisa diakumulasi' : $penduduk['jumlah_penduduk']. ' Orang' ?></td>
    </tr>

  </table>

  <table border="1" width="100%">
    
    <thead style="background-color: cadetblue;">
      <tr>
        <th>No</th>
        <th>Nama Kabupaten/Kota</th>
        <th>Jumlah Penduduk</th>
      </tr>
    </thead>

    <tbody style="text-align: center;">
      <?php $no = 1; ?>
      <?php foreach ($daftar_kabupaten as $dk): ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $dk['nama_kabupaten']; ?></td>
          <td><?= $dk['jumlah_penduduk']; ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>

  </table>

</body>
</html>