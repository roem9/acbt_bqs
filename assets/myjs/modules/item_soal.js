$(document).on("click", ".addItem, #addItem .btnBack", function () {
	let form = "#addItem";

	let html = `
        <div class="mb-3">
            <label class="form-label">Pilih Item</label>
            <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="item" value="soal" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                        <div class="me-3">
                            <span class="form-selectgroup-check"></span>
                        </div>
                        <div>
                            Tambah Soal
                        </div>
                    </div>
                </label>
				<label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="item" value="soal berbobot" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                        <div class="me-3">
                            <span class="form-selectgroup-check"></span>
                        </div>
                        <div>
                            Tambah Soal (Berbobot)
                        </div>
                    </div>
                </label>
                <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="item" value="petunjuk" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                        <div class="me-3">
                            <span class="form-selectgroup-check"></span>
                        </div>
                        <div>
                            Tambah Petunjuk / Teks
                        </div>
                    </div>
                </label>
                <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="item" value="audio" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                        <div class="me-3">
                            <span class="form-selectgroup-check"></span>
                        </div>
                        <div>
                            Tambah Audio
                        </div>
                    </div>
                </label>
                <label class="form-selectgroup-item flex-fill">
                    <input type="radio" name="item" value="gambar" class="form-selectgroup-input">
                    <div class="form-selectgroup-label d-flex align-items-center p-3">
                        <div class="me-3">
                            <span class="form-selectgroup-check"></span>
                        </div>
                        <div>
                            Tambah Gambar
                        </div>
                    </div>
                </label>
            </div>
        </div>`;

	$(form + " .modal-body").html(html);

	$(form + " .modal-footer").addClass(`d-flex justify-content-end`);
	$(form + " .modal-footer").removeClass(`d-flex justify-content-between`);
	$(form + " .modal-footer").html(
		`
        <div class="d-flex justify-content-end">
            <button type="button" class="btn mr-3" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success btnNext">
                Next 
                <svg width="18" height="18">
                    <use xlink:href="` +
			url_base +
			`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-right" />
                </svg> 
            </button>
        </div>
    `
	);
});

var count_choice = 0;

$(document).on("click", "#addItem .btnNext", function () {
	let form = "#addItem";
	let item = $(form + " input[name='item']:checked").val();

	if ($(form + " input[name='item']:checked").length == 0) {
		Swal.fire({
			icon: "error",
			title: "Oops...",
			text: "pilih item terlebih dahulu",
		});
	} else {
		let html = `<input type="hidden" name="item" value="` + item + `">`;

		if (item == "soal") {
			let id_sub = $(form + " input[name='id_sub']").val();

			count_choice = 5;
			// let reading = textReading(id_sub, "", "");

			html +=
				`
                    <div class="mb-3">
                        <textarea name="soal" class='ckeditor' id='form-text'>{no}</textarea>
                    </div>
                    <div class="choice">
                        <div class="form-floating mb-3">
                            <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                            <label for="" class="col-form-label">Pilihan A</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                            <label for="" class="col-form-label">Pilihan B</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                            <label for="" class="col-form-label">Pilihan C</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                            <label for="" class="col-form-label">Pilihan D</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                            <label for="" class="col-form-label">Pilihan E</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <span>
                            <button type="button" class="btn btn-sm btn-danger btnRemoveForm me-3">
                                <svg width="24" height="24">
                                    <use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-minus" />
                                </svg>
                            </button>
                        </span>
                        <span>
                            <button type="button" class="btn btn-sm btn-success btnAddForm">
                                <svg width="24" height="24">
                                    <use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-plus" />
                                </svg>
                            </button>
                        </span>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="choice_jawaban" class="form-control required">
                            <option value="">Pilih Jawaban</option>
                            <option value="Pilihan A">Pilihan A</option>
                            <option value="Pilihan B">Pilihan B</option>
                            <option value="Pilihan C">Pilihan C</option>
                            <option value="Pilihan D">Pilihan D</option>
							<option value="Pilihan E">Pilihan E</option>
                        </select>
                        <label for="">Pilih Jawaban</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="jawaban" class="form-control required" data-bs-toggle="autosize" placeholder="Type something…" readonly></textarea>
                        <label for="" class="col-form-label">Jawaban</label>
                    </div>
                    <div class="form-floating mb-3" style="display:none">
                        <input type="text" name="waktu_soal" class="form-control">
                        <label for="" class="col-form-label">Waktu Soal (detik)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="penulisan" class="form-control required">
                            <option value="">Pilih Arah</option>
                            <option value="LTR">LTR</option>
                            <option value="RTL">RTL</option>
                        </select>
                        <label for="">Arah Penulisan</label>
                    </div>
                    ` +
				// pembahasan +
				`
                `;
			// }

			$(form + " .modal-body").html(html);
			CKEDITOR.replace("form-text");

			// pembahasan
			CKEDITOR.replace("form-text-benar");
			CKEDITOR.replace("form-text-salah");
		} else if (item == "soal berbobot") {
			let id_sub = $(form + " input[name='id_sub']").val();

			count_choice = 5;

			html +=
				`
				<div class="mb-3">
					<textarea name="soal" class='ckeditor' id='form-text'>{no}</textarea>
				</div>
				<div class="choice">
					<div class="form-floating">
						<textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
						<label for="" class="col-form-label">Pilihan A</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="bobot[]" class="form-control">
                        <label for="" class="col-form-label">Bobot A</label>
					</div>

					<div class="form-floating">
						<textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
						<label for="" class="col-form-label">Pilihan B</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="bobot[]" class="form-control">
                        <label for="" class="col-form-label">Bobot B</label>
					</div>

					<div class="form-floating">
						<textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
						<label for="" class="col-form-label">Pilihan C</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="bobot[]" class="form-control">
                        <label for="" class="col-form-label">Bobot C</label>
					</div>

					<div class="form-floating">
						<textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
						<label for="" class="col-form-label">Pilihan D</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="bobot[]" class="form-control">
                        <label for="" class="col-form-label">Bobot D</label>
					</div>

					<div class="form-floating">
						<textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
						<label for="" class="col-form-label">Pilihan E</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" name="bobot[]" class="form-control">
                        <label for="" class="col-form-label">Bobot E</label>
					</div>

				</div>
				<div class="d-flex justify-content-center mb-3">
					<span>
						<button type="button" class="btn btn-sm btn-danger btnRemoveFormBobot me-3">
							<svg width="24" height="24">
								<use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-minus" />
							</svg>
						</button>
					</span>
					<span>
						<button type="button" class="btn btn-sm btn-success btnAddFormBobot">
							<svg width="24" height="24">
								<use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-plus" />
							</svg>
						</button>
					</span>
				</div>
				<div class="form-floating mb-3">
					<select name="penulisan" class="form-control required">
						<option value="">Pilih Arah</option>
						<option value="LTR">LTR</option>
						<option value="RTL">RTL</option>
					</select>
					<label for="">Arah Penulisan</label>
				</div>
			`;

			$(form + " .modal-body").html(html);
			CKEDITOR.replace("form-text");

			// pembahasan
			CKEDITOR.replace("form-text-benar");
			CKEDITOR.replace("form-text-salah");
		} else if (item == "petunjuk") {
			html += `
				<div class="mb-3">
					<textarea name="soal" class='ckeditor' id='form-text'></textarea>
				</div>
				<div class="form-floating mb-3" style="display:none">
					<input type="text" name="waktu_soal" class="form-control">
					<label for="" class="col-form-label">Waktu Soal (detik)</label>
				</div>
				<div class="form-floating mb-3">
					<select name="penulisan" class="form-control required">
						<option value="">Pilih Arah</option>
						<option value="LTR">LTR</option>
						<option value="RTL">RTL</option>
					</select>
					<label for="">Arah Penulisan</label>
				</div>
			`;

			$(form + " .modal-body").html(html);
			CKEDITOR.replace("form-text");
		} else if (item == "audio") {
			html += `
            <label for="">Upload Audio</label>
            <div class="form-floating mb-3">
                <input type="file" name="file" id="file" class="form form-control required">\
            </div>`;

			$(form + " .modal-body").html(html);
		} else if (item == "gambar") {
			html += `
            <label for="">Upload Gambar</label>
            <div class="form-floating mb-3">
                <input type="file" name="file" id="file" class="form form-control required">\
            </div>`;

			$(form + " .modal-body").html(html);
		}

		$(form + " .modal-footer").removeClass(`d-flex justify-content-end`);
		$(form + " .modal-footer").addClass(`d-flex justify-content-between`);
		$(form + " .modal-footer").html(
			`
            <div>
                <button type="button" class="btn btn-success btnBack">
                    <svg width="18" height="18">
                        <use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-left" />
                    </svg> 
                    Back 
                </button>
            </div>
            <div>
                <button type="button" class="btn mr-3" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-success btnAdd">
                    <svg width="18" height="18">
                        <use xlink:href="` +
				url_base +
				`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-plus" />
                    </svg> 
                    Add 
                </button>
            </div>
        `
		);
	}
});

