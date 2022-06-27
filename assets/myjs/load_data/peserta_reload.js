var datatable = $('#dataTable').DataTable({ 
    initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
            .off('.DT')
            .on('input.DT', function() {
                api.search(this.value).draw();
        });
    },
    oLanguage: {
    sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    ajax: {"url": url_base+"peserta/loadPeserta", "type": "POST"},
    columns: [
        {"data": "tgl_input"},
        {"data": "nama_peserta"},
        {"data": "no_hp"},
        {"data": "email"},
        {"data": "tampilan_soal"},
        {"data": "jumlah_tes"},
        {"data": "action"},
    ],
    order: [[1, 'desc']],
    rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
    },
    "columnDefs": [
    { "searchable": false, "targets": "" },  // Disable search on first and last columns
    { "targets": [4], "orderable": false},
    ],
    "rowReorder": {
        "selector": 'td:nth-child(0)'
    },
    "responsive": true
});