function readTable(){
    const tabela = document.getElementById('readTable');
    const url = 'http://contatovendedor.16mb.com/ptr/projeto/api/pessoa/read.php';
    let tabelaHTML = "<tr><th>idPessoa</th><th>nome</th><th>cpf</th><th>whatsapp</th><th>DELETE</th></tr>";

    fetch(url)
    .then((resp) => resp.json())
    .then(function(data) {
    let pessoas = data;
    const p = pessoas.map(pessoa => {
        tabelaHTML = tabelaHTML+`<tr>
        <td>${pessoa.idPessoa}</td>
        <td>${pessoa.nome}</td>
        <td>${pessoa.cpf}</td>
        <td>${pessoa.whatsapp}</td>
        <td><button onclick="deletar(${pessoa.idPessoa})">Remover</button></td>
    </tr>`;
    });
    tabela.innerHTML = tabelaHTML;
    })
    .catch(function(error) {
    console.log(error);
    });   
}

function updateTable(){
    const tabela = document.getElementById('updateTable');
    const url = 'http://contatovendedor.16mb.com/ptr/projeto/api/pessoa/read.php';
    let tabelaHTML = "<tr><th>nome</th><th>cpf</th><th>whatsapp</th><th>DELETE</th></tr>";
  
    fetch(url)
    .then((resp) => resp.json())
    .then(function(data) {
      let pessoas = data;
      const p = pessoas.map(pessoa => {
        tabelaHTML = tabelaHTML+`<tr>
        <td><input type="text" value="${pessoa.nome}"></td>
        <td><input type="text" value="${pessoa.cpf}"></td>
        <td><input type="text" value="${pessoa.whatsapp}"></td>
        <td><button>Atualizar</button></td>
      </tr>`;
      });
      tabela.innerHTML = tabelaHTML;
    })
    .catch(function(error) {
      console.log(error);
    });   
  }