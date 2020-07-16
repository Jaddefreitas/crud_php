<?php

//sessao
session_start();
if(isset($_SESSION['mensagem'])): ?>
	//mensagem
	<script>
		window.onload = funtion(){
			M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});	
		}
	</script>
<?php
endif;
session_unset();