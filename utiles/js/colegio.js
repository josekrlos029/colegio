setTimeout("maximizar()",1250);
function maximizar(){
var offset = (navigator.userAgent.indexOf("Mac") != -1 ||
navigator.userAgent.indexOf("Gecko") != -1 ||
navigator.appName.indexOf("Netscape") != -1) ? 0 : 4;
win.moveTo(-offset, -offset);
win.resizeTo(screen.availWidth + (2 * offset),screen.availHeight + (2 * offset));
}

function maximizar( ) {
var offset = (navigator.userAgent.indexOf("Mac") != -1 ||
navigator.userAgent.indexOf("Gecko") != -1 ||
navigator.appName.indexOf("Netscape") != -1) ? 0 : 4;
window.moveTo(-offset, -offset);
window.resizeTo(screen.availWidth + (2 * offset),
screen.availHeight + (2 * offset));
}
