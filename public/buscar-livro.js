var buscarLivro = document.querySelector("#filtrar-livros");

buscarLivro.addEventListener("input", () => {
    var cards = document.querySelectorAll("#card");

    if (buscarLivro.value.length > 0) {
        for (let i = 0; i < cards.length; i++) {
            let card = cards[i];
            var idTitulo = card.querySelector("#titulo");
            var titulo = idTitulo.textContent;
            var expressao = new RegExp(buscarLivro.value, "i");

            if (!expressao.test(titulo)) {
                card.classList.add("d-none");
            } else {
                card.classList.remove("d-none");
            }
        }
    } else {
        for (let i = 0; i < cards.length; i++) {
            let card = cards[i];
            card.classList.remove("d-none");
        }
    }
});




