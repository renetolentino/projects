var lista_de_objetos = Array()


function adicionarObjeto() {
		var auxiliar = document.getElementById('objeto').value // recupera o texto digitado na caixa
		auxiliar = auxiliar.toLowerCase() // transforma o texto digitado para lowercase 
		if (auxiliar.length === 0) {
			alert('Informe um valor válido!')
			document.getElementById('objeto').value = ''
		}    //Verifica se o valor está vazio ou preenchido
		else if (auxiliar.length > 0) {
			if (lista_de_objetos.indexOf(auxiliar) === -1)  {
				lista_de_objetos.push(auxiliar)
				console.log(lista_de_objetos)
				document.getElementById('objeto').value = ''
			} // Verificar se o valor está preenchido
			else if (lista_de_objetos.indexOf(auxiliar) !== -1) {
				alert('Objeto já foi adicionado')
				document.getElementById('objeto').value = ''
			} // se existir exibir um alert
		}
}

function ordernarLista() {

	lista_de_objetos.sort()
	console.log(lista_de_objetos)

}