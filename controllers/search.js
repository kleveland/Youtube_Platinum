var request = require('request');
var apikey = 'API KEY HERE';
module.exports = function (app, passport) {
	app.post('/search',function(req,res) {
		req.body.dat;
		request({
            uri: 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' + encodeURI(req.body.dat) + '&type=video&maxResults=20&key=' + apikey,
            method: "GET"
        }, function (error, response, body) {
            var dat = JSON.parse(body);
            //console.log("DAT: " + JSON.stringify(dat));
			res.send(dat);
        });
	});
}
