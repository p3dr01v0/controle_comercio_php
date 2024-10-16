<?php
	session_start();

	if( isset( $_SESSION['logged_in'] ) && $_SESSION['logged_in'] )
	{
		$tempo_limite = 600; // 10 minutos

		// se já foi definido vamos ver se a sessão ainda está valida
		if( isset( $_SESSION['TEMPO'] ) )
		{
			$tempo_desde_o_ultimo_carregamento = time() - $_SESSION['TEMPO'];
			$_SESSION['VER'] = $tempo_desde_o_ultimo_carregamento;
			if($tempo_desde_o_ultimo_carregamento > $tempo_limite)
			{
				$_SESSION['logged_in'] = false;

				header( 'location: desconectar.php' );
				die();
			}
			else
			{
				 // senão vamos apenas atualizar a sessão e mostra o conteudo que ele quer ver
				$_SESSION['TEMPO'] = time();
			}
		}
		else
		{
			$_SESSION['logged_in'] = false;

			header( 'location: desconectar.php' );
			die();
		}
	}
	else
	{
		header( 'location: desconectar.php' );
		die();
	}
?>