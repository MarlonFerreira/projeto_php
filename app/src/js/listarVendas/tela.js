const SELECT_VENDEDOR = 'selectVendedor'

const LISTAR_VENDEDORES_INPUT = 'listaVendas'

class Tela {

    static inserirVendedores(vendedores) {
        const listaVendedorID = document.getElementById(SELECT_VENDEDOR)

        for (let i in vendedores) {
            const id_vendedor = document.createElement('option')
            id_vendedor.innerHTML = vendedores[i].vendedor_id

            listaVendedorID.appendChild(id_vendedor);
        }
    }

    static configurarOptionVendedor(funcaoOnChange) {
        const selectVendedorId = document.getElementById(SELECT_VENDEDOR)
        selectVendedorId.onchange = funcaoOnChange
    }

    static lerOption(){
        let indice = document.getElementById(SELECT_VENDEDOR).selectedIndex
        let selectVendedorId = document.getElementById(SELECT_VENDEDOR).options[indice].value

        return selectVendedorId
    }

    static inserirVendas(dados) {
        const listaVenda = document.getElementById(LISTAR_VENDEDORES_INPUT)

        listaVenda.innerHTML = ' '

        for (let i in dados) {
            const dados_venda = document.createElement('li')
            dados_venda.innerHTML = 
                    "ID: " + dados[i].pedido_id
                + " | Nome: " + dados[i].vendedor_nome
                + " | Email: " + dados[i].vendedor_email
                + " | Comissão: " + Number(dados[i].valor_comissao).toLocaleString('pt-BR',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2})
                + " | Valor da venda: " + Number(dados[i].valor_venda).toLocaleString('pt-BR',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2})
                + " | Data da venda: " + dados[i].data_venda

            listaVenda.appendChild(dados_venda);
        }
    }
}