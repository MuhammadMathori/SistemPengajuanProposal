let jquery_datatable = $("#table1").DataTable({
    responsive: true,
    order: [],
    dom: "Bfrtip", // tambahkan tombol di #table1 juga
    buttons: [
        {
            extend: "excelHtml5",
            text: '<i class="bi bi-file-earmark-excel-fill"></i> <span>Export</span>',
            className: "btn btn-success btn-sm mb-2",
        },
    ],
});

let customized_datatable = $("#table2").DataTable({
    responsive: true,
    pagingType: "simple",
    dom:
        // Tambahkan B untuk buttons
        "B<'row'<'col-3'l><'col-9'f>>" +
        "<'row dt-row'<'col-sm-12'tr>>" +
        "<'row'<'col-4'i><'col-8'p>>",
    buttons: [
        {
            extend: "excelHtml5",
            text: "Export Excel",
            className: "btn btn-success btn-sm mb-2",
        },
    ],
    language: {
        info: "Page _PAGE_ of _PAGES_",
        lengthMenu: "_MENU_ ",
        search: "",
        searchPlaceholder: "Search..",
    },
    order: [],
});

const setTableColor = () => {
    document
        .querySelectorAll(".dataTables_paginate .pagination")
        .forEach((dt) => {
            dt.classList.add("pagination-primary");
        });
};
setTableColor();

jquery_datatable.on("draw", setTableColor);
customized_datatable.on("draw", setTableColor); // jangan lupa buat table2 juga
