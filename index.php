<?php

//conexao
include_once 'php_action/db_connect.php';
//header
include_once 'includes/header.php';
include_once 'includes/mensagem.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3 ">
		<h3 class="light">Clientes</h3>
        <table class="striped">
            <tread>
                <tr>
                    <th>Nome:</th>
                    <th>Email:</th>
                    <th>Telefone:</th>
                    <th>Cidade:</th>
					<th>UF:</th>
					<th></th>
					<th></th>
                </tr>
            </tread>
            <tbody>
				<?php
					$sql = "SELECT * FROM clientes";
					$resultado = mysqli_query($connect, $sql);

					if(mysqli_num_rows($resultado) > 0): 	

					while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					<td><?php echo $dados['nome']?></td>
					<td><?php echo $dados['email']?></td>
					<td><?php echo $dados['telefone']?></td>
					<td><?php echo $dados['cidade']?></td>
					<td><?php echo $dados['uf']?></td>
					<td><a href="editar.php?id=<?php echo $dados['id']?>" class="btn-floating green"><i class="material-icons">edit</i></a>Editar</td>
					<td><a href="#modal<?php echo $dados['id']?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a>Excluir</td>
					<div id="modal<?php echo $dados['id']?>" class="modal">
						<div class="modal-content">
							<h4>Atenção!</h4>
							<h6>Tem certeza que deseja excluir esse cliente?</h6>
						</div>
						<div class="modal-footer">
							
							<form action="php_action/delete.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $dados['id']?>">
								<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
								<a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
							</form>
						</div>
					</div>	
				</tr>
				<?php 
					endwhile; 
				else: ?>
					<tr>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
						<td>.</td>
					</tr>
					<?php
					endif;
					?>
			</tbody>
		</table>
		<br>
		<a href="adicionar.php" class="btn">Adicionar cliente</a>
    </div>

</div>

<?php
//footer
include_once 'includes/footer.php';
?>