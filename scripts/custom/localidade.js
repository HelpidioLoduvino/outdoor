// Obtenha as referências dos elementos de seleção
const provinciaSelect = document.getElementById('provinciaSelect');
const municipioSelect = document.getElementById('municipioSelect');
const comunaSelect = document.getElementById('comunaSelect');

// Manipulador de evento para o select de província
provinciaSelect.addEventListener('change', function () {
    // Limpe o select de municípios e desative-o
    municipioSelect.innerHTML = "<option value=''>-- Municipio --</option>";
    municipioSelect.disabled = true;

    // Limpe o select de comunas e desative-o
    comunaSelect.innerHTML = "<option value=''>-- Comuna --</option>";
    comunaSelect.disabled = true;

    // Obtenha o ID da província selecionada
    const provinciaId = provinciaSelect.value;

    // Se a província selecionada não for vazia, faça a requisição AJAX para recuperar os municípios
    if (provinciaId !== '') {
        // Faça a requisição AJAX para recuperar os municípios com base na província selecionada
        fetch('../repositories/getMunicipio.php?provinciaId=' + provinciaId)
                .then(response => response.json())
                .then(data => {
                    // Preencha o select de municípios com os dados recuperados
                    data.forEach(municipio => {
                        municipioSelect.innerHTML += "<option value='" + municipio['id'] + "'>" + municipio['nome'] + "</option>";
                    });

                    // Ative o select de municípios
                    municipioSelect.disabled = false;
                })
                .catch(error => console.error(error));
    }
});

// Manipulador de evento para o select de município
municipioSelect.addEventListener('change', function () {
    // Limpe o select de comunas e desative-o
    comunaSelect.innerHTML = "<option value=''>-- Comuna --</option>";
    comunaSelect.disabled = true;

    // Obtenha o ID do município selecionado
    const municipioId = municipioSelect.value;

    // Se o município selecionado não for vazio, faça a requisição AJAX para recuperar as comunas
    if (municipioId !== '') {
        // Faça a requisição AJAX para recuperar as comunas com base no município selecionado
        fetch('../repositories/getComuna.php?municipioId=' + municipioId)
                .then(response => response.json())
                .then(data => {
                    // Preencha o select de comunas com os dados recuperados
                    data.forEach(comuna => {
                        comunaSelect.innerHTML += "<option value='" + comuna['id'] + "'>" + comuna['nome'] + "</option>";
                    });

                    // Ative o select de comunas
                    comunaSelect.disabled = false;
                })
                .catch(error => console.error(error));
    }
});
