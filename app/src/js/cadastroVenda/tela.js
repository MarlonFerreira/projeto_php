const INPUT_CADASTRAR_VENDA = 'inputCadastrarVenda'
const SELECT_VENDEDOR_ID = 'selectVendedor'
const INPUT_VALOR_VENDA = 'inputValorVenda'

const UL_RESULTADO = 'ulResultado'

class Tela {

    static inserirVendedores(vendedores) {
        const listaVendedorID = document.getElementById(SELECT_VENDEDOR_ID)

        for (let i in vendedores) {
            const id_vendedor = document.createElement('option')
            id_vendedor.innerHTML = vendedores[i].vendedor_id

            listaVendedorID.appendChild(id_vendedor);
        }
    }

    static configurarBotaoCadastrar(funcaoOnClick) {
        const inptCadastrarVenda = document.getElementById(INPUT_CADASTRAR_VENDA)
        inptCadastrarVenda.onclick = funcaoOnClick
    }

    static lerDados() {
        let indice = document.getElementById(SELECT_VENDEDOR_ID).selectedIndex
        let idVendedor = document.getElementById(SELECT_VENDEDOR_ID).options[indice].value

        let valor = document.getElementById(INPUT_VALOR_VENDA).value
 
        let dados = { idVendedor, valor }
        return dados
    }

    static preencherVenda(dados) {
        const resultado = document.getElementById(UL_RESULTADO)

        resultado.innerHTML = ' '
        if (dados === false) {
            resultado.innerHTML = "Nao foi possivel cadastrar - Preencha corretamente os campos"
        }
        else {
            const dados_cadastrados = document.createElement('li')
            dados_cadastrados.innerHTML =
                "ID: " + dados.pedido_id
                + " | Nome: " + dados.vendedor_nome
                + " | Email: " + dados.vendedor_email
                + " | Comissão: " + Number(dados.valor_comissao).toLocaleString('pt-BR',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2})
                + " | Valor da venda: " + Number(dados.valor_venda).toLocaleString('pt-BR',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2})
                + " | Data da venda: " + dados.data_venda

            resultado.appendChild(dados_cadastrados);
        }
    }
}