const tipoClienteSelect = document.getElementById('tipoCliente');
const atividadeEmpresaInput = document.getElementById('atividadeEmpresa');

// Manipulador de evento para o tipo de cliente
tipoClienteSelect.addEventListener('change', function () {
    // Verifique se o tipo de cliente selecionado é "Particular"
    if (tipoClienteSelect.value === 'Particular') {
        // Oculte o campo de atividade da empresa
        atividadeEmpresaInput.style.display = 'none';
    } else {
        // Caso contrário, exiba o campo de atividade da empresa
        atividadeEmpresaInput.style.display = 'block';
    }
});