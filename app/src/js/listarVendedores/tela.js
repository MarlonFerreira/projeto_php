const UL_LISTA_VENDEDORES = 'listaVendedores'

class Tela {

    static inserirVendedores(dados) {
        const listaVendedores = document.getElementById(UL_LISTA_VENDEDORES)

        for (let i in dados) {
            const dados_vendedor = document.createElement('li')
            dados_vendedor.innerHTML = "ID: " + dados[i].vendedor_id
                + " | Nome: " + dados[i].vendedor_nome
                + " | Email: " + dados[i].vendedor_email
                + " | Comissão: " + Number(dados[i].vendedor_comissao_total).toLocaleString('pt-BR',{style: 'currency', currency: 'BRL', minimumFractionDigits: 2})

            listaVendedores.appendChild(dados_vendedor);
        }
    }
}