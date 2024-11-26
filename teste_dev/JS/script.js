const cep  = document.getElementById('cep');
const estado = document.getElementById ('estado');
const bairro = document.getElementById ('bairro');
const cidade = document.getElementById ('cidade');
const rua = document.getElementById ('rua');

async function calculo() {
    const cep = document.getElementById('cep');
    const message = document.getElementById('mensagem'); 

    try {
        const verificaNumero = /^[0-9]+$/;
        const verificaQuantidade = /^[0-9]{8}$/;

        if (!verificaNumero.test(cep.value) || !verificaQuantidade.test(cep.value)) {
            throw { erro_cep: 'CEP inválido.' };
        }

        const response = await fetch(`https://viacep.com.br/ws/${cep.value}/json/`);

        if (!response.ok) {
            throw await response.json();
        }

        const responseCep = await response.json();

        estado.value=responseCep.estado;
        rua.value=responseCep.logradouro;
        bairro.value=responseCep.bairro;
        cidade.value=responseCep.localidade;

    } catch (error) {
        if (error?.erro_cep) {
            message.textContent = error.erro_cep;
        } else {
            message.textContent = 'Erro ao buscar o CEP.';
        }

        setTimeout(() => {
            message.textContent = '';
        }, 5000);
    }
}

