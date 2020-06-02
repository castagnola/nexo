var app = require('http').createServer(handler);
var io = require('socket.io')(app);

var Redis = require('ioredis');
var redis = new Redis();

app.listen(6001, function () {
    console.log('Server is running!');
});

function handler(req, res) {
    res.writeHead(200);
    res.end('');
}

io.on('connection', function (socket) {

    socket.on('join', function (channel) {
        socket.join(channel);
        console.log('Joined in:', channel);
    });

    socket.on('nexo', function (data) {
        console.log('Mensaje NEXO recibido', data);

        if (data.for == 'all') {
            socket.broadcast.emit(data.name, data.data || {});
        } else {
            io.sockets.to(data.for).emit(data.name, data.data || {});
        }
    });
});


redis.psubscribe('*', function (err, count) {
    //
});

redis.on('pmessage', function (subscribed, channel, message) {
    message = JSON.parse(message);


    if (channel == 'all') {
        console.log('Redis message received to all', subscribed, channel, message);

        io.emit(message.event, message.data);
    } else {
        console.log('Redis message received to channel', subscribed, channel, message);

        io.sockets.to(channel).emit("" + message.event + "", message.data);
    }
});