const fs = require('fs')
const file ='demo.mp4'



fs.stat(file,(err, stat)=> {
    const total = stat.size
    let progress = 0
    const read = fs.createReadStream(file)
    const write = fs.createWriteStream('copy2.mp4')

    read.on('data',(chunk)=>{

        progress += chunk.length

        console.log("j'ai lu " + Math.round((progress / total)*100) + "%")
    })
    read.pipe(write)
    write.on('finish',()=>{
        console.log ("fichier copié avec succés")
    })
})

