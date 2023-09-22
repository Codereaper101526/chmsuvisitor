var table = new DataTable('#myTables', {
    columnDefs: [{ width: 120, targets: 0 }],
    fixedColumns: true,
    order: [[0, 'desc']], 
    lengthMenu: [[4,10,50], [4,10,50]],
    pageLength: 4, // defualt entries
});

// zoomable image in the table
$(document).ready(function() {
    $('#myTables').on('mouseenter', '.zoomable-image', function() {
      $(this).addClass('zoomed');
    });

    $('#myTables').on('mouseleave', '.zoomable-image', function() {
      $(this).removeClass('zoomed');
    });
  });