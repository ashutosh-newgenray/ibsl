$(document).ready(function() {
    $('#usersTable').DataTable({
        "bFilter" : false,
        "bLengthChange": false,
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [0,5,6] }
        ]
    });

    $('#rolesTable').DataTable({
        "bFilter" : false,
        "bLengthChange": false,
        "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [2,3,4] }
        ]
    });

} );