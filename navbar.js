$(document).ready(function(){
    $("#nav-placeholder").load("navbar.html");
 });
 var currentPage=location.href;
 var nav=document.querySelectorAll('nav a');
 var navElement=nav.length;
 for(var i=0;i<navElement;i++){
if(nav[i].href==currentPage){
nav[i].className="active";
}
 }
 