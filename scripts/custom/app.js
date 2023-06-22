// funcao para abrir cada modal da minha navbar
document.addEventListener("DOMContentLoaded", function () {
    var addAdminModal = new bootstrap.Modal(document.getElementById("addAdminModal"));
    var addManagerModal = new bootstrap.Modal(document.getElementById("addManagerModal"));
    var validateUserModal = new bootstrap.Modal(document.getElementById("validateUserModal"));
    var listAdminModal = new bootstrap.Modal(document.getElementById("listAdminModal"));
    var listManagerModal = new bootstrap.Modal(document.getElementById("listManagerModal"));
    
    document.querySelector("a[data-target='#addAdminModal']").addEventListener("click", function () {
        addAdminModal.show();
    });

    document.querySelector("a[data-target='#addManagerModal']").addEventListener("click", function () {
        addManagerModal.show();
    });

    document.querySelector("a[data-target='#validateUserModal']").addEventListener("click", function () {
        validateUserModal.show();
    });

    document.querySelector("a[data-target='#listAdminModal']").addEventListener("click", function () {
        listAdminModal.show();
    });

    document.querySelector("a[data-target='#listManagerModal']").addEventListener("click", function () {
        listManagerModal.show();
    });
    
});

