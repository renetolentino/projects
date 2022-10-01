$(document).ready(() => {
	/**
	 * os métodos load(), get() e post() funcionam de forma análoga
	 * o get('referencia', callbackfunction) e load('referencia', callbackfunction) funcionam de forma análoga
	 * */
	$('#documentacao').on('click', ()=> {
		//$('#pagina').load('documentacao.html')

		/*
		$.get('documentacao.html', data => {
			$('#pagina').html(data)
		})
		*/

		$.post('documentacao.html', data => {
			$('#pagina').html(data)
		})
	})

	$('#suporte').on('click', ()=> {
		//$('#pagina').load('suporte.html')

		/*
		$.get('suporte.html', data => {
			$('#pagina').html(data)
		})
		*/

		$.post('suporte.html', data => {
			$('#pagina').html(data)
		})
	})

	$('#index').on('click', ()=> {
		$('body').load('index.html')
	})


	//método ajax
	$('#competencia').on('change', e => {

		let competencia = $(e.target).val()

		$.ajax({
			type: 'GET',
			url: 'app.php',
			data: `competencia=${competencia}`, //x-www-form-urlencoded
			dataType: 'json',
			success: dados => {
				//console.log(dados)
				for (i in dados) {
					//console.log(dados[i])
					if(i == 'data_inicio' || i == 'data_fim') {
						continue
					}
					$(`#${i}`).html(dados[i])

				}

			},
			error: erro => console.log(erro)
		})

		//método, ulr, dados, sucesso, erro (só o básico)
	})
})