var io = require('socket.io').listen(8080);

io.sockets.on('connection', function (socket) {
    console.log(socket);
    socket.emit('message', {from: 'system', text:'user connected'});
    socket.on('message', function(msg) {
        console.log(msg.from + ' said: '+msg.text);
        socket.emit('message', msg);
    });
    socket.on('disconnect', function() {
    });
});
