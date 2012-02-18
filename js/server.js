var online = {};
var io = require('socket.io').listen(8080);

io.sockets.on('connection', function (socket) {
    socket.on('heartbeat', function(identity) {
        socket.set('nick', identity.name);
        online[socket.id] = identity.name;
        socket.emit('whosonline', online);
        socket.broadcast.emit('online', {id: socket.id, name: identity.name});
    });
    socket.on('message', function(msg) {
        console.log(msg.from + ' said: '+msg.text);
        socket.broadcast.emit('message', msg);
    });
    socket.on('disconnect', function() {
        delete online[socket.id];
        socket.broadcast.emit('offline', {id: socket.id});
    });
});
