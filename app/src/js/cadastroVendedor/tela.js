const INPUT_CADASTRAR_VENDEDOR = 'inputCadastrarVendedor'
const INPUT_NOME = 'inputNome'
const INPUT_EMAIL = 'inputEmail'

const RESULTADO_UL = 'resultado'

class Tela {

    static configurarBotaoCadastrar(funcaoOnClick) {
        const inptCadastrarVendedor = document.getElementById(INPUT_CADASTRAR_VENDEDOR)
        inptCadastrarVendedor.onclick = funcaoOnClick
    }

    static lerDados() {
        let nome = document.getElementById(INPUT_NOME).value
        let email = document.getElementById(INPUT_EMAIL).value
        let dados = { nome, email }
        return dados
    }

    static resultado(dados, check = false) {
        const resultado = document.getElementById(RESULTADO_UL)

        resultado.innerHTML = ' '

        if (dados === false) {
            if (check === true)
                resultado.innerHTML = "Não foi possivel cadastrar - Email já cadastrado"
            else
                resultado.innerHTML = "Não foi possivel cadastrar - Preencha os campos corretamente"
        }
        else {
            const dados_cadastrados = document.createElement('li')
            dados_cadastrados.innerHTML =
                "Cadastro efetuado com sucesso - "
                + "ID: " + dados.vendedor_id
                + " | Nome: " + dados.vendedor_nome
                + " | Email: " + dados.vendedor_email

            resultado.appendChild(dados_cadastrados);
        }
    }
}