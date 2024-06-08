function adicionaDadosAluno() {
    try {
        const Ra = document.getElementById("input_ra").value;
        const nome = document.getElementById("input_nome").value;
        const email = document.getElementById("input_email").value;

        console.log("Dados do aluno:", { Ra, nome, email });

       
        fetch('/script.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ Ra, nome, email }),
        })
        .then(response => {
            console.log("Resposta do servidor:", response);
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Erro ao salvar dados no servidor.');
            }
        })
        .then(data => {
            console.log("Resposta do servidor (dados):", data);
            
            const novaLinha = document.createElement("tr");
            novaLinha.innerHTML = `
                <td>${Ra}</td>
                <td>${nome}</td>
                <td>${email}</td>
            `;
            const corpoTabela = document.getElementById('tableContent');
            corpoTabela.appendChild(novaLinha);
        })
        .catch(error => {
            console.error("Erro:", error);
            alert(error.message);
        });
    } catch (error) {
        console.error("Erro:", error);
        alert(error.message);
    }
}

document.getElementById("formulario").addEventListener('submit', function (event) {
    event.preventDefault();
    adicionaDadosAluno();
});