function callPHP(obj, confirmMsg, tableId, cellId, action) {
    "use strict";
    /*global
      $, confirm
    */
    if (confirm(confirmMsg)) {
        // Delete it!
        var rowIndex = obj.parentNode.parentNode.rowIndex,
            //("row index = " + rowIndex);
            obj_id = document.getElementById(tableId).rows[rowIndex].cells.item(cellId).innerHTML,
            //var clickBtnValue = $(this).val();
            ajaxurl = './includes/delete_objet_ajax.inc.php',
            data = {
                'obj_id': obj_id,
                'action': action
            };
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            document.getElementById(tableId).rows[rowIndex].remove();
            //alert("Objet supprimé.");
            $("#result").html(response);
        });
    }
}

function foundObject(obj) {
    "use strict";
    var confirmMsg = 'Cet objet est bien retrouvé ?',
        tableId = "table_declared";
    callPHP(obj, confirmMsg, tableId, 6, 2);
}


function returnedObject(obj) {
    "use strict";
    var confirmMsg = 'Cet objet est bien retourné ?',
        tableId = "table_found";
    callPHP(obj, confirmMsg, tableId, 6, 2);
}

function abandonObject(obj) {
    "use strict";
    var confirmMsg = 'Vous voulez abondonner cet objet ?',
        tableId = "table_found";
    callPHP(obj, confirmMsg, tableId, 6, 3);
}