$(document).on("click", "#addItem .btnRemoveForm", function () {
	if (count_choice > 2) {
		count_choice--;
		$("#addItem .choice").children().last().remove();

		$("#addItem [name='choice_jawaban']").children().last().remove();
	} else {
		Swal.fire({
			icon: "error",
			title: "Oopss...",
			text: "Pilihan minimal adalah 2",
		});
	}
});

$(document).on("click", "#addItem .btnAddForm", function () {
	count_choice++;

	i = 64 + count_choice;
	html =
		`
            <div class="form-floating mb-3">
                <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                <label for="" class="col-form-label">Pilihan ` +
		String.fromCharCode(i) +
		`</label>
            </div>`;
	$("#addItem .choice").append(html);
	$("#addItem [name='choice_jawaban']").append(
		`<option value='Pilihan ` +
			String.fromCharCode(i) +
			`'>Pilihan ` +
			String.fromCharCode(i) +
			`</option>`
	);
});

$(document).on("click", "#editItem .btnRemoveForm", function () {
	if (count_choice > 2) {
		count_choice--;
		$("#editItem .choice").children().last().remove();

		$("#editItem [name='choice_jawaban']").children().last().remove();
	} else {
		Swal.fire({
			icon: "error",
			title: "Oopss...",
			text: "Pilihan minimal adalah 2",
		});
	}
});

$(document).on("click", "#editItem .btnAddForm", function () {
	count_choice++;

	i = 64 + count_choice;
	html =
		`
            <div class="form-floating mb-3">
                <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                <label for="" class="col-form-label">Pilihan ` +
		String.fromCharCode(i) +
		`</label>
            </div>`;
	$("#editItem .choice").append(html);
	$("#editItem [name='choice_jawaban']").append(
		`<option value='Pilihan ` +
			String.fromCharCode(i) +
			`'>Pilihan ` +
			String.fromCharCode(i) +
			`</option>`
	);
});

// soal berbobot
$(document).on("click", "#addItem .btnRemoveFormBobot", function () {
	if (count_choice > 2) {
		count_choice--;
		$("#addItem .choice").children().last().remove();

		$("#addItem [name='choice_jawaban']").children().last().remove();
	} else {
		Swal.fire({
			icon: "error",
			title: "Oopss...",
			text: "Pilihan minimal adalah 2",
		});
	}
});

