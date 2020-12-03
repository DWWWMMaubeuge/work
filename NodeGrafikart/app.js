const http = require('http')
const fs = require('fs')
const {URL} = require('url')
const EventEmitter  = require('events')

let App = {
    start: function (port) {
        let emitter = new EventEmitter()
        let server = http.createServer((request,response)=>{
            response.writeHead(200,{
                'content-type': 'text/html; charset=utf-8'
            })
            if (request.url === '/') {
                emitter.emit('root',response)
            }
            response.end()

        }).listen(port)
        return emitter
    }
}

module.exports = App