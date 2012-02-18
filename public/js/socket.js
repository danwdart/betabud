var socket = io.connect('http://localhost:1337');
socket.on('connect', function() {
    $('.chatlog').html('');
});
socket.on('message', function(data) {
    html = $('.chatlog').html();
    $('.chatlog').html(html + data.from + ' said: '+data.text+'<br/>');
});
$('#form #submit').click(function(event) {
    event.preventDefault();
    text = $('#chatline').val();
    $('#chatline').val('');
    socket.emit('message',{from: betabud.nickname, text:text});
    return false;
});
