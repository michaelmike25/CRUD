function deletar(idPessoa){
    const url = 'http://contatovendedor.16mb.com/ptr/projeto/api/pessoa/delete.php';
    let payload = {
        id: idPessoa
    }
    
    var data = new FormData();
    data.append( "json", JSON.stringify( payload ) );
    
    fetch(url,
    {
        method: "POST",
        body: data
    })
    .then(function(res){ return res.json(); })
    .then(function(data){ alert( JSON.stringify( data ) ) })
  readTable()
  updateTable()
}