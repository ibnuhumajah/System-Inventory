// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "aaSorting":[[ 0, "desc" ]]
  });
});

$(document).ready(function() {
  $('#dataTable1').DataTable({
    lengthMenu: [4, 10, 25, 50, 100],
    "aaSorting":[[ 0, "desc" ]]
  });
});