$(document).on("click", "#addItem .btnAddFormBobot", function () {
	count_choice++;

	i = 64 + count_choice;
	html =
		`
            <div class="form-floating">
                <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                <label for="" class="col-form-label">Pilihan ` +
		String.fromCharCode(i) +
		`</label>
            </div>
			<div class="form-floating mb-3">
				<input type="text" name="bobot[]" class="form-control">
				<label for="" class="col-form-label">Bobot C</label>
			</div>
			`;
	$("#addItem .choice").append(html);
	$("#addItem [name='choice_jawaban']").append(
		`<option value='Pilihan ` +
			String.fromCharCode(i) +
			`'>Pilihan ` +
			String.fromCharCode(i) +
			`</option>`
	);
});

$(document).on("click", "#editItem .btnRemoveFormBobot", function () {
	if (count_choice > 2) {
		count_choice--;
		$("#editItem .choice").children().last().remove();

		$("#editItem [name='choice_jawaban']").children().last().remove();
	} else {
		Swal.fire({
			icon: "error",
			title: "Oopss...",
			text: "Pilihan minimal adalah 2",
		});
	}
});

$(document).on("click", "#editItem .btnAddFormBobot", function () {
	count_choice++;

	i = 64 + count_choice;
	html =
		`
            <div class="form-floating">
                <textarea name="pilihan[]" class="form-control" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                <label for="" class="col-form-label">Pilihan ` +
		String.fromCharCode(i) +
		`</label>
            </div>
			<div class="form-floating mb-3">
				<input type="text" name="bobot[]" class="form-control">
				<label for="" class="col-form-label">Bobot ` +
		String.fromCharCode(i) +
		`</label>
			</div>
			`;
	$("#editItem .choice").append(html);
	$("#editItem [name='choice_jawaban']").append(
		`<option value='Pilihan ` +
			String.fromCharCode(i) +
			`'>Pilihan ` +
			String.fromCharCode(i) +
			`</option>`
	);
});

$(document).on("change keyup", "[name='pilihan[]']", function () {
	$("[name='jawaban']").val("");
	$("[name='choice_jawaban']").val("");
});

$(document).on("change", "#addItem [name='choice_jawaban']", function () {
	let value = $(this).val();
	let element = $("#addItem .choice label:contains(" + value + ")").prev();
	$("#addItem [name='jawaban']").val(element.val());
});

$(document).on("change", "#editItem [name='choice_jawaban']", function () {
	let value = $(this).val();
	let element = $("#editItem .choice label:contains(" + value + ")").prev();
	$("#editItem [name='jawaban']").val(element.val());
});

