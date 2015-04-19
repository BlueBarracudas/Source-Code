function activateOnClick(el) {
    var index = $(el).attr('id').replace( /^\D+/g, '')
    $(el).replaceWith($('<input type="button" class="btn btn-default btn-fill" id="deactivate' + index + '" name="deactivate' + index + '" onclick="deactivateOnClick(this)" value="Deactivate"/>'));
}

function deactivateOnClick(el) {
    var index = $(el).attr('id').replace( /^\D+/g, '')
    $(el).replaceWith($('<input type="button" class="btn btn-success btn-fill" id="activate' + index + '" name="activate' + index + '" onclick="activateOnClick(this)" value="Activate"/>'))
}    