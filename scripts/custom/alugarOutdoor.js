// funcao para abrir cada modal da minha navbar do cliente
document.addEventListener("DOMContentLoaded", function () {
   
    var consultarOutdoorModal = new bootstrap.Modal(document.getElementById("consultarOutdoorModal"));
    
    var carregarPagamentoModal = new bootstrap.Modal(document.getElementById("carregarPagamentoModal"));
    
    document.querySelector("a[data-target='#consultarOutdoorModal']").addEventListener("click", function () {
        consultarOutdoorModal.show();
    });
    
    document.querySelector("a[data-target='#carregarPagamentoModal']").addEventListener("click", function () {
        carregarPagamentoModal.show();
    });
     
});