<?php 

require_once("verifica.php");

include_once("cabec.php"); 

?>

	<p>&nbsp;</p>

	<h2 align="center" class="cor_texto"><?php echo $lng['selecioneIdioma']; ?></h2>

	<p>&nbsp;</p>

	<div class="container">
		<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['portugues']; ?></p>
						<p class="card-text"><?php echo $lng['brasil']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=pt_BR"><img src="./icones/pt_BR.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">pt_BR</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['ingles']; ?></p>
						<p class="card-text"><?php echo $lng['Eua']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=en_US"><img src="./icones/en_US.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">en_US</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['espanhol']; ?></p>
						<p class="card-text"><?php echo $lng['colombia']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=es_CO"><img src="./icones/es_CO.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">es_CO</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['espanhol']; ?></p>
						<p class="card-text"><?php echo $lng['mexico']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=es_MX"><img src="./icones/es_MX.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">es_MX</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['espanhol']; ?></p>
						<p class="card-text"><?php echo $lng['espanha']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=es_ES"><img src="./icones/es_ES.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">es_ES</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['espanhol']; ?></p>
						<p class="card-text"><?php echo $lng['argentina']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=es_AR"><img src="./icones/es_AR.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">es_AR</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['ingles']; ?></p>
						<p class="card-text"><?php echo $lng['inglaterra']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=en_UK"><img src="./icones/en_UK.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">en_UK</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['frances']; ?></p>
						<p class="card-text"><?php echo $lng['franca']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=fr_FR"><img src="./icones/fr_FR.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">fr_FR</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['italiano']; ?></p>
						<p class="card-text"><?php echo $lng['italia']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=it_IT"><img src="./icones/it_IT.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">it_IT</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-dark">
					<div class="card-header border-dark corTextoDestaque fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['alemao']; ?></p>
						<p class="card-text"><?php echo $lng['alemanha']; ?></p>
					</div>
					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=de_DE"><img src="./icones/de_DE.png" width="100px"></a></p>
					</div>
					<div class="card-footer border-dark text-center">
						<small class="corTextoDestaque">de_DE</small>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	<p>&nbsp;</p>
	
<?php include_once("rodape.php"); ?>