$(document).on("click", "#addItem .btnAdd", function () {
	let form = "#addItem";
	let item = $(form + " input[name='item']").val();

	if (item == "soal") {
		Swal.fire({
			icon: "question",
			text: "Yakin akan menambahkan soal baru?",
			showCloseButton: true,
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
		}).then(function (result) {
			if (result.value) {
				let id_sub = $(form + " input[name='id_sub']").val();
				let tipe_soal = $(form + " input[name='tipe_soal']").val();
				let soal = CKEDITOR.instances["form-text"].getData();
				soal = soal.replace(/"/g, "'");

				let pilihan = "";

				$(form + " [name='pilihan[]']").each(function () {
					if ($(this).val() != "") {
						// tambahan
						pilihan_jawaban = $(this).val().replace(/"/g, "&quot;");
						pilihan += `"` + pilihan_jawaban + `",`;
						// tambahan
						// pilihan += `"`+$(this).val()+`",`;
					}
				});

				// remove last character
				pilihan = pilihan.slice(0, -1);

				let jawaban = $(form + " textarea[name='jawaban']").val();
				// tambahan
				jawaban = jawaban.replace(/"/g, "&quot;");
				// tambahan
				let penulisan = $(form + " select[name='penulisan']").val();
				let id_text = $(form + " select[name='id_text']").val();
				let waktu_soal = $(form + " [name='waktu_soal']").val();

				let eror = required(form);

				if (soal == "") soal = "";

				if (eror == 1) {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "lengkapi isi form terlebih dahulu",
					});
				} else {
					// tanpa pembahasan
					// let data_soal = `{"soal":"`+soal+`","pilihan":[`+pilihan+`],"jawaban":"`+jawaban+`"}`;

					// pembahasan
					let data_soal =
						`{"soal":"` +
						soal +
						`","pilihan":[` +
						pilihan +
						`],"jawaban":"` +
						jawaban +
						`"}`;

					let data = {
						id_sub: id_sub,
						tipe_soal: tipe_soal,
						item: item,
						data_soal: data_soal,
						penulisan: penulisan,
						id_text: id_text,
						waktu_soal: waktu_soal,
					};
					let result = ajax(url_base + "subsoal/add_item_soal", "POST", data);
					if (result == 1) {
						Swal.fire({
							position: "center",
							icon: "success",
							text: "Berhasil menambahkan item soal",
							showConfirmButton: false,
							timer: 1500,
						});

						$("#addItem").modal("hide");
						load_item(id);
					} else {
						Swal.fire({
							position: "center",
							icon: "error",
							text: "Gagal menambahkan item soal, silahkan coba refresh page terlebih dahulu",
							showConfirmButton: false,
							timer: 1500,
						});
					}
				}
			}
		});
	} else if (item == "soal berbobot") {
		Swal.fire({
			icon: "question",
			text: "Yakin akan menambahkan soal baru?",
			showCloseButton: true,
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
		}).then(function (result) {
			if (result.value) {
				let id_sub = $(form + " input[name='id_sub']").val();
				let tipe_soal = $(form + " input[name='tipe_soal']").val();
				let soal = CKEDITOR.instances["form-text"].getData();
				soal = soal.replace(/"/g, "'");

				let pilihan = "";

				$(form + " [name='pilihan[]']").each(function () {
					if ($(this).val() != "") {
						// tambahan
						pilihan_jawaban = $(this).val().replace(/"/g, "&quot;");
						pilihan += `"` + pilihan_jawaban + `",`;
						// tambahan
						// pilihan += `"`+$(this).val()+`",`;
					}
				});

				// remove last character
				pilihan = pilihan.slice(0, -1);

				let bobot = "";

				$(form + " [name='bobot[]']").each(function () {
					if ($(this).val() != "") {
						// tambahan
						bobot_jawaban = $(this).val().replace(/"/g, "&quot;");
						bobot += `"` + bobot_jawaban + `",`;
						// tambahan
						// bobot += `"`+$(this).val()+`",`;
					}
				});

				// remove last character
				bobot = bobot.slice(0, -1);

				let jawaban = $(form + " textarea[name='jawaban']").val();
				// tambahan
				// jawaban = jawaban.replace(/"/g, "&quot;");
				// tambahan
				let penulisan = $(form + " select[name='penulisan']").val();
				let id_text = $(form + " select[name='id_text']").val();
				let waktu_soal = $(form + " [name='waktu_soal']").val();

				let eror = required(form);

				if (soal == "") soal = "";

				if (eror == 1) {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "lengkapi isi form terlebih dahulu",
					});
				} else {
					// tanpa pembahasan
					// let data_soal = `{"soal":"`+soal+`","pilihan":[`+pilihan+`],"jawaban":"`+jawaban+`"}`;

					// pembahasan
					let data_soal =
						`{"soal":"` +
						soal +
						`","pilihan":[` +
						pilihan +
						`],"bobot":[` +
						bobot +
						`]}`;

					let data = {
						id_sub: id_sub,
						tipe_soal: tipe_soal,
						item: item,
						data_soal: data_soal,
						penulisan: penulisan,
						id_text: id_text,
						waktu_soal: waktu_soal,
					};
					let result = ajax(url_base + "subsoal/add_item_soal", "POST", data);
					if (result == 1) {
						Swal.fire({
							position: "center",
							icon: "success",
							text: "Berhasil menambahkan item soal",
							showConfirmButton: false,
							timer: 1500,
						});

						$("#addItem").modal("hide");
						load_item(id);
					} else {
						Swal.fire({
							position: "center",
							icon: "error",
							text: "Gagal menambahkan item soal, silahkan coba refresh page terlebih dahulu",
							showConfirmButton: false,
							timer: 1500,
						});
					}
				}
			}
		});
	} else if (item == "petunjuk") {
		Swal.fire({
			icon: "question",
			text: "Yakin akan menambahkan petunjuk atau teks baru?",
			showCloseButton: true,
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
		}).then(function (result) {
			if (result.value) {
				let id_sub = $(form + " input[name='id_sub']").val();
				let tipe_soal = $(form + " input[name='tipe_soal']").val();
				let soal = CKEDITOR.instances["form-text"].getData();
				soal = soal.replace(/"/g, "'");
				let penulisan = $(form + " select[name='penulisan']").val();
				let tampil = $(form + " select[name='tampil']").val();
				let waktu_soal = $(form + " [name='waktu_soal']").val();

				let eror = required(form);

				if (soal == "") eror = 1;

				if (eror == 1) {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "lengkapi isi form terlebih dahulu",
					});
				} else {
					let data = {
						id_sub: id_sub,
						tipe_soal: tipe_soal,
						item: item,
						data_soal: soal,
						penulisan: penulisan,
						tampil: tampil,
						waktu_soal: waktu_soal,
					};
					let result = ajax(url_base + "subsoal/add_item_soal", "POST", data);
					if (result == 1) {
						Swal.fire({
							position: "center",
							icon: "success",
							text: "Berhasil menambahkan item soal",
							showConfirmButton: false,
							timer: 1500,
						});

						$("#addItem").modal("hide");
						load_item(id);
					} else {
						Swal.fire({
							position: "center",
							icon: "error",
							text: "Gagal menambahkan item soal, silahkan coba refresh page terlebih dahulu",
							showConfirmButton: false,
							timer: 1500,
						});
					}
				}
			}
		});
	} else if (item == "audio") {
		var fd = new FormData();
		var files = $("#file")[0].files;

		// Check file selected or not
		if (files.length > 0) {
			Swal.fire({
				icon: "question",
				text: "Yakin akan menambahkan audio baru?",
				showCloseButton: true,
				showCancelButton: true,
				confirmButtonText: "Ya",
				cancelButtonText: "Tidak",
			}).then(function (result) {
				if (result.value) {
					fd.append("file", files[0]);
					fd.append("id_sub", $(form + " input[name='id_sub']").val());
					fd.append("item", item);

					let eror = required(form);

					if (eror == 1) {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "lengkapi isi form terlebih dahulu",
						});
					} else {
						loading();

						$.ajax({
							url: url_base + "subsoal/add_item_soal",
							type: "post",
							data: fd,
							contentType: false,
							processData: false,
							success: function (response) {
								if (response == 1) {
									Swal.fire({
										position: "center",
										icon: "success",
										text: "Berhasil mengupload file",
										showConfirmButton: false,
										timer: 1500,
									});
								} else if (response == 2) {
									Swal.fire({
										position: "center",
										icon: "error",
										text: "Gagal mengupload file. Format file harus mp3",
										showConfirmButton: false,
										timer: 1500,
									});
								} else if (response == 0) {
									Swal.fire({
										position: "center",
										icon: "error",
										text: "Gagal mengupload file",
										showConfirmButton: false,
										timer: 1500,
									});
								}

								$("#addItem").modal("hide");
								load_item(id);
							},
						});
					}
				}
			});
		} else {
			Swal.fire({
				position: "center",
				icon: "error",
				text: "Pilih file terlebih dahulu",
				showConfirmButton: false,
				timer: 1500,
			});
		}
	} else if (item == "gambar") {
		var fd = new FormData();
		var files = $("#file")[0].files;

		// Check file selected or not
		if (files.length > 0) {
			Swal.fire({
				icon: "question",
				text: "Yakin akan menambahkan gambar baru?",
				showCloseButton: true,
				showCancelButton: true,
				confirmButtonText: "Ya",
				cancelButtonText: "Tidak",
			}).then(function (result) {
				if (result.value) {
					fd.append("file", files[0]);
					fd.append("id_sub", $(form + " input[name='id_sub']").val());
					fd.append("item", item);

					let eror = required(form);

					if (eror == 1) {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "lengkapi isi form terlebih dahulu",
						});
					} else {
						loading();

						$.ajax({
							url: url_base + "subsoal/add_item_soal",
							type: "post",
							data: fd,
							contentType: false,
							processData: false,
							success: function (response) {
								if (response == 1) {
									Swal.fire({
										position: "center",
										icon: "success",
										text: "Berhasil mengupload file",
										showConfirmButton: false,
										timer: 1500,
									});
								} else if (response == 2) {
									Swal.fire({
										position: "center",
										icon: "error",
										text: "Gagal mengupload file",
										showConfirmButton: false,
										timer: 1500,
									});
								} else if (response == 0) {
									Swal.fire({
										position: "center",
										icon: "error",
										text: "Gagal mengupload file",
										showConfirmButton: false,
										timer: 1500,
									});
								}

								$("#addItem").modal("hide");
								load_item(id);
							},
						});
					}
				}
			});
		} else {
			Swal.fire({
				position: "center",
				icon: "error",
				text: "Pilih file terlebih dahulu",
				showConfirmButton: false,
				timer: 1500,
			});
		}
	}
});

