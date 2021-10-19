(function ($) {
    "use strict";

    $("#type_search li").click(function() {
        var elem = document.getElementById("btn_search");
        elem.innerHTML = this.id;    
    });


})(jQuery); 

function logout_cc(){
    window.location.href = 'index.php';
}