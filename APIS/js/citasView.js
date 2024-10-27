$(document).ready(function() {
    $('#citas-table').DataTable({
        "ajax": {
            "url": "./APIS/citasView.php",
            "dataSrc": ""
        },
        "columns": [
            { "data": "fecha" },
            { "data": "hora" },
            { "data": "nombre" },
            { "data": "telefono" },
            { "data": "correo" }
        ]
    });
});
