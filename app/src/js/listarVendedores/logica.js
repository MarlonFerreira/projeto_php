class Logica {
    constructor({ tela, util }) {
        this.tela = tela
        this.util = util
    }

    inicializar() {
        this.listarVendedores()
    }

    async listarVendedores() {
        event.preventDefault()
        let URL = 'http://localhost:8083/vendedor';
        let vendedores = await this.util.requisicaoAjaxGetJson(URL)
        this.tela.inserirVendedores(vendedores)
    }
}