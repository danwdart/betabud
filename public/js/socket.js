var socket = io.connect('http://betabud.dandart.co.uk:8080'),
    online = [];
function updateonline() {
    html = online.join('<br/>');
    $('.people').html(html);
}
socket.on('connect', function() {
    socket.emit('heartbeat', {name: betabud.nickname, status: 'online'});
    $('.chatlog').html('');
});
socket.on('message', function(data) {
    html = $('.chatlog').html();
    $('.chatlog').html(html + data.from + ' said: '+data.text+'<br/>');
});
socket.on('heartbeat', function(data) {
    online[data.name] = data.name;
    updateonline();
});
socket.on('onlinepeople', function(data) {
    online = data;
    updateonline();
});
$('#form #submit').click(function(event) {
    event.preventDefault();
    text = $('#chatline').val();
    $('#chatline').val('');
    socket.emit('message',{from: betabud.nickname, text:text});
    return false;
});
