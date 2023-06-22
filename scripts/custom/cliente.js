// funcao para abrir cada modal da minha navbar do cliente
document.addEventListener("DOMContentLoaded", function () {
    var addClientModal = new bootstrap.Modal(document.getElementById("addClientModal"));
    
    document.querySelector("a[data-target='#addClientModal']").addEventListener("click", function () {
        addClientModal.show();
    });
    
});