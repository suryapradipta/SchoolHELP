$('#schooltbl').dataTable( {
  scrollY: 270,
   scrollX: true,
} );

$('#schooltblionreg').dataTable( {
   scrollX: true,
} );

$('#tabletutorialrequest').dataTable( {
  scrollX: true,
} );


$('#reqtbl').dataTable( {
  scrollY: 270,
   scrollX: true,
} );

$(document).ready(function () {
    $('#table1').DataTable({
      "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
});