x = document.getElementsByClassName("submit_com_re");
const btnAbrirPopup = [];
const overlay = [];
const popup = [];
const btnCerrarPopup = [];
for (i = 1; i <= x.length; i++) {
    btnAbrirPopup[i] = document.getElementById('btn-abrir-popup'+i);
    overlay[i] = document.getElementById('overlay'+i);
    popup[i] = document.getElementById('popup'+i);
    btnCerrarPopup[i] = document.getElementById('btn-cerrar-popup'+i);
}
btnAbrirPopup.forEach(a);
function a(item_A, index_A) {
    overlay.forEach(b);
    function b(item_B, index_B) {
        popup.forEach(c);
        function c(item_C, index_C) {
            btnCerrarPopup.forEach(d);
            function d(item_D, index_D) {
                if(index_A == index_B && index_B == index_C && index_C == index_D){
                    item_A.addEventListener('click', function(){
                        item_B.classList.add('active');
                        item_C.classList.add('active');
                    });

                    item_D.addEventListener('click', function(e){
                        e.preventDefault();
                        item_B.classList.remove('active');
                        item_C.classList.remove('active');
                    });
                }
            }
        }
    }
}
