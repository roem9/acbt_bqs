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
	ajax: { url: url_base + "soal/loadSoal", type: "POST" },
	columns: [
		{ data: "status" },
		{ data: "nama_soal" },
		{
			data: "soal",
			render: function (data) {
				if (jQuery.browser.mobile == true) return data;
				else return "<center>" + data + "</center>";
			},
		},
		{ data: "catatan" },
		{ data: "tgl_pembuatan" },
		{
			data: "action",
			render: function (data) {
				if (jQuery.browser.mobile == true) return data;
				else return "<center>" + data + "</center>";
			},
		},
	],
	order: [[4, "desc"]],
	rowCallback: function (row, data, iDisplayIndex) {
		var info = this.fnPagingInfo();
		var page = info.iPage;
		var length = info.iLength;
		$("td:eq(0)", row).html();
	},
	columnDefs: [
		{ searchable: false, targets: "" }, // Disable search on first and last columns
		{ targets: [2, 4, 5], orderable: false },
		{ targets: 2, className: "text-wrap" },
	],
	rowReorder: {
		selector: "td:nth-child(0)",
	},
	responsive: true,
});
