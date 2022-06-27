<div class="modal modal-blur fade" id="addPeserta" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Peserta Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="user" id="formAddPeserta">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_peserta" class="form form-control required">
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
                        <input type="text" name="no_hp" class="form form-control required number">
                        <label>No. HP</label>
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
                        <input type="text" name="jumlah_tes" class="form form-control required number">
                        <label>Jumlah Tes</label>
                    </div>
                    <h4 class="mb-3">Tampilan Soal</h4>
                    <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column mb-3">

                        <input type="hidden" name="tampilan_soal" class="form required">

                        <label class="form-selectgroup-item flex-fill">
                            <input type="radio" name="btn_tampilan_soal" id="Training V1" value="Training V1" class="form-selectgroup-input">
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    <b>Training V1</b>. Soal terbagi menjadi 3 sesi. Listening, Structure & Reading. Audio listening bisa diputar berkali-kali. Waktu tes 120 menit. Soal ditampilkan keselurahan setiap sesi.
                                </div>
                            </div>
                        </label>

                        <label class="form-selectgroup-item flex-fill">
                            <input type="radio" name="btn_tampilan_soal" id="Training V2" value="Training V2" class="form-selectgroup-input">
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    <b>Training V2</b>. Soal terbagi menjadi 3 sesi. Listening, Structure & Reading. Audio listening hanya dapat diputar satu kali. Waktu Listening 35 menit, Structure 25 menit, Reading 55 menit. Soal ditampilkan keselurahan setiap sesi.
                                </div>
                            </div>
                        </label>

                        <label class="form-selectgroup-item flex-fill">
                            <input type="radio" name="btn_tampilan_soal" id="TOEFL ITP" value="TOEFL ITP" class="form-selectgroup-input">
                            <div class="form-selectgroup-label d-flex align-items-center p-3">
                                <div class="me-3">
                                    <span class="form-selectgroup-check"></span>
                                </div>
                                <div>
                                    <b>TOEFL ITP</b>. Soal terbagi menjadi 3 sesi. Listening, Structure & Reading. Audio listening hanya dapat diputar satu kali. Waktu Listening 35 menit, Structure 25 menit, Reading 55 menit. Soal ditampilkan satu-satu setiap sesi. Khusus soal Listening diberikan waktu setiap soalnya. Sesuai standard TOEFL ITP
                                </div>
                            </div>
                        </label>
                        
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

<div class="modal modal-blur fade" id="editPeserta" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_peserta" class="form">
                <div class="form-floating mb-3">
                    <input type="text" name="nama_peserta" class="form form-control required">
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
                    <input type="text" name="no_hp" class="form form-control required number">
                    <label>No. HP</label>
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
                    <input type="text" name="jumlah_tes" class="form form-control required number">
                    <label>Jumlah Tes</label>
                </div>
                <h4 class="mb-3">Tampilan Soal</h4>
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column mb-3">

                    <input type="hidden" name="tampilan_soal" class="form required">

                    <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="btn_tampilan_soal" id="Training V1" value="Training V1" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                            <div class="me-3">
                                <span class="form-selectgroup-check"></span>
                            </div>
                            <div>
                                <b>Training V1</b>. Soal terbagi menjadi 3 sesi. Listening, Structure & Reading. Audio listening bisa diputar berkali-kali. Waktu tes 120 menit. Soal ditampilkan keselurahan setiap sesi.
                            </div>
                        </div>
                    </label>

                    <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="btn_tampilan_soal" id="Training V2" value="Training V2" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                            <div class="me-3">
                                <span class="form-selectgroup-check"></span>
                            </div>
                            <div>
                                <b>Training V2</b>. Soal terbagi menjadi 3 sesi. Listening, Structure & Reading. Audio listening hanya dapat diputar satu kali. Waktu Listening 35 menit, Structure 25 menit, Reading 55 menit. Soal ditampilkan keselurahan setiap sesi.
                            </div>
                        </div>
                    </label>

                    <label class="form-selectgroup-item flex-fill">
                        <input type="radio" name="btn_tampilan_soal" id="TOEFL ITP" value="TOEFL ITP" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                            <div class="me-3">
                                <span class="form-selectgroup-check"></span>
                            </div>
                            <div>
                                <b>TOEFL ITP</b>. Soal terbagi menjadi 3 sesi. Listening, Structure & Reading. Audio listening hanya dapat diputar satu kali. Waktu Listening 35 menit, Structure 25 menit, Reading 55 menit. Soal ditampilkan satu-satu setiap sesi. Khusus soal Listening diberikan waktu setiap soalnya. Sesuai standard TOEFL ITP
                            </div>
                        </div>
                    </label>
                    
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

<div class="modal modal-blur fade" id="tambahSoal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Soal Peserta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group mb-3">
                    <li class="list-group-item list-group-item-info">List Soal</li>
                    <div id="soalPeserta"></div>
                </ul>
                
                <div class="alert alert-important alert-info alert-dismissible" role="alert">
                    <div class="d-flex">
                        <div>
                            <?= tablerIcon("info-circle", 'me-1')?>
                        </div>
                        <div>
                            Untuk menambahkan soal peserta isi form dibawah ini
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id_peserta" class="form">
                <form class="user" id="formTambahSoal">
                    <div class="form-floating mb-3">
                        <select name="id_soal" class="form form-control required">
                            <option value="">Pilih Soal</option>
                            <?php foreach($listSoal as $soal) :?>
                                <option value="<?= $soal['id_soal']?>"><?= $soal['nama_soal'] . " (" . $soal['soal'] . ")"?></option>
                            <?php endforeach;?>
                        </select>
                        <label for="">Soal</label>
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