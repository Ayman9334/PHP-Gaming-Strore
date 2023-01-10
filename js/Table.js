$(document).ready(function () {
    $('#myTable').dataTable({
        columnDefs: [{
            "defaultContent": "-",
            "targets": "_all",
        }]
    });
});