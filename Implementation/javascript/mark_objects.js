function callPHP(obj, confirmMsg, tableId, cellId, action) {
    if (confirm(confirmMsg)) {
        // Delete it!
        var rowIndex = obj.parentNode.parentNode.rowIndex;
        //("row index = " + rowIndex);
        var obj_id = document.getElementById(tableId).rows[rowIndex].cells.item(cellId).innerHTML;
        //var clickBtnValue = $(this).val();
        var ajaxurl = './includes/delete_objet_ajax.inc.php';
        var data = {
            'obj_id': obj_id,
            'action': action
        };
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            document.getElementById(tableId).rows[rowIndex].remove();
            //alert("Objet supprimé.");
            $("#result").html(response);
        });
    } else {
        // Do nothing!
    }
}

function foundObject(obj) {
    confirmMsg = 'Cet objet est bien retrouvé ?';
    tableId = "table_declared";
    callPHP(obj, confirmMsg, tableId, 6, 2);
};
table_declared

function returnedObject(obj) {
    confirmMsg = 'Cet objet est bien retourné ?';
    tableId = "table_found";
    callPHP(obj, confirmMsg, tableId, 6, 2);
};

function abandonObject(obj) {
    confirmMsg = 'Vous voulez abondonner cet objet ?';
    tableId = "table_found";
    callPHP(obj, confirmMsg, tableId, 5, 3);
};
