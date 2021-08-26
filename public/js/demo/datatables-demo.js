// Call the dataTables jQuery plugin
$(document).ready(function() {
  console.log('pt');
  $('#dataTable').DataTable({
     "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
      },
      "responsive": true,
      "autoWidth": false,
      "ordering": true,
      "aoColumnDefs": [{
          'bSortable': false,
          'aTargets': [4]
        },
        {
          'bSortable': false,
          'aTargets': [6]
        },
        {
          'bSortable': false,
          'aTargets': [7]
        }
      ],
  });
});
