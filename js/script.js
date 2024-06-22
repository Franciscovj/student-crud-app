
function confirmDelete(id) {
    if (window.confirm("Tem certeza de que deseja excluir este aluno?")) {
        window.location.href = "excluir.php?iduser=" + id;
    }
}

function filterTable() {
    var filtroCurso = document.getElementById("filtroCurso").value.toUpperCase();
    var tabela = document.getElementById("tabelaAlunos");
    var linhas = tabela.getElementsByTagName("tr");

    for (var i = 0; i < linhas.length; i++) {
        var colunaCurso = linhas[i].getElementsByTagName("td")[2];
        if (colunaCurso) {
            var textoCurso = colunaCurso.textContent || colunaCurso.innerText;
            if (textoCurso.toUpperCase().indexOf(filtroCurso) > -1 || !filtroCurso) {
                linhas[i].style.display = "";
            } else {
                linhas[i].style.display = "none";
            }
        }
    }
}

function limparFiltros() {
    document.getElementById("filtroCurso").value = "";
    filterTable();
}