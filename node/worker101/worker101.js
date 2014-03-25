var http = require("http"),
    url = require("url"),
    path = require("path"),
    fs = require("fs"),
    events = require("events"),
    sys = require("util");

var Wiki = (function () {
    var eventEmitter = new events.EventEmitter();

    return {
        EventEmitter:eventEmitter  // The event broadcaster
    };
})();

function get_wiki(query) {
    // Send a search request to Twitter
    var request = http.request({
        host:"en.wikipedia.org",
        port:80,
        method:"GET",
        path:"/w/api.php?action=query&prop=revisions&rvprop=content&rvsection=0&format=json&titles=" + query
    })
        .on("response", function (response) {
            var body = "";
            response.on("data", function (data) {
                body += data;
                try {
                    var res = JSON.parse(body);
                    if (res.query.pages) {
                        Wiki.EventEmitter.emit("result", res);
                    }
                    Wiki.EventEmitter.removeAllListeners("result");
                }
                catch (ex) {
                    console.log("waiting more data...");
                }
            });
        });
    request.end();
}
//putting wiki result to log
Wiki.EventEmitter.once("result", function (results) {
    console.log(JSON.stringify(results));
});

//writing to file
Wiki.EventEmitter.once("result", function (results) {
    var fs = require('fs');
    console.log('Writing to file');
    fs.open('wiki_res.txt', 'a', 777, function (e, id) {
        fs.write(id, JSON.stringify(results), null, 'utf8', function () {
            fs.close(id, function () {
                console.log('file closed');
            });
        });
    });
});

//parse payload and make a search
require('./lib/payload_parser').parse_payload(process.argv, function (payload) {
    query = 'iron.io';
    if (payload && payload['query']) {
        query = payload['query'];
    }
    get_wiki(query);
    console.log('Query:' + query);
});
