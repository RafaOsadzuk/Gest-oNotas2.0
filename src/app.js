function adicionaDadosAluno() {
    try {
        const Ra = document.getElementById("input_ra").value;
        const nome = document.getElementById("input_nome").value;
        const email = document.getElementById("input_email").value;

        console.log("Dados do aluno:", { Ra, nome, email });

        const novaLinha = document.createElement("tr");
        novaLinha.innerHTML = `
            <td>${Ra}</td>
            <td>${nome}</td>
            <td>${email}</td>
        `;
        const corpoTabela = document.getElementById('tableContent');
        corpoTabela.appendChild(novaLinha);
        
        
        document.getElementById("input_ra").value = "";
        document.getElementById("input_nome").value = "";
        document.getElementById("input_email").value = "";
    } catch (error) {
        console.error("Erro:", error);
        alert(error.message);
    }
}

// document.getElementById("formulario").addEventListener('submit', function (event) {
//     event.preventDefault();
//     adicionaDadosAluno();
// });