// ketika menghapus item
$(document).on("click", ".hapusItem", function () {
	let id_item = $(this).data("id");

	Swal.fire({
		icon: "question",
		text: "Yakin akan menghapus item ini?",
		showCloseButton: true,
		showCancelButton: true,
		confirmButtonText: "Ya",
		cancelButtonText: "Tidak",
	}).then(function (result) {
		if (result.value) {
			data = { id_item: id_item };
			let result = ajax(url_base + "subsoal/hapus_item_soal", "POST", data);

			if (result == 1) {
				load_item(id);
				// ???
				Swal.fire({
					position: "center",
					icon: "success",
					text: "Berhasil menghapus item",
					showConfirmButton: false,
					timer: 1500,
				});
			} else {
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: "terjadi kesalahan, gagal menghapus item",
				});
			}
		}
	});
});

$(document).on("click", ".editItem", function () {
	let form = "#editItem";

	let id_item = $(this).data("id");
	let data = { id_item: id_item };
	let result = ajax(url_base + "subsoal/get_item_soal", "POST", data);
	let rtl = "";
	let ltr = "";

	$(form + " input[name='id_item']").val(id_item);
	$(form + " input[name='item']").val(result.item);

	if (result.penulisan == "RTL") {
		rtl = "selected";
		ltr = "";
	}
	if (result.penulisan == "LTR") {
		rtl = "";
		ltr = "selected";
	}

	if (result.item == "soal") {
		count_choice = result.pilihan.length;

		let answer_choice = `<option value="">Pilih Jawaban</option>`;
		let pilihan = "";

		result.pilihan.forEach((choice, index) => {
			i = 65 + index;
			pilihan +=
				`
            <div class="form-floating mb-3">
                <textarea name="pilihan[]" class="form-control required" data-bs-toggle="autosize" placeholder="Type something…">` +
				choice +
				`</textarea>
                <label for="" class="col-form-label">Pilihan ` +
				String.fromCharCode(i) +
				`</label>
            </div>`;

			if (choice == result.jawaban)
				answer_choice +=
					`<option selected value="Pilihan ` +
					String.fromCharCode(i) +
					`">Pilihan ` +
					String.fromCharCode(i) +
					`</option>`;
			else
				answer_choice +=
					`<option value="Pilihan ` +
					String.fromCharCode(i) +
					`">Pilihan ` +
					String.fromCharCode(i) +
					`</option>`;
		});

		let id_sub = $("#addItem [name='id_sub']").val();

		// pembahasan
		pembahasan =
			`
            <div class="mb-3">
                <label class="mb-3">Pembahasan Jika Jawaban Benar</label>
                <textarea name="pembahasan_benar" class='ckeditor' id='form-text-edit-benar'>` +
			result.pembahasan_benar +
			`</textarea>
            </div>
            <div class="mb-3">
                <label class="mb-3">Pembahasan Jika Jawaban Salah</label>
                <textarea name="pembahasan_salah" class='ckeditor' id='form-text-edit-salah'>` +
			result.pembahasan_salah +
			`</textarea>
            </div>`;

		html =
			`
			<div class="mb-3">
				<textarea name="soal" class='ckeditor' id='form-text-edit'>` +
			result.soal +
			`</textarea>
			</div>
			<div class="choice">
				` +
			pilihan +
			`
			</div>
			<div class="d-flex justify-content-center mb-3">
				<span>
					<button type="button" class="btn btn-sm btn-danger btnRemoveForm me-3">
						<svg width="24" height="24">
							<use xlink:href="` +
			url_base +
			`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-minus" />
						</svg>
					</button>
				</span>
				<span>
					<button type="button" class="btn btn-sm btn-success btnAddForm">
						<svg width="24" height="24">
							<use xlink:href="` +
			url_base +
			`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-plus" />
						</svg>
					</button>
				</span>
			</div>
			<div class="form-floating mb-3">
				<select name="choice_jawaban" class="form-control required">
					<option value="">Pilih Jawaban</option>
				</select>
				<label for="">Pilih Jawaban</label>
			</div>
			<div class="form-floating mb-3">
				<textarea name="jawaban" class="form-control required" data-bs-toggle="autosize" placeholder="Type something…" readonly>` +
			result.jawaban +
			`</textarea>
				<label for="" class="col-form-label">Jawaban</label>
			</div>
			<div class="form-floating mb-3" style="display:none">
				<input type="text" name="waktu_soal" class="form-control" value="` +
			result.waktu_soal +
			`">
				<label for="" class="col-form-label">Waktu Soal (detik)</label>
			</div>
			<div class="form-floating mb-3">
				<select name="penulisan" class="form-control required">
					<option value="">Pilih Arah</option>
					<option value="LTR" ${ltr}>LTR</option>
					<option value="RTL" ${rtl}>RTL</option>
				</select>
				<label for="">Arah Penulisan</label>
			</div>
			`;

		$(form + " .modal-body").html(html);
		$(form + " [name='choice_jawaban']").html(answer_choice);
		CKEDITOR.replace("form-text-edit");
		CKEDITOR.replace("form-text-edit-benar");
		CKEDITOR.replace("form-text-edit-salah");
	} else if (result.item == "soal berbobot") {
		count_choice = result.pilihan.length;

		let answer_choice = `<option value="">Pilih Jawaban</option>`;
		let pilihan = "";

		result.pilihan.forEach((choice, index) => {
			i = 65 + index;
			pilihan +=
				`
            <div class="form-floating">
                <textarea name="pilihan[]" class="form-control required" data-bs-toggle="autosize" placeholder="Type something…">` +
				choice +
				`</textarea>
                <label for="" class="col-form-label">Pilihan ` +
				String.fromCharCode(i) +
				`</label>
            </div>
			<div class="form-floating mb-3">
				<input type="text" name="bobot[]" class="form-control" value="${result.bobot[index]}">
				<label for="" class="col-form-label">Bobot ` +
				String.fromCharCode(i) +
				`</label>
			</div>
			`;
		});

		let id_sub = $("#addItem [name='id_sub']").val();

		html =
			`
			<div class="mb-3">
				<textarea name="soal" class='ckeditor' id='form-text-edit'>` +
			result.soal +
			`</textarea>
			</div>
			<div class="choice">
				` +
			pilihan +
			`
			</div>
			<div class="d-flex justify-content-center mb-3">
				<span>
					<button type="button" class="btn btn-sm btn-danger btnRemoveFormBobot me-3">
						<svg width="24" height="24">
							<use xlink:href="` +
			url_base +
			`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-minus" />
						</svg>
					</button>
				</span>
				<span>
					<button type="button" class="btn btn-sm btn-success btnAddFormBobot">
						<svg width="24" height="24">
							<use xlink:href="` +
			url_base +
			`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-plus" />
						</svg>
					</button>
				</span>
			</div>
			<div class="form-floating mb-3">
				<select name="penulisan" class="form-control required">
					<option value="">Pilih Arah</option>
					<option value="LTR" ${ltr}>LTR</option>
					<option value="RTL" ${rtl}>RTL</option>
				</select>
				<label for="">Arah Penulisan</label>
			</div>
			`;

		$(form + " .modal-body").html(html);
		$(form + " [name='choice_jawaban']").html(answer_choice);
		CKEDITOR.replace("form-text-edit");
		CKEDITOR.replace("form-text-edit-benar");
		CKEDITOR.replace("form-text-edit-salah");
	} else if (result.item == "petunjuk") {
		if (result.penulisan == "RTL") {
			rtl = "selected";
			ltr = "";
		}
		if (result.penulisan == "LTR") {
			rtl = "";
			ltr = "selected";
		}

		html =
			`
                <div class="mb-3">
                    <textarea name="soal" class='ckeditor' id='form-text-edit'>` +
			result.data +
			`</textarea>
                </div>
                <div class="form-floating mb-3" style="display:none">
                    <input type="text" name="waktu_soal" class="form-control" value="` +
			result.waktu_soal +
			`">
                    <label for="" class="col-form-label">Waktu Soal (detik)</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="penulisan" class="form-control required">
                        <option value="">Pilih Arah</option>
                        <option value="LTR" ${ltr}>LTR</option>
                        <option value="RTL" ${rtl}>RTL</option>
                    </select>
                    <label for="">Arah Penulisan</label>
                </div>
            `;

		$(form + " .modal-body").html(html);
		CKEDITOR.replace("form-text-edit");
	} else if (result.item == "audio") {
		file = result.data;

		result = ajax(url_base + "audio/get_all_audio");

		console.log(result);

		html = "";
		if (result.length != 0) {
			audio = "";
			result.forEach((data) => {
				if (file == data.id_audio) {
					audio +=
						`
                        <option value="` +
						data.id_audio +
						`" selected>` +
						data.nama_audio +
						`</option>`;
				} else {
					audio +=
						`
                        <option value="` +
						data.id_audio +
						`">` +
						data.nama_audio +
						`</option>`;
				}
			});

			html +=
				`
            <div class="form-floating mb-3">
                <select name="audio" class="form-control required">
                    <option value="">Pilih Audio</option>
                    ` +
				audio +
				`
                </select>
                <label for="">Audio</label>
            </div>`;
		} else {
			Swal.fire({
				icon: "error",
				title: "Oops...",
				text: "list audio kosong",
			});

			return;
		}

		$(form + " .modal-body").html(html);
	}

	$(form + " .modal-footer").addClass(`d-flex justify-content-end`);
	$(form + " .modal-footer").html(`
        <div>
            <button type="button" class="btn mr-3" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success btnEdit">
                Edit 
            </button>
        </div>
    `);
});

