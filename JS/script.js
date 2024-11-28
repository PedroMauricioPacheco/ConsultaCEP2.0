const estado = document.getElementById ('estado');
const bairro = document.getElementById ('bairro');
const cidade = document.getElementById ('cidade');
const rua = document.getElementById ('rua');

async function calculo() {
    const cep = document.getElementById('cep'); //Pega o valor do input CEP
    const message = document.getElementById('mensagem'); //Guarda a mensagem de erro

    try {
        const verificaNumero = /^[0-9]+$/; //Verifica se o valor é um número
        const verificaQuantidade = /^[0-9]{8}$/; //Verifica se o valor tem 8 dígitos

        if (!verificaNumero.test(cep.value) || !verificaQuantidade.test(cep.value)) { //Se o valor não for um número ou não tiver 8 dígitos gera erro
            throw { erro_cep: 'CEP inválido.' };
        }

        const response = await fetch(`https://viacep.com.br/ws/${cep.value}/json/`); //Consome a API

        if (!response.ok) {
            throw await response.json(); 
        }

        const responseCep = await response.json(); //Converte a resposta

        //Preenche os campos com a reposta da API
        estado.value=responseCep.estado;
        rua.value=responseCep.logradouro;
        bairro.value=responseCep.bairro;
        cidade.value=responseCep.localidade;
        
    // Pega o erro e gera a mensagem de erro
    } catch (error) {
        if (error?.erro_cep) {
            message.textContent = error.erro_cep;
        } else {
            message.textContent = 'Erro ao buscar o CEP.';
        }
        //Seta o tempo de mensagem para 5s
        setTimeout(() => {
            message.textContent = '';
        }, 5000);
    }
}

