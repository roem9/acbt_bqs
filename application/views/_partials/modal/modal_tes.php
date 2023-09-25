<div class="modal modal-blur fade" id="addTes" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tes Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="user" id="formAddTes">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_tes" class="form form-control required">
                        <label>Nama Tes</label>
                    </div>
                    <!-- <div class="form-floating mb-3">
                        <select name="tipe_tes" class="form form-control required">
                            <option value="">Pilih Tipe Tes</option>
                            <option value="Tes TOEFL Gratis (Tidak Bersertifikat)">Tes TOEFL</option>
                        </select>
                        <label for="">Tipe Tes</label>
                    </div> -->
                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_tes" id="tgl_tes_add" class="form form-control required">
                        <label for="tgl_tes_add">Tgl Tes</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_pengumuman" id="tgl_pengumuman_add" class="form form-control required">
                        <label for="tgl_pengumuman_edit">Tgl Pengumuman</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="id_soal" id="id_soal_add" class="form form-control required">
                            <option value="">Pilih Soal</option>
                            <?php foreach($listSoal as $soal) :?>
                                <option value="<?= $soal['id_soal']?>"><?= $soal['nama_soal'] . " (" . $soal['soal'] . ")"?></option>
                            <?php endforeach;?>
                        </select>
                        <label for="id_soal_add">Soal</label>
                    </div>
                    <!-- <h4 class="mb-3">Tampilan Soal</h4>
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
                        
                    </div> -->
                    <div class="form-floating mb-3">
                        <select name="pembahasan" class="form form-control required">
                            <option value="">Pilih</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        <label for="">Tampilkan Pembahasan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="password" class="form form-control required">
                        <label for="password_add" class="col-form-label">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="catatan" class="form form-control required" style="height: 100px"></textarea>
                        <label for="" class="col-form-label">Catatan</label>
                    </div>

                    <div class="alert alert-important alert-info alert-dismissible" role="alert">
                    <div class="d-flex">
                            <div>
                                <?= tablerIcon("alert-circle", "alert-icon")?>
                            </div>
                            <div>
                                Pengaturan pesan yang akan tampil setelah menyelesaikan tes
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="mb-3">Pesan Yang Akan Tampil</label>
                        <textarea name="msg" class='ckeditor' id='form-text-add'></textarea>
                        <small class="mt-3">
                            <span class="text-danger">*BERIKUT CARA MENGGUNAKAN VARIABEL YANG BISA DITAMPILKAN PADA PESAN.</span> <br>
                            <b>Tes Latihan : </b><br>
                            $poin = total poin, $nama = nama, $email = email, $no_wa = No Whatsapp, $rekap_sesi = Rekap Sesi, $tes = Nama Tes, $tgl_tes = Tanggal Tes, $tgl_pengumuman = Tanggal Pengumuman, $link = Link Admin <br><br>
                            <p>
                                Contoh : <br>
                                Selamat Anda telah menyelesaikan $tes, Berikut hasil tes Anda :<br>
                                Nama : $nama <br>
                                No WA : $no_wa <br>
                                Email : $email <br>
                                $rekap_sesi <br>
                                Nilai : $poin<br>
                                Silakan menghubungi Admin melalui link berikut : $link
                            </p>
                        </small>
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

<div class="modal modal-blur fade" id="editTes" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Tes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditTes">
                    <input type="hidden" name="id_tes" class="form">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_tes" class="form form-control required">
                        <label>Nama Tes</label>
                    </div>
                    <!-- <div class="form-floating mb-3">
                        <select name="tipe_tes" class="form form-control required">
                            <option value="">Pilih Tipe Tes</option>
                            <option value="Tes TOEFL Gratis (Tidak Bersertifikat)">Tes TOEFL</option>
                        </select>
                        <label for="">Tipe Tes</label>
                    </div> -->
                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_tes" class="form form-control required">
                        <label for="">Tgl Tes</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_pengumuman" class="form form-control required">
                        <label for="">Tgl Pengumuman</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="id_soal" class="form form-control required">
                            <option value="">Pilih Soal</option>
                            <?php foreach($listSoal as $soal) :?>
                                <option value="<?= $soal['id_soal']?>"><?= $soal['nama_soal'] . " (" . $soal['soal'] . ")"?></option>
                            <?php endforeach;?>
                        </select>
                        <label for="">Soal</label>
                    </div>
                    
                    <!-- <h4 class="mb-3">Tampilan Soal</h4>
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
                        
                    </div> -->
                    <div class="form-floating mb-3">
                        <select name="pembahasan" class="form form-control required">
                            <option value="">Pilih</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                        <label for="">Tampilkan Pembahasan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="password" class="form form-control required">
                        <label for="" class="col-form-label">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="catatan" class="form form-control required" style="height: 100px"></textarea>
                        <label for="" class="col-form-label">Catatan</label>
                    </div>
    
                    <div class="alert alert-important alert-info alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                <?= tablerIcon("alert-circle", "alert-icon")?>
                            </div>
                            <div>
                                Pengaturan pesan yang akan tampil setelah menyelesaikan tes
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="mb-3">Pesan Yang Akan Tampil</label>
                        <textarea name="msg" class='ckeditor' id='form-text-edit'></textarea>
                        <small class="mt-3">
                            <span class="text-danger">*BERIKUT CARA MENGGUNAKAN VARIABEL YANG BISA DITAMPILKAN PADA PESAN.</span> <br>
                            <b>Tes Latihan : </b><br>
                            $poin = total poin, $nama = nama, $email = email, $no_wa = No Whatsapp, $rekap_sesi = Rekap Sesi, $tes = Nama Tes, $tgl_tes = Tanggal Tes, $tgl_pengumuman = Tanggal Pengumuman, $link = Link Admin <br><br>
                            <p>
                                Contoh : <br>
                                Selamat Anda telah menyelesaikan $tes, Berikut hasil tes Anda :<br>
                                Nama : $nama <br>
                                No WA : $no_wa <br>
                                Email : $email <br>
                                $rekap_sesi <br>
                                Nilai : $poin<br>
                                Silakan menghubungi Admin melalui link berikut : $link
                            </p>
                        </small>
                    </div>
                </form>
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
                <h5 class="modal-title">Upload Logo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data" class="myform">
                    <input type="hidden" name="id_tes">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_tes" class="form-control form-control-sm" readonly>
                        <label for="">Nama Tes</label>
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