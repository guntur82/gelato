<?php
include "security-Pelayan.php";
include "header.php";
include "menu-$level.php";
include "topbar.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Pesanan</h1>
  <?php
  $faktur = mysqli_query($conn, "SELECT * FROM meja WHERE status_nota=1");
  while ($nota = mysqli_fetch_array($faktur)) {
    $no_meja = $nota['no_meja'];
  ?>
    <div class="card mb-3 col-lg-3">
      <h1 class="h3 mb-2 text-gray-800">Nota Meja No <?= $nota['no_meja']; ?></h1>
      <a href="logout-pelanggan.php?no=<?= $no_meja; ?>&kd=2" class="btn btn-info">Accept</a>
    </div>
    <?php }
  $query = mysqli_query($conn, "SELECT * FROM meja WHERE status_meja=1");
  while ($no = mysqli_fetch_array($query)) {
    $no_meja = $no['no_meja'];
    $query2 = mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN makanan WHERE pesanan.id_makanan = makanan.id_makanan AND no_meja='$no_meja' AND status_makanan=0 AND status_pesanan=0");
    $cek = mysqli_num_rows($query2);
    if ($cek > 0) {
    ?>
      <div class="card mb-3 col-lg-9">
        <h1 class="h3 mb-2 text-gray-800">Pesanan Meja <?= $no['no_meja']; ?></h1>
        <table class="table table-borderless fa-fw">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Makanan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            while ($data = mysqli_fetch_array($query2)) {
            ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $data['nama_makanan']; ?></td>
                <td><?= $data['jumlah_makanan']; ?></td>
                <td>
                  <?php
                  $nama_makanan = $data['nama_makanan'];
                  $cek = mysqli_query($conn, "SELECT * FROM makanan INNER JOIN bahan_baku INNER JOIN bahan WHERE makanan.id_makanan = bahan_baku.id_makanan AND bahan_baku.id_bahan=bahan.id_bahan AND nama_makanan='$nama_makanan' AND bahan.stok < 10");
                  $bahan = mysqli_num_rows($cek);
                  if ($bahan > 0) { ?>
                    <a href="proses-hapuspesanan.php?kd=2&no=<?= $data['no_meja'] ?>&id=<?= $data['id_makanan']; ?>" class="btn btn-danger">Cancel</a>
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <div class="alert alert-danger" role="alert">
                    Bahan baku yang kurang
                    <?php
                    $a = 1;
                    while ($sample = mysqli_fetch_array($cek)) {
                      echo $sample['bahan_baku'];
                      if ($bahan > $a) {
                        echo ",";
                      }
                      $a++;
                    } ?>
                    untuk membuat
                    <?= $data['nama_makanan']; ?>
                  </div>
                </td>
              <?php
                  } else { ?>
                <a href="proses-accpesanan.php?no=<?= $data['no_meja'] ?>&id=<?= $data['id_makanan']; ?>&jml=<?= $data['jumlah_makanan']; ?>&sm=<?= $data['status_makanan'] ?>&sp=<?= $data['status_pesanan']; ?>&nm=<?= $data['nama_pelanggan']; ?>" class="btn btn-success">Accept</a>
              <?php
                  }
              ?>
              </tr>
              </tr>
            <?php $i++;
            } ?>
          </tbody>
        </table>
      </div>
    <?php } ?>
  <?php } ?>
  <!-- pesan 2 -->
  <?php
  $querynd = mysqli_query($conn, "SELECT * FROM meja WHERE status_meja=1");
  while ($nond = mysqli_fetch_array($querynd)) {
    $no_mejand = $nond['no_meja'];
    $query2nd = mysqli_query($conn, "SELECT * FROM pesanan INNER JOIN makanan WHERE pesanan.id_makanan = makanan.id_makanan AND no_meja='$no_mejand' AND status_makanan=1 AND status_pesanan=1");
    $ceknd = mysqli_num_rows($query2nd);
    if ($ceknd > 0) { ?>
      <div class="card mb-3 col-lg-9">
        <h1 class="h3 mb-2 text-gray-800">Pesanan Meja <?= $nond['no_meja']; ?> Ready</h1>
        <table class="table table-borderless fa-fw">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Makanan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            while ($datand = mysqli_fetch_array($query2nd)) {
            ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $datand['nama_makanan']; ?></td>
                <td><?= $datand['jumlah_makanan']; ?></td>
                <td>
                  <a href="proses-accpesanan.php?no=<?= $datand['no_meja'] ?>&id=<?= $datand['id_makanan']; ?>&jml=<?= $datand['jumlah_makanan']; ?>&sm=<?= $datand['status_makanan'] ?>&sp=<?= $datand['status_pesanan']; ?>&nm=<?= $datand['nama_pelanggan']; ?>" class="btn btn-success">Masakan Siap</a>
                </td>
              </tr>
            <?php $i++;
            } ?>
          </tbody>
        </table>
      </div>
    <?php } ?>
  <?php } ?>
</div>
<!-- /.container-fluid -->
<?php include "footer.php" ?>