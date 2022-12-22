const navbar = document.getElementById('navbar')

let prev_yPos = 0
window.onscroll = function(){
    const yPos = window.scrollY
    if(yPos > prev_yPos){
        navbar.style.top = `${navbar.offsetHeight * -1}px`
    }else{
        navbar.style.top = '0px'
    }
    prev_yPos = yPos
}
