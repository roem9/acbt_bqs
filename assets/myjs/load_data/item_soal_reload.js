load_item(id);

function load_item(id) {
	let data = { id_sub: id };

	let result = ajax(url_base + "subsoal/get_all_item_soal", "POST", data);

	html = "";
	// result = 1;
	total = 0;
	if (result.item.length != 0) {
		if (result.tipe_soal == "Tampil Satuan") {
			html += `
				<div class="alert alert-warning" role="alert">
					<b>Perhatian!</b> Untuk tipe soal <b>Tampil Satuan</b> jika menggunakan <b>audio</b>, mohon letakkan <b>audio</b> selalu pada <b>urutan pertama</b>
				</div>
			`;
		}

		result.item.forEach((data) => {
			if (data.item == "soal") {
				data_total = total;
				total = parseInt(total) + parseInt(data.waktu_soal);

				soal = `<div class="mb-3">` + data.data.soal + `</div>`;
				// jawaban = `<div class="mb-3 text-danger">`+data.data.jawaban+`</div>`
				pilihan = "";
				data.data.pilihan.forEach((data_pilihan) => {
					if (data_pilihan == data.data.jawaban) checked = "checked";
					else checked = "disabled";
					pilihan +=
						`
                        <div class="mb-3">
                            <div class="form-check p-0" dir="${data.penulisan}">
                                <label>
                                    <input type="radio" ` +
						checked +
						`>
                                    <span>` +
						data_pilihan +
						`</span>
                                </label>
                            </div>
                        </div>`;
				});
				// item = soal+pilihan+jawaban;

				pembahasan =
					`
                        <div class="accordion" id="accordion-example">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#benar` +
					data.id_item +
					`" aria-expanded="false">
                                    Pembahasan Jawaban Benar
                                    </button>
                                </h2>
                                <div id="benar` +
					data.id_item +
					`" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#salah` +
					data.id_item +
					`" aria-expanded="false">
                                    Pembahasan Jawaban Salah
                                    </button>
                                </h2>
                                <div id="salah` +
					data.id_item +
					`" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                    </div>
                                </div>
                            </div>
                        </div>`;

				if (data.pembahasan_benar != "")
					pembahasan_benar =
						`
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#benar` +
						data.id_item +
						`" aria-expanded="false">
                                    Pembahasan Jawaban Benar
                                    </button>
                                </h2>
                                <div id="benar` +
						data.id_item +
						`" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        ` +
						data.pembahasan_benar +
						`
                                    </div>
                                </div>
                            </div>`;
				else pembahasan_benar = ``;

				if (data.pembahasan_salah != "")
					pembahasan_salah =
						`
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#salah` +
						data.id_item +
						`" aria-expanded="false">
                                    Pembahasan Jawaban Salah
                                    </button>
                                </h2>
                                <div id="salah` +
						data.id_item +
						`" class="accordion-collapse collapse" data-bs-parent="#accordion-example">
                                    <div class="accordion-body pt-0">
                                        ` +
						data.pembahasan_salah +
						`
                                    </div>
                                </div>
                            </div>`;
				else pembahasan_salah = ``;

				pembahasan =
					`
                        <div class="accordion" id="accordion-example">
                            ` +
					pembahasan_benar +
					`
                            ` +
					pembahasan_salah +
					`
                        </div>`;

				// item = soal+pilihan+jawaban;
				item = soal + pilihan + pembahasan;

				if (tipe_soal == "Tampil Satuan") {
					waktu =
						`
                            <p>
                                Waktu Soal : ` +
						data.waktu_soal +
						`
                                Total Waktu : ` +
						secondsToTime(total) +
						`
                            </p>
                            <a href="javascript:void(0)" class="btn btn-sm btn-success btnPlay" data-total="` +
						data_total +
						`" data-range="` +
						total +
						`">
                                Play
                            </a>
                            `;
				} else {
					waktu = "";
				}

				item = item + waktu;
			} else if (data.item == "soal berbobot") {
				data_total = total;
				total = parseInt(total) + parseInt(data.waktu_soal);

				soal = `<div class="mb-3">` + data.data.soal + `</div>`;
				// jawaban = `<div class="mb-3 text-danger">`+data.data.jawaban+`</div>`
				pilihan = "";
				data.data.pilihan.forEach((data_pilihan, index) => {
					if (data_pilihan == data.data.jawaban) checked = "checked";
					else checked = "disabled";
					pilihan +=
						`
                        <div class="mb-3">
                            <div class="form-check p-0" dir="${data.penulisan}">
                                <label>
                                    <input type="radio" ` +
						checked +
						`>
                                    <span>
						${data_pilihan} (${data.data.bobot[index]})
						</span>
                                </label>
                            </div>
                        </div>`;
				});

				// item = soal+pilihan+jawaban;
				item = soal + pilihan;

				if (tipe_soal == "Tampil Satuan") {
					waktu =
						`
                            <p>
                                Waktu Soal : ` +
						data.waktu_soal +
						`
                                Total Waktu : ` +
						secondsToTime(total) +
						`
                            </p>
                            <a href="javascript:void(0)" class="btn btn-sm btn-success btnPlay" data-total="` +
						data_total +
						`" data-range="` +
						total +
						`">
                                Play
                            </a>
                            `;
				} else {
					waktu = "";
				}

				item = item + waktu;
			} else if (data.item == "petunjuk") {
				data_total = total;
				total = parseInt(total) + parseInt(data.waktu_soal);

				if (data.penulisan == "RTL") {
					item = `<div dir="rtl" class="mb-3">` + data.data + `</div>`;
				} else {
					item = `<div dir="ltr" class="mb-3">` + data.data + `</div>`;
				}

				if (tipe_soal == "Tampil Satuan") {
					waktu =
						`<p>
                                Waktu Soal : ` +
						data.waktu_soal +
						`
                                Total Waktu : ` +
						secondsToTime(total) +
						`
                            </p>
                            <a href="javascript:void(0)" class="btn btn-sm btn-success btnPlay" data-total="` +
						data_total +
						`" data-range="` +
						total +
						`">
                                Play
                            </a>
                            `;
				} else {
					waktu = "";
				}

				item = item + waktu;
			} else if (data.item == "audio") {
				item =
					`<center><audio controls controlsList="nodownload" id="audioPlayer"><source src="` +
					url_base +
					`assets/myaudio/` +
					data.data +
					`?t=` +
					Math.random() +
					`" type='audio/mpeg'></audio></center>`;
			} else if (data.item == "gambar") {
				item =
					`<img src="` +
					url_base +
					`assets/myimg/` +
					data.data +
					`?t=` +
					Math.random() +
					`" onerror="this.onerror=null; this.src='` +
					url_base +
					`assets/tabler-icons-1.39.1/icons/x.svg'" class="card-img-top" width=100%>`;
			}

			if (data.item == "audio" || data.item == "gambar") {
				edit = "";
			} else {
				edit =
					`
                <a class="dropdown-item editItem" href="#editItem" data-bs-toggle="modal" data-id="` +
					data.id_item +
					`">
                    ` +
					icon("me-1", "edit") +
					`
                    Edit
                </a>
                <div class="dropdown-divider"></div>
                `;
			}

			html +=
				`
            <div class="OrderingField">
                <div class="card mb-3">
                    <div class="card-body">

                        <input type="hidden" name="id_item" value="` +
				data.id_item +
				`">
                        
                        ` +
				item +
				`
    
                    </div>
                    <div class="RightFloat Commands d-flex justify-content-between mb-3">
                        <div>
                        </div>
                        <div>
                            <button value='up' class="btn btn-sm btn-success me-3">
                                <svg width="24" height="24">
                                    <use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-big-top" />
                                </svg>
                            </button>
                            <button value='down' class="btn btn-sm btn-success">
                                <svg width="24" height="24">
                                    <use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-big-down" />
                                </svg> 
                            </button>
                        </div>
                        <div class="me-3">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <svg width="24" height="24">
                                    <use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-settings" />
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                ` +
				edit +
				`
                                <a class="dropdown-item hapusItem" href="javascript:void(0)" data-id="` +
				data.id_item +
				`">
                                    ` +
				icon("me-1", "trash") +
				`
                                    Hapus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
		});
	} else {
		html =
			`
        <div class="d-flex flex-column justify-content-center">
            <div class="empty">
                <div class="empty-img"><img src="` +
			url_base +
			`assets/static/illustrations/undraw_printing_invoices_5r4r.svg" height="128"  alt="">
                </div>
                <p class="empty-title">Data kosong</p>
                <p class="empty-subtitle text-muted">
                    Silahkan tambahkan data
                </p>
            </div>
        </div>`;
	}

	$("#dataAjax").html(html);
}

function secondsToTime(e) {
	var h = Math.floor(e / 3600)
			.toString()
			.padStart(2, "0"),
		m = Math.floor((e % 3600) / 60)
			.toString()
			.padStart(2, "0"),
		s = Math.floor(e % 60)
			.toString()
			.padStart(2, "0");

	return h + ":" + m + ":" + s;
}
