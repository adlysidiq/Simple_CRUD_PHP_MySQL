<?php   
    include '../config/koneksi.php';

    $db = new Database();
    if(isset($_GET['id'])) {
        $id = ($_GET['id']);
        $data = $db->getById($id);
    }

?>
<html lang="id">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Biografi</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
     <link rel="stylesheet" href="../asset/css/style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
     <div class=" container my-2">
          <nav class="navbar navbar-expand-lg py-4 rounded">
               <div class="container-fluid">
                    <a class="navbar-brand" href="#"><i class="bi bi-table p-2"></i>Update Biografi</a>
               </div>
          </nav>
     </div>
     <div class="container w-50 bg-light py-3 px-5 shadow rounded my-5">
          <form method="post" action="../config/update.php">
               <div class="mb-3">
                    <label for="id" class="form-table p-2">ID </label>
                    <input type="text" class="form-control" name="id_display" value="<?=$data['id']?>" readonly>
                    <input type="hidden" name="id" value="<?=$data['id']?>">
               </div>
               <div class="mb-3">
                    <label for="nama" class="form-table p-2">Nama </label>
                    <input type="text" class="form-control" name="nama" value="<?=$data['nama_lengkap']?>" autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <label for="tanggallahir" class="form-table p-2">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggallahir" value="<?=$data['tanggal_lahir']?>" required>
               </div>
               <div class="mb-3">
                    <label for="jeniskelamin" class="form-table p-2">Jenis Kelamin</label>
                    <select name="jeniskelamin" class="form-select" value="<?=$data['jenis_kelamin']?>" required>
                         <option value="Laki-laki">Laki-laki</option>
                         <option value="Perempuan">Perempuan</option>
                    </select>
               </div>
               <div class="mb-3">
                    <label for="email" class="form-table p-2">Email</label>
                    <input type="email" class="form-control" name="email" value="<?=$data['email']?>"  autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <label for="telepon" class="form-table p-2">Nomor Telepon</label>
                    <input type="text" class="form-control no_hp" name="telepon" max="12" value="<?=$data['telepon']?>" autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <label for="jalan" class="form-table p-2">Nama Jalan</label>
                    <input type="text" class="form-control" name="jalan" value="<?=$data['jalan']?>" autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <label for="kodepos" class="form-table p-2">Kode Pos</label>
                    <input type="text" class="form-control pos" name="kodepos" value="<?=$data['kode_pos']?>" autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <label for="desa" class="form-table p-2">Desa</label>
                    <input type="text" class="form-control" name="desa" value="<?=$data['desa']?>" autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <label for="kecamatan" class="form-table p-2">Kecamatan</label>
                    <input type="text" class="form-control" name="kecamatan" value="<?=$data['kecamatan']?>" autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <label for="kota" class="form-table p-2">Kota</label>
                    <input type="text" class="form-control" name="kota" value="<?=$data['kota']?>" autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <label for="provinsi" class="form-table p-2 ">Provinsi</label>
                    <input type="text" class="form-control" name="provinsi" value="<?=$data['provinsi']?>" autocomplete="off" required>
               </div>
               <div class="mb-3">
                    <button class="btn btn-lg px-5 btn-primary" name="kirim" value="kirim" type="submit">Kirim</button>
               </div>
          </form>
     </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <script>
          $(document).ready(function(){
          $( '.no_hp' ).mask('0000-0000-0000');
          $('.pos').mask('00000')
          })
     </script>

</body>
