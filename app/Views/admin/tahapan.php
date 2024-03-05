<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url() ?>css/admin/admin-tahapan.css">
<!-- Rest of your layout content -->
<br>
<?php
$backgroundColorClass = ($status == "selesai") ? "green" : "red";
?>
<div class="header <?php echo $backgroundColorClass; ?>">
    <?php echo $status; ?>
</div>
<div class="content">
    <div class="row">
        <h1><b>
                <?= $nama_project ?>
            </b></h1><br>
        <h6><b>NO PO:</b>
            <?= $no_po ?>
        </h6>
        <h6><b>Tanggal RFS:</b>
            <?= date('d-F-Y', strtotime($deadline)) ?>
        </h6>
    </div>

    <!-- List Project -->
    <div class="project">
        <!-- Projects -->
        <a href="/admin/project"><button><b>back</b></button></a>
        <button type="button" class="btn btn-secondary" id="openModal3"><i class='bx bx-plus-medical'></i> ADD</button>

        <!-- Table for listing projects -->
        <table class="table">
            <thead>
                <tr>
                    <th>nama</th>
                    <th>tanggal start</th>
                    <th>tanggal target</th>
                    <th>status</th>
                    <th>tanggal actual</th>
                    <th>tanggal tugas</th>
                    <th>hasil dokumen</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tahapan)): ?>
                    <?php foreach ($tahapan as $tahapan): ?>
                        <tr onclick="window.location='/admin/detail/<?= $tahapan['id_tahapan'] ?>/<?= $tahapan['nama_tahapan'] ?> /<?= $nama_project ?>'"
                            style="cursor: pointer;">
                            <td>
                                <?= $tahapan['nama_tahapan'] ?>
                            </td>
                            <td>
                                <?= date('d-F-Y', strtotime($tahapan['start_date'])) ?>
                            </td>
                            <td>
                                <?= date('d-F-Y', strtotime($tahapan['Deadline'])) ?>
                            </td>
                            <td>
                                <?= $tahapan['status'] ?>
                            </td>
                            <td>
                                <?php if (!empty($tahapan['tgl_actual'])): ?>
                                    <?= date('d-F-Y', strtotime($tahapan['tgl_actual'])) ?>
                                <?php else: ?>
                                    Tugas belum dikumpulkan
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($tahapan['tgl_tugas'])): ?>
                                    <?= date('d-F-Y', strtotime($tahapan['tgl_tugas'])) ?>
                                <?php else: ?>
                                    Tugas belum dikumpulkan
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($tahapan['hasil_tahapan'])): ?>
                                    <button type="button" class="btn btn-primary openUploadModal"
                                        data-id="<?= $tahapan['id_tahapan'] ?>" data-nama="<?= $tahapan['nama_tahapan'] ?>"><i
                                            class='bx bx-upload' style='color:#ffffff'></i> Upload</button>
                                    <a href="<?= site_url('admin/download/' . $tahapan['hasil_tahapan']); ?>" download>
                                        <button onclick="event.stopPropagation()" class="btn btn-primary">Download File</button>
                                    </a>
                                <?php else: ?>
                                    <button type="button" class="btn btn-primary openUploadModal"
                                        data-id="<?= $tahapan['id_tahapan'] ?>" data-nama="<?= $tahapan['nama_tahapan'] ?>"><i
                                            class='bx bx-upload' style='color:#ffffff'></i> Upload</button>
                                <?php endif; ?>
                            </td>
                            <td class="action">
                                <a href="<?= base_url('admin/hapusTahapan/' . $tahapan['id_tahapan']) ?>"><button type="button"
                                        class="btn btn-danger"
                                        onclick="event.stopPropagation(); return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')"><i
                                            class="fa fa-trash-o"></i></button></a>
                                <?php if ($tahapan['status'] === 'selesai'): ?>
                                    <button type="button" class="btn btn-danger" data-popup="verificationModal"
                                        data-id="<?= $tahapan['id_tahapan'] ?>" data-status="<?= $tahapan['status'] ?>">batal
                                        verifikasi</button>
                                <?php else: ?>
                                    <button type="button" class="btn btn-success" data-popup="verificationModal"
                                        data-id="<?= $tahapan['id_tahapan'] ?>"
                                        data-status="<?= $tahapan['status'] ?>">verifikasi</button>
                                <?php endif; ?>
                                <button type="button" class="btn btn-warning openEditModal"
                                    data-id="<?= $tahapan['id_tahapan'] ?>" data-nama_tahapan="<?= $tahapan['nama_tahapan'] ?>"
                                    data-start_project="<?= $tahapan['start_date'] ?>"
                                    data-deadline="<?= $tahapan['Deadline'] ?>"><i class="fa fa-pencil"></i> Edit</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <td style="text-align: center;" colspan="8">No projects available.</td>
                <?php endif; ?>
                <tr hidden>
                    <td><a href="/admin">Judul tugas 1</a></td>
                    <td>Deskripsi 1</td>
                    <td>status</td>
                    <td>dasads</td>
                    <td>dsadas</td>
                    <td>dasads</td>
                    <td>dsadas</td>
                    <td class="action">
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-success"
                            onclick="event.stopPropagation();">verifikasi</i></button>
                        <button type="button" class="btn btn-warning" id="openModal2"
                            onclick="event.stopPropagation()">><i class="fa fa-pencil"></i> Edit</button>
                        <button type="button" class="btn btn-primary" id="openModal1"><i class='bx bx-upload'
                                style='color:#ffffff'></i> Upload</button>
                    </td>
                </tr>
                <tr hidden>
                    <td><a href="/admin">Judul tugas 2</a></td>
                    <td>Deskripsi 2</td>
                    <td>status</td>
                    <td>dasads</td>
                    <td>dsadas</td>
                    <td>dasads</td>
                    <td>dsadas</td>
                    <td>
                        <button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-success"
                            onclick="event.stopPropagation();">verifikasi</i></button>
                        <button type="button" class="btn btn-warning" id="openModal4"
                            onclick="event.stopPropagation()">><i class="fa fa-pencil"></i> Edit</button>
                        <button type="button" class="btn btn-primary" id="openModal5"><i class='bx bx-upload'
                                style='color:#ffffff'></i> Upload</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
