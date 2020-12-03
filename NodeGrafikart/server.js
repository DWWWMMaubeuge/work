let _ = require('lodash')



let app = require('./app').start(8080)
app.on('root', function (response){
    response.write('je suis à la racine')
})
//const server = http.createServer()

/* server.on('request',(request,response) => {
    response.writeHead(200,{
        'content-type': 'text/html; charset=utf-8'
    })
    const baseURL='http://' +request.headers.host + '/'
    const myURL = new URL(request.url, baseURL)
    const query = myURL.searchParams
    const name = (query.get('name') === '' || query.get('name') === null ) ? 'anonyme' : query.get('name')

    fs.readFile('index.html','utf8',(err, data) => {
        if(err){
            response.writeHead(404)
            response.end("Ce fichier n'existe pas")
        }else{
        response.writeHead(200,{
            'content-type': 'text/html; charset=utf-8'
        })
        data = data.replace('{{ name }}', name)

        response.end(data)
        }
    })
})
server.listen(8080) */