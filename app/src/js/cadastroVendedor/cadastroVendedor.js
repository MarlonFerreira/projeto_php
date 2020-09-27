function onLoad() {

    dependencias = {
        tela: Tela,
        util: Util,
        validarEmail: ValidarEmail
    }

    const logica = new Logica( dependencias )
    logica.inicializar()
}

window.onload = onLoad