<!-- Modal 1 -->
<div id="myModal1" class="modal">
    <div class="modal-content">
        <span class="close1 close">&times;</span>
        <h2>Nama Project</h2>
        <p>Upload Berita Acara Surat Terima</p>
        <div class="isi">
            <label for="tgl1">Tanggal Upload :</label>
            <input type="date" name="tgl1" class="tgl"><br>
            <label for="upload1">Upload file BAST :</label>
            <input type="file" name="file1" id="file1" class="file" onchange="sub(this)"><br><br>
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>


<!-- Modal 2 -->
<div id="myModal2" class="modal">
    <div class="modal-content">
        <span class="close2 close">&times;</span>
        <div class="content3">
            <h2>EDIT FORM</h2>
            <h2 style="font-size: 20px;">
                <?= $nama_project ?>
            </h2>
            <p><b>No_PO :</b>
                <?= $no_po ?>
            </p>
            <p><b>Tanggal PO :</b>
                <?= date('d-F-Y', strtotime($deadline)) ?>
            </p><br>
            <form id="addForm" action="<?= base_url('admin/updateDataTahapan') ?>" method="post">
                <input type="hidden" id="id3" name="id">
                <label for="judul">Judul Tugas:</label>
                <input type="text" id="judul3" name="nama_tahapan" required>

                <label for="tgl">Tanggal Start:</label>
                <input type="date" id="tgl3" name="start_project" required>

                <label for="tgl">deadline:</label>
                <input type="date" id="deadline3" name="deadline" required>


                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal 3 -->
<div id="myModal3" class="modal">
    <div class="modal-content">
        <span class="close3 close">&times;</span>
        <div class="content3">
            <h2>
                <?= $nama_project ?>
            </h2>
            <p><b>No_PO :</b>
                <?= $no_po ?>
            </p>
            <p><b>Tanggal PO :</b>
                <?= date('d-F-Y', strtotime($deadline)) ?>
            </p><br>
            <form id="addForm3" action="<?= base_url('admin/addDataTahapan') ?>" method="post">
                <input type="hidden" id="id" name="id" value="<?= $id ?>">

                <label for="judul">Judul Tugas:</label>
                <input type="text" id="judul3" name="nama_tahapan" required>

                <label for="tgl">Tanggal Start:</label>
                <input type="date" id="tgl3" name="start_project" required>

                <label for="status">Tanggal Target:</label>
                <input type="date" id="tgl3" name="deadline" required>

                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal 4 -->
