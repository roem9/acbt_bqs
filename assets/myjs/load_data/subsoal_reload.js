var datatable = $("#dataTable").DataTable({
	initComplete: function () {
		var api = this.api();
		$("#mytable_filter input")
			.off(".DT")
			.on("input.DT", function () {
				api.search(this.value).draw();
			});
	},
	oLanguage: {
		sProcessing: "loading...",
	},
	processing: true,
	serverSide: true,
	ajax: { url: url_base + "subsoal/loadsubsoal", type: "POST" },
	columns: [
		{ data: "tgl_pembuatan" },
		// { data: "waktu", className: "w-1 text-center" },
		// {"data": "tipe_soal"},
		{ data: "nama_sub" },
		{
			data: "soal",
			render: function (data) {
				if (jQuery.browser.mobile == true) return data;
				else return "<center>" + data + "</center>";
			},
		},
		{ data: "tipe_soal" },
		// {"data": "catatan"},
		{
			data: "action",
			orderable: false,
			render: function (data) {
				if (jQuery.browser.mobile == true) return data;
				else return "<center>" + data + "</center>";
			},
		},
	],
	order: [[0, "desc"]],
	rowCallback: function (row, data, iDisplayIndex) {
		var info = this.fnPagingInfo();
		var page = info.iPage;
		var length = info.iLength;
		$("td:eq(0)", row).html();
	},
	columnDefs: [
		{ searchable: false, targets: "" }, // Disable search on first and last columns
		// { targets: 4, className: "text-wrap" },
	],
	rowReorder: {
		selector: "td:nth-child(0)",
	},
	responsive: true,
});
