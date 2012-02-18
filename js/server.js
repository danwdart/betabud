var io = require('socket.io').listen(8080),
    online = [];

io.sockets.on('connection', function (socket) {
    console.log(socket);

    socket.emit('message', {from: 'system', text:'user connected'});
    socket.on('heartbeat', function(identity) {
        socket.set('nick', identity.name);
        online[identity.name] = identity.name;
        socket.emit('onlinepeople', online);
    });
    socket.on('message', function(msg) {
        console.log(msg.from + ' said: '+msg.text);
        socket.emit('message', msg);
    });
    socket.on('disconnect', function() {
        identity = socket.get('identity', function(err, nick) {
            offline = {name: nick, status:'offline'};
            socket.broadcast.emit('heartbeat', offline);
            delete online[nick];
        });
    });
});
