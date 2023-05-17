
	//Atribuindo os botoes as variaveis
	const proxima = document.querySelector('.proximaImagem');
	const anterior = document.querySelector('.imagemAnterior');
	
	//Criando um Arry para alocar as imagens em cada posicao
	var imagens = [
	   "https://www.cleverfiles.com/howto/wp-content/uploads/2016/08/mini.jpg",
	   "https://upload.wikimedia.org/wikipedia/commons/e/e0/JPEG_example_JPG_RIP_050.jpg",
	   "https://s2-techtudo.glbimg.com/1o2J-rf2G9qtlQlm82gaq-mFBec=/0x129:1024x952/924x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2023/7/i/ME2AxRRoygUyFPCDe0jQ/3.png",
	   "https://s2-techtudo.glbimg.com/_fi6Z5P7AGZya-fdftAhZnCdbnw=/0x0:1024x1024/430x432/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2023/e/8/AoMju0TPWBvwkfwj2BXA/1.jpg"
	];


	let index = 1;
	//Funcao onde altera a imagem para o proximo item da lista
	function alterarImagem() {
	   const img = document.getElementById("img");
	   index = (index + 1) % imagens.length;
	   img.src = imagens[index];
	   anterior.disabled = false; // Reativar o botão anterior
	}
	
	//Funcao onde altera a imagem para o item anterior da lista
	function voltarImagem() {
		if (index === 1) {
	   		anterior.disabled = true; // Desativar o botão anterior
	   	}

		const img = document.getElementById("img");
	   	index = (index - 1 + imagens.length) % imagens.length;
	   	img.src = imagens[index];
	   
	   	
	}

	//Onde os botoes quando clicados chamam as funcoes
	proxima.addEventListener('click', alterarImagem);
	anterior.addEventListener('click', voltarImagem);
	

