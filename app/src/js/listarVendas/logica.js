class Logica {
    constructor({ tela, util }) {
        this.tela = tela
        this.util = util
    }

    inicializar() {
        this.listarVendedores()
        this.tela.configurarOptionVendedor(this.capturarOption.bind(this))
    }

    async listarVendedores() {
        event.preventDefault()
        let URL = 'http://localhost:8083/vendedor';
        let vendedores = await this.util.requisicaoAjaxGetJson(URL)
        this.tela.inserirVendedores(vendedores)
    }

    async capturarOption() {
        let id = this.tela.lerOption()
        this.listarVendas(id)
    }

    async listarVendas(id) {
        event.preventDefault()
        let URL = `http://localhost:8083/venda?buscar=${id}`;
        let vendas = await this.util.requisicaoAjaxGetJson(URL)
        this.tela.inserirVendas(vendas)
    }
}