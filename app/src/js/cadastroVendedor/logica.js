class Logica {
    constructor({ tela, util, validarEmail }) {
        this.tela = tela
        this.util = util
        this.validarEmail = validarEmail
    }

    inicializar() {
        this.tela.configurarBotaoCadastrar(this.cadastrarVendedor.bind(this))
    }

    async cadastrarVendedor() {
        let dados = this.tela.lerDados()
        event.preventDefault()
        if (!this.validarEmail.validacaoEmail(dados.email) || dados.nome == "") {
            this.tela.resultado(false)
        }
        else {
            let URL = 'http://localhost:8083/vendedor';
            let data = await this.util.requisicaoAjaxPostJson(URL, dados)
            let check = true
            this.tela.resultado(data, check)
        }
    }
}