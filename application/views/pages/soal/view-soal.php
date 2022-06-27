<?php $this->load->view("_partials/header")?>
    <div id="soal_tes">
        <div class="wrapper" id="elementtoScrollToID">
            <div class="sticky-top">
                <?php $this->load->view("_partials/navbar-header")?>
                <?php $this->load->view("_partials/navbar")?>
            </div>
            <div class="page-wrapper" id="">
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-cards FieldContainer" data-masonry='{"percentPosition": true }'>
                                <center>
                                    <h2><?= $title?></h2>
                                </center>
                                <?php 
                                    $index = 1;
                                    $jumlah_sesi = COUNT($sesi);
                                    foreach ($sesi as $sesi) :?>
                                    <div id="sesi-<?=$index?>">

                                        
                                        <div class="mb-3">
                                            <center>
                                                <h3><?= $sesi['data']['nama_sub']?></h3>
                                            </center>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="fontSize" class="form-control required">
                                                <option value="">Pilih Ukuran Tulisan</option>
                                                <option value="">Default</option>
                                                <option value="20px">20px</option>
                                                <option value="25px">25px</option>
                                                <option value="30px">30px</option>
                                            </select>
                                            <label>Ukuran Tulisan</label>
                                        </div>
                                        <input type="hidden" name="sesi-<?=$index + 1?>" value="<?= $sesi['jumlah_soal']?>">
                                        <input type="hidden" name="kunci_sesi[]" value="<?= $sesi['id_sub']?>">
                                        <?php foreach ($sesi['soal'] as $i => $data) :
                                            $item = "";
                                            ?>
                                            <?php if($data['item'] == "soal") :?>
                                                
                                                <?php $soal = '<div class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                                <input type="hidden" name="jawaban_sesi_<?= $index?>[]" data-id="soal-<?= $i?>" id="jawaban_sesi_<?= $index?><?= $i?>" value="null">
                                                <?php $pilihan = "";?>
                                                <?php foreach ($data['data']['pilihan'] as $k => $choice) :?>
                                                    <?php if($choice == $data['data']['jawaban']) $checked = "checked"; else $checked = "disabled";?>
                                                    <?php $pilihan .= '
                                                        <div class="mb-3">
                                                            <label>
                                                                <input type="radio" data-id="'.$index.'|'.$i.'"  name="radio-'.$index.'['.$i.']" value="'.$choice.'" '.$checked.'> 
                                                                <span>'.$choice.'</span>
                                                            </label>
                                                        </div>' ?>
                                                <?php endforeach;?>
                                                <?php
                                                    $pembahasan = '
                                                        <div class="accordion" id="accordion-example">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#benar'.$data['id_item'].'" aria-expanded="false">
                                                                    Pembahasan Jawaban Benar
                                                                    </button>
                                                                </h2>
                                                                <div id="benar'.$data['id_item'].'" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                                                    <div class="accordion-body pt-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#salah'.$data['id_item'].'" aria-expanded="false">
                                                                    Pembahasan Jawaban Salah
                                                                    </button>
                                                                </h2>
                                                                <div id="salah'.$data['id_item'].'" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                                                    <div class="accordion-body pt-0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                
                                                    if($data['data']['pembahasan_benar'] != "") 
                                                        $pembahasan_benar = '
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#benar'.$data['id_item'].'" aria-expanded="false">
                                                                    Pembahasan Jawaban Benar
                                                                    </button>
                                                                </h2>
                                                                <div id="benar'.$data['id_item'].'" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                                                    <div class="accordion-body pt-0">
                                                                        '.$data['data']['pembahasan_benar'].'
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                    else $pembahasan_benar = '';
                                
                                                    if($data['data']['pembahasan_salah'] != "") 
                                                        $pembahasan_salah = '
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#salah'.$data['id_item'].'" aria-expanded="false">
                                                                    Pembahasan Jawaban Salah
                                                                    </button>
                                                                </h2>
                                                                <div id="salah'.$data['id_item'].'" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                                                    <div class="accordion-body pt-0">
                                                                        '.$data['data']['pembahasan_salah'].'
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                    else $pembahasan_salah = '';
                                
                                                    $pembahasan = '
                                                        <div class="accordion" id="accordion-example">
                                                            '.$pembahasan_benar.'
                                                            '.$pembahasan_salah.'
                                                        </div>';
                                                ?>
                                                <?php $item = $soal.$pilihan.$pembahasan;?>

                                            <?php elseif($data['item'] == "petunjuk") :
                                                    if($data['penulisan'] == "RTL"){
                                                        $item = '<div dir="rtl" class="mb-3">'.$data['data'].'</div>';
                                                    } else {
                                                        $item = '<div dir="ltr" class="mb-3">'.$data['data'].'</div>';
                                                    }?>
                                            <?php elseif($data['item'] == "audio") :
                                                $item = '<center><audio controls controlsList="nodownload"><source src="'.$link['value'].'/assets/myaudio/'.$data['data'].'" type="audio/mpeg"></audio></center>';
                                            ?>
                                            <?php elseif($data['item'] == "gambar") :
                                                $item = '<img src="'.base_url().'assets/myimg/'.$data['data'].'?t='.time().'" onerror="this.onerror=null; this.src='.base_url().'assets/tabler-icons-1.39.1/icons/x.svg" class="card-img-top" width=100%>';
                                            ?>
                                            <?php endif;?>
                                            <div class="shadow card mb-3 soal">
                                                <div class="card-body" id="soal-<?= $i?>">
                                                    
                                                    <?= $item?>
                                
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                <?php 
                                    $index++;
                                    endforeach;?>
                        </div>

                    </div>
                </div>
                <?php $this->load->view("_partials/footer-bar")?>
            </div>
        </div>
    </div>

    <!-- load modal -->
    <?php 
        if(isset($modal)) :
            foreach ($modal as $i => $modal) {
                $this->load->view("_partials/modal/".$modal);
            }
        endif;
    ?>

    <!-- load javascript -->
    <?php  
        if(isset($js)) :
            foreach ($js as $i => $js) :?>
                <script src="<?= base_url()?>assets/myjs/<?= $js?>"></script>
                <?php 
            endforeach;
        endif;    
    ?>

<?php $this->load->view("_partials/footer")?>

<script>
    $("select[name='fontSize']").change(function(){
        let size = $(this).val();
        $(".soal").css("font-size",size);
        $(this).val(size)
    })
</script>