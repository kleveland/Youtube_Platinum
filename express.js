(function () {
	
    var express = require('express');
	var app = express();
    var path = require('path');
	
    app.use(express.static(path.join(__dirname, 'public')));

    app.listen(80, function () {
        console.log("LISTENING ON PORT 80.");
    });

    //app.use(app.router);

}).call(this);