$(document).on("click", "#editItem .btnEdit", function () {
	let form = "#editItem";
	let item = $(form + " input[name='item']").val();

	if (item == "soal") {
		Swal.fire({
			icon: "question",
			text: "Yakin akan mengubah soal?",
			showCloseButton: true,
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
		}).then(function (result) {
			if (result.value) {
				let id_item = $(form + " input[name='id_item']").val();
				let soal = CKEDITOR.instances["form-text-edit"].getData();
				soal = soal.replace(/"/g, "'");

				let pilihan = "";
				$(form + " [name='pilihan[]']").each(function () {
					// tambahan
					pilihan_jawaban = $(this).val().replace(/"/g, "&quot;");
					pilihan += `"` + pilihan_jawaban + `",`;
					// tambahan
					// pilihan += `"`+$(this).val()+`",`;
				});
				// remove last character
				pilihan = pilihan.slice(0, -1);

				let jawaban = $(form + " textarea[name='jawaban']").val();
				// tambahan
				jawaban = jawaban.replace(/"/g, "&quot;");
				// tambahan
				let penulisan = $(form + " select[name='penulisan']").val();
				let id_text = $(form + " select[name='id_text']").val();
				let waktu_soal = $(form + " [name='waktu_soal']").val();

				let eror = required(form);

				if (soal == "") soal = "";

				if (eror == 1) {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "lengkapi isi form terlebih dahulu",
					});
				} else {
					// tanpa pembahasan
					// let data_soal = `{"soal":"`+soal+`","pilihan":[`+pilihan+`],"jawaban":"`+jawaban+`"}`;

					// pembahasan
					let data_soal =
						`{"soal":"` +
						soal +
						`","pilihan":[` +
						pilihan +
						`],"jawaban":"` +
						jawaban +
						`","pembahasan_benar":"` +
						pembahasan_benar +
						`","pembahasan_salah":"` +
						pembahasan_salah +
						`"}`;
					// let data_soal = soal+"###"+pilihan_a+"///"+pilihan_b+"///"+pilihan_c+"///"+pilihan_d+"###"+jawaban
					let data = {
						id_item: id_item,
						data_soal: data_soal,
						penulisan: penulisan,
						id_text: id_text,
						waktu_soal: waktu_soal,
					};
					let result = ajax(url_base + "subsoal/edit_item_soal", "POST", data);
					if (result == 1) {
						Swal.fire({
							position: "center",
							icon: "success",
							text: "Berhasil mengubah item soal",
							showConfirmButton: false,
							timer: 1500,
						});

						$("#addItem").modal("hide");
						load_item(id);
					} else {
						Swal.fire({
							position: "center",
							icon: "error",
							text: "Gagal mengubah item soal, silahkan coba refresh page terlebih dahulu",
							showConfirmButton: false,
							timer: 1500,
						});
					}
				}
				// console.log(id_sub, tipe_soal, item, soal, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban, penulisan);
			}
		});
	} else if (item == "soal berbobot") {
		Swal.fire({
			icon: "question",
			text: "Yakin akan mengubah soal?",
			showCloseButton: true,
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
		}).then(function (result) {
			if (result.value) {
				let id_item = $(form + " input[name='id_item']").val();
				let soal = CKEDITOR.instances["form-text-edit"].getData();
				soal = soal.replace(/"/g, "'");

				let pilihan = "";
				$(form + " [name='pilihan[]']").each(function () {
					// tambahan
					pilihan_jawaban = $(this).val().replace(/"/g, "&quot;");
					pilihan += `"` + pilihan_jawaban + `",`;
					// tambahan
					// pilihan += `"`+$(this).val()+`",`;
				});
				// remove last character
				pilihan = pilihan.slice(0, -1);

				let bobot = "";
				$(form + " [name='bobot[]']").each(function () {
					// tambahan
					bobot_jawaban = $(this).val().replace(/"/g, "&quot;");
					bobot += `"` + bobot_jawaban + `",`;
					// tambahan
					// bobot += `"`+$(this).val()+`",`;
				});
				// remove last character
				bobot = bobot.slice(0, -1);

				let penulisan = $(form + " select[name='penulisan']").val();
				let id_text = $(form + " select[name='id_text']").val();
				let waktu_soal = $(form + " [name='waktu_soal']").val();

				let eror = required(form);

				if (soal == "") soal = "";

				if (eror == 1) {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "lengkapi isi form terlebih dahulu",
					});
				} else {
					// tanpa pembahasan
					// let data_soal = `{"soal":"`+soal+`","pilihan":[`+pilihan+`],"jawaban":"`+jawaban+`"}`;

					// pembahasan
					let data_soal =
						`{"soal":"` +
						soal +
						`","pilihan":[` +
						pilihan +
						`],"bobot":[` +
						bobot +
						`]}`;
					// let data_soal = soal+"###"+pilihan_a+"///"+pilihan_b+"///"+pilihan_c+"///"+pilihan_d+"###"+jawaban
					let data = {
						id_item: id_item,
						data_soal: data_soal,
						penulisan: penulisan,
						id_text: id_text,
						waktu_soal: waktu_soal,
					};
					let result = ajax(url_base + "subsoal/edit_item_soal", "POST", data);
					if (result == 1) {
						Swal.fire({
							position: "center",
							icon: "success",
							text: "Berhasil mengubah item soal",
							showConfirmButton: false,
							timer: 1500,
						});

						$("#addItem").modal("hide");
						load_item(id);
					} else {
						Swal.fire({
							position: "center",
							icon: "error",
							text: "Gagal mengubah item soal, silahkan coba refresh page terlebih dahulu",
							showConfirmButton: false,
							timer: 1500,
						});
					}
				}
				// console.log(id_sub, tipe_soal, item, soal, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban, penulisan);
			}
		});
	} else if (item == "petunjuk") {
		Swal.fire({
			icon: "question",
			text: "Yakin akan mengubah petunjuk atau teks?",
			showCloseButton: true,
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
		}).then(function (result) {
			if (result.value) {
				let id_item = $(form + " input[name='id_item']").val();
				let soal = CKEDITOR.instances["form-text-edit"].getData();
				soal = soal.replace(/"/g, "'");
				let penulisan = $(form + " select[name='penulisan']").val();
				let tampil = $(form + " select[name='tampil']").val();
				let waktu_soal = $(form + " [name='waktu_soal']").val();

				let eror = required(form);

				if (soal == "") eror = 1;

				if (eror == 1) {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "lengkapi isi form terlebih dahulu",
					});
				} else {
					let data = {
						id_item: id_item,
						data_soal: soal,
						penulisan: penulisan,
						tampil: tampil,
						waktu_soal: waktu_soal,
					};
					let result = ajax(url_base + "subsoal/edit_item_soal", "POST", data);
					if (result == 1) {
						Swal.fire({
							position: "center",
							icon: "success",
							text: "Berhasil mengubah item",
							showConfirmButton: false,
							timer: 1500,
						});

						$("#addItem").modal("hide");
						load_item(id);
					} else {
						Swal.fire({
							position: "center",
							icon: "error",
							text: "Gagal mengubah item, silahkan coba refresh page terlebih dahulu",
							showConfirmButton: false,
							timer: 1500,
						});
					}
				}
				// console.log(id_sub, tipe_soal, item, soal, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban, penulisan);
			}
		});
	} else if (item == "audio") {
		Swal.fire({
			icon: "question",
			text: "Yakin akan mengubah audio?",
			showCloseButton: true,
			showCancelButton: true,
			confirmButtonText: "Ya",
			cancelButtonText: "Tidak",
		}).then(function (result) {
			if (result.value) {
				let id_item = $(form + " input[name='id_item']").val();
				let audio = $(form + " select[name='audio']").val();
				let penulisan = "";

				let eror = required(form);

				if (soal == "") eror = 1;

				if (eror == 1) {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "lengkapi isi form terlebih dahulu",
					});
				} else {
					let data = {
						id_item: id_item,
						data_soal: audio,
						penulisan: penulisan,
					};
					let result = ajax(url_base + "subsoal/edit_item_soal", "POST", data);
					if (result == 1) {
						Swal.fire({
							position: "center",
							icon: "success",
							text: "Berhasil mengubah audio",
							showConfirmButton: false,
							timer: 1500,
						});

						$("#addItem").modal("hide");
						load_item(id);
					} else {
						Swal.fire({
							position: "center",
							icon: "error",
							text: "Gagal mengubah item, silahkan coba refresh page terlebih dahulu",
							showConfirmButton: false,
							timer: 1500,
						});
					}
				}
				// console.log(id_sub, tipe_soal, item, soal, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban, penulisan);
			}
		});
	}
});

