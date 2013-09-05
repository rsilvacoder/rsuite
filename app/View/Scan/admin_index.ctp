<form action="#" method="POST">
	<div class="row">
		<div class="span6">
			<p><b>Verificar:</b></p>
			<div>
				<textarea name="dorks" rows="5" id="dorks" style="width:100%" placeholder="Strings / Dorks"><?php echo stripslashes($_POST['html']); ?></textarea>
			</div>
		</div>
		<div class="span6">
			<p><b>Verificado</b>s:</p>
			<div style="overflow:auto;height:100px;">
			</div>
		</div>
	</div>
	<input type="button" class="btn" value="Iniciar Scan!" id="start">
</form>
<br>
<br>
<br>
<div class="row">
	<div class="span12">
		<table class="table table-hover">
		<?php foreach ($vulls as $vull): ?>
			<?php
			$http_host = str_replace("http://", "", $vull['Info']['name']);
			$http_host = explode("/",$http_host);
			$http_host = $http_host[0];
			$chave = md5($http_host); 
			?>
				<tr>
					<td>
						<div>
							<button type="button" class="btn" onclick="openFrame(this,'<?php echo $chave; ?>')">+</button> <?php echo $vull['Info']['name']; ?>
						</div>
					</td>
					<td width="80px">
						<span id="<?php echo $chave; ?>_status" class="label label-warning" style="display:none;">Aguarde</span>
					</td>
				</tr>	
				<tr class="frame" id="<?php echo $chave ?>" style="display:none;">
					<form class="form" rel="<?php echo $chave ?>" method="GET" action="<?php echo $vull['Info']['name']; ?>" target="frame_<?php echo $chave; ?>" id="form_<?php echo $chave; ?>">
					<td colspan="2">
							<div style="display:block;">
								<input type="text" id="<?php echo $chave ?>_chave" name="chave" value="<?php echo $chave; ?>">
								<input type="text" id="<?php echo $chave ?>_dork" name="dork" value="">
								<input type="text" id="<?php echo $chave ?>_server" name="server" value="http://lamp2.dev/admin/scan/end/">
								<input type="text" name="veio" value="foi">
							</div>
							<input type="button" style="width:100%" value="Start" class="btn send" id="send_<?php echo $chave; ?>" rel="<?php echo $chave; ?>">
						<div id="frame_<?php echo $chave; ?>">
							<div class="row">
								<div class="span8">
									<iframe name="frame_<?php echo $chave; ?>" src="<?php echo $vull['Info']['name']; ?>" style="width:100%;height:200px;"></iframe>
								</div>
							</div>
						</div>
					</td>
					</form>
				</tr>
		<?php endforeach ?>
		</table>
	</div>
</div>