//web scraper

let game = 'lalalala'
let message = 'i am from worker'
onmessage = e => {
    let mess = e.data
    console.log(`from main: ${mess}`)
}
postMessage(message)


