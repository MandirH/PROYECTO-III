function openTab(tabName) {
    var i, x;
    x = document.getElementsByClassName("containerTab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
}
function openTab(tabName) {
    var i, x;
    x = document.getElementsByClassName("containerTabAdmin");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "contents";
}
setTimeout(function() {
    $(".contenido_hidden").slideUp(2000);
},1000);
setTimeout(function() {
    $(".contenido_hidden_sesion").slideUp(2000);
},2000);


