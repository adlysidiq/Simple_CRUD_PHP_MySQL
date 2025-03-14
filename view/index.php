<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adly</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<body>
    <div class="container my-2">
        <nav class="navbar navbar-expand-lg ">
            <img src="" alt="">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-table p-2"></i></i>Siswa</a>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <a class="nav-link breadcrumb-item"><i class="bi bi-table"></i></a>
                    </ol>

            </div>
    </div>
    </nav>
    </nav>
    </div>


    <div class="container shadow bg-light p-2 rounded">
        <a href="post.php" class="btn btn-primary roundeed"><i class="bi bi-plus-lg p-2"></i>Entry Siswa</a>
    </div>
    <div class="container shadow bg-light p-2 mt-3 rounded">
        <table id="Biodata" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config/koneksi.php';

                $db = new Database();
                $dataList = $db->getAll();

                $no = 1;
                foreach ($dataList as $data): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($data['nama_lengkap']); ?></td>
                        <td><?= htmlspecialchars($data['tanggal_lahir']); ?></td>
                        <td><?= htmlspecialchars($data['jenis_kelamin']); ?></td>
                        <td><?= htmlspecialchars($data['email']); ?></td>
                        <td><?= htmlspecialchars($data['telepon']); ?></td>
                        <td>
                            <?= 'JL.' . htmlspecialchars($data['jalan']) . ", Desa " .
                                htmlspecialchars($data['desa']) . ", Kecamatan " .
                                htmlspecialchars($data['kecamatan']) . ", Kota " .
                                htmlspecialchars($data['kota']) . ", Provinsi " .
                                htmlspecialchars($data['provinsi']); ?>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="update.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="../config/delete.php"
                                    class="btn btn-danger btn-sm delete-btn"
                                    data-id="<?= $data['id'] ?>"
                                    data-name="<?= htmlspecialchars($data['nama_lengkap']) ?>">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus data <strong id="deleteName"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <img src="../public/images/Carlotta_Icon.jpg" alt="">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#Biodata')
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let updateID = null;
            let deleteID = null;
            document.querySelectorAll('.update-btn').forEach(button => {
                updateID = this.getAttribute("data-id");
                document.addEventListener('click', function() {
                    fetch('update.php?id='.updateID, {
                        method: "GET"
                    })
                })
            })


            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    deleteID = this.getAttribute("data-id");
                    let deleteName = this.getAttribute("data-name");
                    document.getElementById("deleteName").innerText = deleteName;
                    let confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDelete'));
                    confirmDeleteModal.show();
                });
            });
            document.getElementById("confirmDeleteBtn").addEventListener("click", function() {
                if (deleteID) {
                    fetch(`../config/delete.php?id=${deleteID}`, {
                            method: "GET",
                        })
                        .then(response => {
                            if (!response.ok) throw new Error("Gagal menghapus data!");
                            return response.text();
                        })
                        .then(() => {
                            alert("Data berhasil dihapus!");
                            location.reload();
                        })
                        .catch(error => {
                            console.error("Gagal menghapus data:", error);
                            alert("Terjadi kesalahan saat menghapus data!");
                        });
                    let modalElement = document.getElementById('confirmDelete');
                    let modalInstance = bootstrap.Modal.getInstance(modalElement);
                    modalInstance.hide();
                }
            });
        });
    </script>
</body>

</html>