document.addEventListener('DOMContentLoaded', function() {
    const tabelaDados = JSON.parse(localStorage.getItem('tabelaDados')) || [];
    const corpoTabela = document.getElementById('table_Content');

    tabelaDados.forEach(function(dados) {
        const segundaMedia = parseFloat(dados.prova2 || 0) + parseFloat(dados.AEP2 || 0) + parseFloat(dados.prova_integrada2 || 0);
        dados.segundaMedia = segundaMedia.toFixed(2);

        const status = calcularStatus(segundaMedia);
        dados.status = status;

        const novaLinha = document.createElement("tr");
        novaLinha.innerHTML = `
            <td>${dados.Ra}</td>
            <td>${dados.nome}</td>
            <td>${dados.email}</td>
            <td>${dados.prova2 ? dados.prova2 : `<input type="number" min="0" max="8" step="0.01" class="notaInput" placeholder="Insira a nota">`}</td>
            <td>${dados.AEP2 ? dados.AEP2 : `<input type="number" min="0" max="1" step="0.01" class="notaInput" placeholder="Insira a nota">`}</td>
            <td>${dados.prova_integrada2 ? dados.prova_integrada2 : `<input type="number" min="0" max="1" step="0.01" class="notaInput" placeholder="Insira a nota">`}</td>
            <td>${dados.segundaMedia}</td>
            <td>${dados.status}</td>
        `;
        corpoTabela.appendChild(novaLinha);
    });
});

function calcularStatus(media) {
    if (media >= 7) {
        return "Aprovado";
    } else if (media >= 4 && media < 7) {
        return "Recuperação";
    } else {
        return "Reprovado";
    }
}

function enviarNotas() {
    const tabelaDados = [];
    const linhas = document.querySelectorAll('#table_Content tr');

    linhas.forEach(function(linha) {
        const colunas = linha.querySelectorAll('td');
        const aluno = {
            Ra: colunas[0].innerText,
            nome: colunas[1].innerText,
            email: colunas[2].innerText,
            prova2: colunas[3].querySelector('input') ? colunas[3].querySelector('input').value : colunas[3].innerText,
            AEP2: colunas[4].querySelector('input') ? colunas[4].querySelector('input').value : colunas[4].innerText,
            prova_integrada2: colunas[5].querySelector('input') ? colunas[5].querySelector('input').value : colunas[5].innerText,
        };
        tabelaDados.push(aluno);
    });

    localStorage.setItem('tabelaDados', JSON.stringify(tabelaDados));
}

function calcularNota() {
    const corpoTabela = document.getElementById('table_Content');
    const linhas = corpoTabela.getElementsByTagName('tr');
    const tabelaDados = [];

    for (let i = 0; i < linhas.length; i++) {
        const colunas = linhas[i].getElementsByTagName('td');
        let totalNotas = 0;
        let notasCount = 0;

        for (let j = 3; j <= 5; j++) {
            const input = colunas[j].querySelector('input');
            const nota = input ? parseFloat(input.value) : parseFloat(colunas[j].innerText);
            if (!isNaN(nota)) {
                totalNotas += nota;
                notasCount++;
            }
        }

        const segundaMedia = (totalNotas / notasCount).toFixed(2);
        colunas[6].innerText = segundaMedia;
        
        const status = calcularStatus(parseFloat(segundaMedia));
        colunas[7].innerText = status;

        const aluno = {
            Ra: colunas[0].innerText,
            nome: colunas[1].innerText,
            email: colunas[2].innerText,
            prova2: colunas[3].querySelector('input') ? colunas[3].querySelector('input').value : colunas[3].innerText,
            AEP2: colunas[4].querySelector('input') ? colunas[4].querySelector('input').value : colunas[4].innerText,
            prova_integrada2: colunas[5].querySelector('input') ? colunas[5].querySelector('input').value : colunas[5].innerText,
            segundaMedia: segundaMedia,
            status: status
        };
        tabelaDados.push(aluno);
    }

    localStorage.setItem('tabelaDados', JSON.stringify(tabelaDados));
}