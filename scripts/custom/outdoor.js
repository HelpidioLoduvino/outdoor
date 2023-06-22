// funcao para abrir cada modal da minha navbar do cliente
document.addEventListener("DOMContentLoaded", function () {
    var modalElements = document.querySelectorAll("a[data-target^='#solicitarOutdoorModal']");
    var modals = {};

    modalElements.forEach(function (element) {
        var modalId = element.getAttribute("data-target");
        if (!modals[modalId]) {
            modals[modalId] = new bootstrap.Modal(document.querySelector(modalId));
        }

        element.addEventListener("click", function (event) {
            event.preventDefault();
            modals[modalId].show();
        });
    });
});