$(document).on("click", ".saveUrutan", function () {
	// console.log("cek"
	Swal.fire({
		icon: "question",
		text: "Yakin akan mengubah urutan?",
		showCloseButton: true,
		showCancelButton: true,
		confirmButtonText: "Ya",
		cancelButtonText: "Tidak",
	}).then(function (result) {
		if (result.value) {
			id_item = [];
			$("#dataAjax input[name='id_item']").each(function () {
				id_item.push($(this).val());
			});

			let data = { id_item: id_item };
			let result = ajax(url_base + "subsoal/edit_urutan_soal", "POST", data);
			if (result == 1) {
				load_item(id);
				Swal.fire({
					position: "center",
					icon: "success",
					text: "Berhasil mengubah urutan",
					showConfirmButton: false,
					timer: 1500,
				});
				$("#saveButton").addClass("text-dark");
			}
		}
	});
});

function textReading(id_sub, id_text = "", display = "") {
	let result = ajax(url_base + "subsoal/get_text_reading", "POST", {
		id_sub: id_sub,
	});

	html =
		`
        <div class="form-floating mb-3" style="display:` +
		display +
		`">
            <select name="id_text" class="form-control">
                <option value="0">Tidak Ada Text</option>
        `;

	result.forEach((text) => {
		if (id_text == text.id_item)
			html +=
				`<option value="` +
				text.id_item +
				`" selected>` +
				text.data +
				`</option>`;
		else
			html += `<option value="` + text.id_item + `">` + text.data + `</option>`;
	});

	html += `
        </select>
        <label for="">Pilih Text</label>
    </div>`;

	return html;
}

$(document).on("click", ".btnPlay", function () {
	let total = $(this).data("total");
	let range = $(this).data("range");

	var vid = document.getElementById("audioPlayer");
	vid.currentTime = total;
	vid.play();

	range = (parseInt(range) + 1) * 1000;

	setTimeout(function () {
		vid.pause();
	}, range);
});
