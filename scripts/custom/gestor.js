// funcao para abrir cada modal da minha navbar do Gestor
document.addEventListener("DOMContentLoaded", function () {
    var analisarAluguerModal = new bootstrap.Modal(document.getElementById("analisarAluguerModal"));
    var inserirOutdoorModal = new bootstrap.Modal(document.getElementById("inserirOutdoorModal"));
    var gerirOutdoorModal = new bootstrap.Modal(document.getElementById("gerirOutdoorModal"));

    document.querySelector("a[data-target='#analisarAluguerModal']").addEventListener("click", function () {
        analisarAluguerModal.show();
    });

    document.querySelector("a[data-target='#inserirOutdoorModal']").addEventListener("click", function () {
        inserirOutdoorModal.show();
    });
    
    document.querySelector("a[data-target='#gerirOutdoorModal']").addEventListener("click", function () {
        gerirOutdoorModal.show();
    });
    
});

