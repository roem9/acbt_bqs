<div class="modal modal-blur fade" id="editPeserta" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id" id="id">
                <div class="form-floating mb-3">
                    <input type="text" name="nama" class="form form-control required">
                    <label>Nama Peserta</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="t4_lahir" class="form form-control required">
                    <label>Tempat Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="tgl_lahir" class="form form-control required">
                    <label>Tgl Lahir</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="jk" class="form form-control required">
                        <option value="">Pilih Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label>Gender</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="no_wa" class="form form-control required">
                    <label>No. WA</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="email" class="form form-control required">
                    <label>Email</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="alamat" class="form form-control required"></textarea>
                    <label>Alamat Sertifikat</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="country" class="form form-control required">
                    <label>Country</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="language" class="form form-control required">
                    <label>Language</label>
                </div>
                <h3>Data Tes</h3>
                <div class="form-floating mb-3">
                    <input type="text" name="waktu_mulai" class="form form-control required" readonly>
                    <label>Waktu Mulai</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="tgl_input" class="form form-control required" readonly>
                    <label>Waktu Selesai</label>
                </div>
                <!-- <div class="form-floating mb-3">
                    <input type="text" name="sisa_waktu_structure" class="form form-control required" readonly>
                    <label>Sisa Waktu Structure</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="sisa_waktu_reading" class="form form-control required" readonly>
                    <label>Sisa Waktu Reading</label>
                </div> -->
                <div class="form-floating mb-3">
                    <input type="text" name="nilai_listening" class="form form-control required" readonly>
                    <label>Jumlah Benar Soal Listening</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nilai_structure" class="form form-control required" readonly>
                    <label>Jumlah Benar Soal Strucutre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nilai_reading" class="form form-control required" readonly>
                    <label>Jumlah Benar Soal Reading</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-auto mr-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="detailPesertaLatihan" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id" id="id">
                <div class="form-floating mb-3">
                    <input type="text" name="nama" class="form form-control required" readonly>
                    <label>Nama Peserta</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="no_wa" class="form form-control required" readonly>
                    <label>No. WA</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="email" class="form form-control required" readonly>
                    <label>Email</label>
                </div>
                <h3>Data Tes</h3>
                <div class="form-floating mb-3">
                    <input type="text" name="tgl_input" class="form form-control required" readonly>
                    <label>Waktu Selesai</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rekap Nilai</label>
                    <!-- <textarea class="form form-control required" name="rekap_sesi" data-bs-toggle="autosize" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 80px;" readonly></textarea> -->
                    <div class="rekap_sesi"></div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nilai" class="form form-control required" readonly>
                    <label>Nilai</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-auto mr-3" data-bs-dismiss="modal">Tutup</button>
                    <!-- <button type="button" class="btn btn-success btnEdit">Edit</button> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="addSertifikat" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sertifikat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id" id="id">
                <div class="form-floating mb-3">
                    <select name="sertifikat" class="form form-control required">
                        <option value="">Pilih Sertifikat</option>
                        <option value="Soft File">Soft File</option>
                        <option value="Hard File">Hard File</option>
                    </select>
                    <label>Sertifikat</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nama" class="form form-control required" readonly>
                    <label>Nama Peserta</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-auto mr-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btnTambah">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="editSertifikat" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Sertifikat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id" id="id">
                <div class="form-floating mb-3">
                    <select name="sertifikat" class="form form-control required">
                        <option value="">Pilih Sertifikat</option>
                        <option value="Soft File">Soft File</option>
                        <option value="Hard File">Hard File</option>
                    </select>
                    <label>Sertifikat</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nama" class="form form-control required" readonly>
                    <label>Nama Peserta</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-auto mr-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="uploadGambar" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Foto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data" class="myform">
                    <input type="hidden" name="id">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama" class="form-control form-control-sm" readonly>
                        <label for="">Nama Peserta</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" name="file" id="file" class="form-control required">
                        <label for="">Foto</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-auto mr-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btnTambah">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>