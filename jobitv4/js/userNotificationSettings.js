var $notificationSettingsForm =    ' <div id="notifModal" class="modal fade">'+
    '<div class="modal-dialog">' +
        '<div class="modal-content">' +
            '<div class="modal-header">' +
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
                '<h3 class="modal-title">Notification Settings</h3>' +
            '</div>'+
            '<div class="modal-body">'+
                '<form id="notificationSettings">'+
            '<label>Recieve notifications through:</label>'+
            '<div class="col-md-8" id="option" class="input-group">'+
              '<input type="checkbox" id="Email"><label id="mail" for="Email">Email</label></input>'+
            '</div>'+
            '<br>'+
            '<br>'+
            '<br>'+
            '<div id="password">'+
              '<label>Enter your password to save your changes</label>'+
              '<label class="col-md-4" for="password">Password:<span style="color:red">*</span></label><input class="col-md-6" type="password"'+ 'id="passwordinput"></input>'+
            '</div>'+
            '<br>'+
          '</form>'+
            '</div>'+
            '<div class="modal-footer">'+
              '<div class="text-center" id="buttonGroup">' +
                '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>' +
                '<button type="submit" class="btn btn-success">Update</button>' +
              '</div>' +
            '</div>'
        '</div>' +
    '</div>' +
'</div>';

$('body').append($notificationSettingsForm);
console.log("NOTIF MODAL");