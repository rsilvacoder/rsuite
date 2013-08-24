<?php
$chave = md5("http://lamp.dev/frame.php");

if(isset($_POST)) {
	var_dump($_POST);
}else{
	echo "Aguardando Inicios do Envio!";
}

sleep(7);
?>
<?php if (isset($_POST)): ?><script type="text/javascript">location.href="http://lamp.dev/admin/campaigns/end/<?php echo $chave; ?>";</script><?php endif ?>