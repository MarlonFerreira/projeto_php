class Logica {
    constructor({ tela, util }) {
        this.tela = tela
        this.util = util
    }

    inicializar() {
        this.listarVendedores()
        this.tela.configurarBotaoCadastrar(this.cadastrarVenda.bind(this))
    }

    async listarVendedores() {
        event.preventDefault()
        let URL = 'http://localhost:8083/vendedor';
        let vendedores = await this.util.requisicaoAjaxGetJson(URL)
        this.tela.inserirVendedores(vendedores)
    }

    async cadastrarVenda() {
        let dados = this.tela.lerDados()
        event.preventDefault()
        if(dados.idVendedor == "" || dados.valor == "") {
            this.tela.preencherVenda(false)
        }
        else{
            dados.valor = dados.valor.replace(",", ".")
            let URL = 'http://localhost:8083/venda';
            let data = await this.util.requisicaoAjaxPostJson(URL, dados)
            this.tela.preencherVenda(data)
        }
    }
}