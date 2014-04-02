import httplib
import json
import logging
import socket
import time
import urllib
SEARCH_HOST="en.wikipedia.org"
SEARCH_PATH="/w/api.php?action=query&prop=revisions&rvprop=content&rvsection=0&format=json"

def search(query):
        c = httplib.HTTPConnection(SEARCH_HOST)
        params = {'q' : query}
        path = "%s&titles=%s" %(SEARCH_PATH, urllib.urlencode(params))
        try:
            c.request('GET', path)
            r = c.getresponse()
            data = r.read()
            c.close()
            try:
                result = json.loads(data)
            except ValueError:
                return None
            if 'query' not in result:
                return None
            return result['query']
        except (httplib.HTTPException, socket.error, socket.timeout), e:
            logging.error("search() error: %s" %(e))
            return None
