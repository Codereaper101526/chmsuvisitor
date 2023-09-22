new DataTable('#myTable', {
    columnDefs: [{ width: 120, targets: 0 }],
    fixedColumns: true,
    order: [[1, 'desc']],
    lengthMenu: [[8,10,20], [8,10,20]],
    pageLength: 8, // defualt entries
});