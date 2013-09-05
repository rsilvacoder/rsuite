<form action="/admin/clients/emails/1" method="POST">
	<div>
		<input type="text" name="assunto" id="assunto" placeholder="Assunto:" value="<?php echo $_POST['assunto'] ?>" style="width:100%">
	</div>
	<div>
		<input type="text" name="remetente" id="remetente" placeholder="Remetente:" value="<?php echo $_POST['remetente'] ?>" style="width:100%">
	</div>
	<div>
		<input type="text" name="link" id="link" placeholder="Link:" value="<?php echo $_POST['link'] ?>" style="width:100%">
	</div>
	<div>
		<textarea name="html" id="html" style="width:100%"><?php echo stripslashes($_POST['html']); ?></textarea>
	</div>
	<input type="submit" class="btn" value="Iniciar envio!">
</form>