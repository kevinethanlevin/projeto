function adicionarItem(item) {
    lista.push(item);
    salvarLista();
}

function editarItem(index, novoItem) {
    lista[index] = novoItem;
    salvarLista();
}

function organizarAlfabetica() {
    lista.sort();
    salvarLista();
}

function organizarDataCriacao() {
  
    lista.sort((a, b) => a.dataCriacao - b.dataCriacao);
    salvarLista();
}

function salvarLista() {
    localStorage.setItem('minhaLista', JSON.stringify(lista));
}

function carregarLista() {
    const listaSalva = localStorage.getItem('minhaLista');
    if (listaSalva) {
        lista = JSON.parse(listaSalva);
    }
}
