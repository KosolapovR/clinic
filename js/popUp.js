
window.onload = function () {
    //unloadHide();
    var unload = document.getElementById("unload"),
        hidden_block = document.getElementById("hidden_block"),
        unload_file_label =  document.getElementById("unload_file");
        ;
    unload.onclick = unloadShow;
    unload_file_label.onclick = unloadHide;
    $("#close").on("click", unloadHide);    
    
    function unloadShow(){
         hidden_block.style.display="flex";
    }
    function unloadHide(){
         hidden_block.style.display="none";
    }
}