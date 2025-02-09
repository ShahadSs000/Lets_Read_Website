var num1 = document.getElementById("countar");

function counter (element, start, end, duration){
var range = end - start;
var current = start;
var increment = 0;
if (end > start){
increment = 1;
 } else {
increment = -1;
 }
var timer = setInterval(function() {
    current += increment;
    element.innerHTML = current;

if (current == end) {
clearInterval(timer);
}
},duration);
}
counter (num1, 0, 21, 50);
