$(".btnAddPeserta").click(function(){
    $("#formAddPeserta").trigger("reset");

    $("#formAddPeserta input:radio[value='Training V1']").prop('checked',false);
    $("#formAddPeserta input:radio[value='Training V2']").prop('checked',false);
    $("#formAddPeserta input:radio[value='TOEFL ITP']").prop('checked',false);
})

// tambah tes baru
$("#addPeserta .btnTambah").click(function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menambahkan peserta baru?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#addPeserta";

            let formData = {};
            $(form+" .form").each(function(){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()})
            })

            // table 
            formData = Object.assign(formData);

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                data = formData;
                let result = ajax(url_base+"peserta/add_peserta", "POST", data);

                if(result == 1){
                    loadData();
                    $("#formAddPeserta").trigger("reset");
                    $(form).modal("hide");

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil menambahkan data peserta',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan, ulangi input peserta'
                    })
                }
            }
        }
    })
})

// get data tes ketika edit
$(document).on("click",".editPeserta", function(){
    let form = "#editPeserta";
    let id_peserta = $(this).data("id");

    let data = {id_peserta: id_peserta};
    let result = ajax(url_base+"peserta/get_peserta", "POST", data);
    
    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value)
    })

    if(result.tampilan_soal == "Training V1"){
        $("input:radio[value='Training V1']").prop('checked',true);
    } else if(result.tampilan_soal == "Training V2") {
        $("input:radio[value='Training V2']").prop('checked',true);
    } else if(result.tampilan_soal == "TOEFL ITP"){
        $("input:radio[value='TOEFL ITP']").prop('checked',true);
    }
})

// menyimpan hasil edit data
$("#editPeserta .btnEdit").click(function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan mengubah data peserta?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#editPeserta";
            
            let formData = {};
            $(form+" .form").each(function(){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()})
            })

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                data = formData;
                let result = ajax(url_base+"peserta/edit_peserta", "POST", data);

                if(result == 1){
                    loadData();

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil mengubah data peserta',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan'
                    })
                }
            }
        }
    })
})

$(document).on("click", ".tambahSoal", function(){
    let id = $(this).data("id");

    $("#tambahSoal [name='id_peserta']").val(id);
    detailSoalPeserta(id)
})

function detailSoalPeserta(id) {
    let result = ajax(url_base+"peserta/get_soal_peserta/"+id, "POST", "");

    console.log(result);

    let sesi = "";
    if(result.length != 0){
        num = 1;
        result.forEach(function(dataSesi){
            sesi += `<li class="list-group-item d-flex justify-content-between">
                    `+num+`. `+dataSesi.nama_soal+`
                    <a href="javascript:void(0)" class="deleteSoal" data-id="`+dataSesi.id+`">
                        <svg width="24" height="24" class="text-danger">
                            <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-trash" />
                        </svg> 
                    </a>
                </li>`
            num++;
        })
    } else {
        sesi += `
        <div class="alert alert-important alert-warning alert-dismissible" role="alert">
            <div class="d-flex">
                <svg width="24" height="24" class="me-1">
                    <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-alert-circle" />
                </svg> 
                <div>
                    Soal Kosong
                </div>
            </div>
        </div>`
    }

    $("#soalPeserta").html(sesi);
}

// ketika menambahkan sub soal 
$("#tambahSoal .btnTambah").click(function(){
    let form = "#tambahSoal";
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menambahkan soal baru?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function(result){
        if(result.value){
            let formData = {};
            $(form+" .form").each(function(){
                formData = Object.assign(formData, {[$(this).attr('name')]: $(this).val()})
            })

            let eror = required(form);
            if(eror == 1){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "lengkapi isi form terlebih dahulu",
                })
            } else {

                let result = ajax(url_base+"peserta/add_soal_peserta", "POST", formData);

                if(result == 1){
                    
                    id_peserta = $("#tambahSoal [name='id_peserta']").val();
                    detailSoalPeserta(id_peserta)

                    $("#formTambahSoal").trigger("reset");
                    Swal.fire({
                        icon: "success",
                        text: "Berhasil menambahkan soal peserta",
                        showConfirmButton: false,
                        timer: 1500
                    })
                    
                    loadData()

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan, silahkan refresh page'
                    })
                }
            }
        }
    })
})

// delete sesi 
$(document).on("click", ".deleteSoal", function(){
    let id = $(this).data("id");

    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menghapus soal ini?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function(result){
        if(result.value){
            data = {id:id};
            let result = ajax(url_base+`peserta/hapus_soal`, "POST", data);
            if(result == 1){
                loadData();
                
                id_peserta = $("#tambahSoal [name='id_peserta']").val();
                detailSoalPeserta(id_peserta)

                Swal.fire({
                    icon: "success",
                    text: "Berhasil menghapus data",
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'terjadi kesalahan, silahkan refresh page'
                })
            }
        }
    })
})

$('input:radio').click(function () {
    let value = $(this).val();
    $("[name='tampilan_soal']").val(value);
});