<div id="myModal4" class="modal">
    <div class="modal-content">
        <span class="close4 close">&times;</span>
        <div class="content3">
            <h2>Nama Project</h2>
            <p><b>No_PO :</b> 1231213</p>
            <p><b>Tanggal PO :</b> 12-02-23</p><br>
            <form id="addForm4">
                <label for="judul">Judul Tugas:</label>
                <input type="text" id="judul4" name="judul4" required>

                <label for="deskripsi">Deskripsi:</label>
                <input type="text" id="deskripsi4" name="deskripsi4" required>

                <label for="status">Status:</label>
                <input type="text" id="status4" name="status4" required>

                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal 5 -->
<div id="myModal5" class="modal">
    <div class="modal-content">
        <span class="close5 close">&times;</span>
        <h2><span id="nama22"></span></h2>
        <p>Upload Dokumen</p>
        <div class="isi">
            <form action="<?= base_url('admin/uploadFile') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id4" name="id_tahapan">
                <label for="tgl5">Tanggal Upload :</label>
                <input type="date" name="tgl_actual" class="tgl_actual"><br>
                <label for="upload5">Upload file: </label>
                <input type="file" name="file" id="file" class="file"><br><br>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- modal6 -->
<div id="myModal6" class="modal">
    <div class="modal-content">
        <span class="close6 close">&times;</span>
        <h2> Verification Detail-Tahapan</h2>
        <span id="id22" hidden></span>
        <table border="1">
            <thead>
                <tr>
                    <th>detail</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($detail)): ?>
                    <?php foreach ($detail as $detail): ?>
                        <tr>
                            <td style="display: none;">
                                <?= $detail['id_tahapan'] ?>
                            </td>
                            <td>
                                <?= $detail['nama_tugas'] ?>
                            </td>
                            <td>
                                <?= $detail['status'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center;">No projects available.</p>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="isi">
            <div class="abcd">
                <form action="<?= base_url('admin/verifTahapan') ?>" method="post">
                    <input type="hidden" name="idaja" value="" id="idaja">
                    <button type="submit" class="btn btn-success">Verifikasi</button>
                </form>
            </div>
            <div class="abc">
                <form action="<?= base_url('admin/verifBatalTahapan') ?>" method="post">
                    <input type="hidden" name="idaja" value="" id="idaja1">
                    <button type="submit" class="btn btn-danger close-verification">Batal verifikasi</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    // JavaScript to show/hide the pop-up
    const popups = document.querySelectorAll('.popup');
    const buttons = document.querySelectorAll('[data-popup]');
    const closeButtons = document.querySelectorAll('.close-popup');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const popupId = button.getAttribute('data-popup');
            const popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = 'block';
            }
        });
    });

    closeButtons.forEach(closeButton => {
        closeButton.addEventListener('click', () => {
            const popupId = closeButton.getAttribute('data-popup');
            const popup = document.getElementById(popupId);
            if (popup) {
                popup.style.display = 'none';
            }
        });
    });

    // Get the modals and buttons
    var modal1 = document.getElementById("myModal1");
    var modal2 = document.getElementById("myModal2");
    var modal3 = document.getElementById("myModal3");
    var modal4 = document.getElementById("myModal4");
    var modal5 = document.getElementById("myModal5");
    var uploadButtons = document.querySelectorAll(".openUploadModal");
    var modal6 = document.getElementById("myModal6");
    var verificationButtons = document.querySelectorAll('[data-popup="verificationModal"]');


    var btn1 = document.getElementById("openModal1");
    var btn2 = document.getElementById("openModal2");
    var btn3 = document.getElementById("openModal3");
    var btn4 = document.getElementById("openModal4");
    var btn5 = document.getElementById("openModal5");

    // Get the close buttons for modals
    var close1 = document.getElementsByClassName("close1")[0];
    var close2 = document.getElementsByClassName("close2")[0];
    var close3 = document.getElementsByClassName("close3")[0];
    var close4 = document.getElementsByClassName("close4")[0];
    var close5 = document.getElementsByClassName("close5")[0];
    var close6 = document.getElementsByClassName("close6")[0];
    var close6Verification = document.querySelector('.close-verification');

    verificationButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        modal6.style.display = "block";
        event.stopPropagation();

        var id = button.getAttribute("data-id");
        var status = button.getAttribute("data-status");
        var spanid = document.getElementById("id22");
        var inputidaja = document.getElementById("idaja");
        if (inputidaja) {
            inputidaja.value = id;
        }
        var inputidaja1 = document.getElementById("idaja1");
        if (inputidaja1) {
            inputidaja1.value = id;
        }

        if (spanid) {
            spanid.textContent = id;

            // Get all rows in the table
            var tableRows = document.querySelectorAll("#myModal6 table tbody tr");

            // Variable to keep track of whether any data is found for the specific id
            var dataFound = false;

            // Loop through each row in the table
            tableRows.forEach(function (row) {
                // Get the id_tahapan value from the current row
                var rowId = row.querySelector("td:first-child").textContent.trim();

                // Check if the current row's id_tahapan matches the spanid
                if (rowId === id) {
                    row.style.display = "table-row";
                    dataFound = true;
                } else {
                    row.style.display = "none";
                }
            });

            // If no data is found for the specific id, display a message or handle it accordingly
            if (!dataFound) {
                // For example, you can show a message in the console
                console.log("No data found for id_tahapan: " + id);
            }

            var abcDiv = document.querySelector("#myModal6 .abc");
            var abcdDiv = document.querySelector("#myModal6 .abcd");
            if (status === "selesai") {
                abcDiv.style.display = "block";
                abcdDiv.style.display = "none";
            } else {
                abcDiv.style.display = "none";
                abcdDiv.style.display = "block";
            }
        }
    });
});




    close6.onclick = function () {
        modal6.style.display = "none";
    };

    // Function to open the modals
    btn1.onclick = function () {
        modal1.style.display = "block";
        event.stopPropagation();
    }

    btn2.onclick = function () {
        modal2.style.display = "block";
        event.stopPropagation();
    }

    btn3.onclick = function () {
        modal3.style.display = "block";
        event.stopPropagation();
    }

    btn4.onclick = function () {
        modal4.style.display = "block";
        event.stopPropagation();

    }

    btn5.onclick = function () {
        modal5.style.display = "block";
        event.stopPropagation();
    }


    // Function to close the modals
    close1.onclick = function () {
        modal1.style.display = "none";
    }

    close2.onclick = function () {
        modal2.style.display = "none";
    }

    close3.onclick = function () {
        modal3.style.display = "none";
    }

    close4.onclick = function () {
        modal4.style.display = "none";
    }

    close5.onclick = function () {
        modal5.style.display = "none";
    }
    // Handle "Edit" button clicks
    var editButtons = document.querySelectorAll(".openEditModal");
    editButtons.forEach(function (button) {
        button.onclick = function () {
            modal2.style.display = "block";
            event.stopPropagation();


            // Populate the modal fields with data
            var id = button.getAttribute("data-id");
            var namaTahapan = button.getAttribute("data-nama_tahapan");
            var startProject = button.getAttribute("data-start_project");
            var deadline = button.getAttribute("data-deadline");

            var inputid3 = document.getElementById("id3");
            var inputJudul3 = document.getElementById("judul3");
            var inputTgl3 = document.getElementById("tgl3");
            var inputDeadline3 = document.getElementById("deadline3");

            if (inputid3) {
                inputid3.value = id;
            }
            if (inputJudul3) {
                inputJudul3.value = namaTahapan;
            }

            if (inputTgl3) {
                inputTgl3.value = startProject;
            }

            if (inputDeadline3) {
                inputDeadline3.value = deadline;
            }
        }
    });
    // Function to open the upload modal
    uploadButtons.forEach(function (button) {
        button.onclick = function () {
            modal5.style.display = "block";
            event.stopPropagation();

            var id = button.getAttribute("data-id");
            var nama = button.getAttribute("data-nama");
            var spanNama = document.getElementById("nama22");

            var inputid4 = document.getElementById("id4");

            if (inputid4) {
                inputid4.value = id;
            }
            if (spanNama) {
                spanNama.textContent = nama;
            }
        }
    })

    // Function to close the modals when clicking outside
    window.onclick = function (event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }

        if (event.target == modal2) {
            modal2.style.display = "none";
        }

        if (event.target == modal3) {
            modal3.style.display = "none";
        }

        if (event.target == modal4) {
            modal4.style.display = "none";
        }

        if (event.target == modal5) {
            modal5.style.display = "none";
        }
    }
</script>
<?= $this->endSection() ?>