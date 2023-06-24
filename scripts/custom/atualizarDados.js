document.addEventListener("DOMContentLoaded", function () {
    
    var updateClientModal = new bootstrap.Modal(document.getElementById("updateClientModal"));

    document.querySelector("a[data-target='#updateClientModal']").addEventListener("click", function (){
        updateClientModal.show();
    });
 
});