var table = new DataTable('#myTable', {
    columnDefs: [{ width: 120, targets: 0 }],
    fixedColumns: true,
    order: [[0, 'desc']] // Use column index 0 (ID column) for sorting
});
    
