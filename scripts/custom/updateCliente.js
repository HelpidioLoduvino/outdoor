document.addEventListener("DOMContentLoaded", function () {
    
    var updateClienteModal = new bootstrap.Modal(document.getElementById("updateClienteModal"));

    document.querySelector("a[data-target='#updateClienteModal']").addEventListener("click", function (){
        updateClienteModal.show();
    });
 
});