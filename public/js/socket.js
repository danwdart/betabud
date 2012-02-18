function writemessage(data) {
    html = $('.chatlog').html();
    $('.chatlog').html(html + data.from + ' said: '+data.text+'<br/>');
}
var socket = io.connect('http://betabud.dandart.co.uk:8080');
socket.on('connect', function() {
    $('.chatlog').html('');
});
socket.on('message', function(data) {
    writemessage(data);
});
$('#form #submit').click(function(event) {
    event.preventDefault();
    text = $('#chatline').val();
    $('#chatline').val('');
    msg = {from:betabud.nickname, text:text};
    socket.emit('message',msg);
    writemessage(msg);
    return false;
});
