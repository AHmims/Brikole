const __EXPRESS = require('express');
const __DEVICE = require('express-device');
const __PATH = require('path');
const __APP = __EXPRESS();
// 
const __PORT = 6969;
// 
__APP.use(__DEVICE.capture());
__APP.use('/', __EXPRESS.static(__PATH.join(__dirname, 'public')));
// 
__APP.get('/', function (req, res) {
    let path = 'index.html';
    if (req.device.type != 'desktop')
        path = 'index_mobile.html';
    res.sendFile(__PATH.join(__dirname, 'public', `html`, `${path}`));
});
// 
__APP.listen(__PORT, () => {
    console.log('Server Started ...');
});