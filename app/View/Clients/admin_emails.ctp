<div class="row">
	<div class="span3">1</div>
	<div class="span3" style="text-align:right">
		<!-- <span id="totalClients"><?php echo $totalClients; ?></span> /  --><span id="totalClientsSents"></span>
	</div>
	<div class="span6">
		<div class="progress progress-striped active">
		  <div class="bar" id="totalClientsResult" style="width: 0%;"></div>
		</div>
	</div>
</div> 

<div class="row">
	<div class="span12">
		<table class="table table-hover">
		<?php foreach ($vulls as $vull): ?>
			<?php
			$http_host = str_replace("http://", "", $vull['Vull']['name']);
			$http_host = explode("/",$http_host);
			$http_host = $http_host[0];
			$chave = md5($http_host); 
			?>
				<tr>
					<td>
						<div>
							<button type="button" class="btn" onclick="openFrame(this,'<?php echo $chave; ?>')">+</button> <?php echo $vull['Vull']['name']; ?>
						</div>
					</td>
					<td width="80px">
						<span id="<?php echo $chave; ?>_status" class="label label-warning" style="display:none;">Aguarde</span>
					</td>
				</tr>	
				<tr class="frame" id="<?php echo $chave ?>" style="display:none;">
					<form class="form" rel="<?php echo $chave ?>" method="POST" action="<?php echo $vull['Vull']['name']; ?>" target="frame_<?php echo $chave; ?>" id="form_<?php echo $chave; ?>">
					<td colspan="2">
							<div style="display:none;">
								<input type="hidden" id="<?php echo $chave ?>_chave" name="chave" value="">
								<input type="hidden" id="<?php echo $chave ?>_assunto" name="assunto" value="">
								<input type="hidden" id="<?php echo $chave ?>_remetente" name="remetente" value="">
								<input type="hidden" name="veio" value="foi">
								<textarea id="<?php echo $chave ?>_html" name="html"></textarea>
							</div>
							<input type="button" style="width:100%" value="Start" class="btn send" id="send_<?php echo $chave; ?>" rel="<?php echo $chave; ?>">
						<div id="frame_<?php echo $chave; ?>">
							<div class="row">
								<div class="span8">
									<iframe name="frame_<?php echo $chave; ?>" src="<?php echo $vull['Vull']['name']; ?>" style="width:100%;height:200px;"></iframe>
								</div>
								<div class="span3">
									<textarea id="<?php echo $chave ?>_emails" style="height:200px;width:100%;" name="emails">p0rtug4l2013@gmail.com</textarea>
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

<!-- <textarea rows="10" style="width:100%"><?php foreach ($clients as $client): ?><?php echo $client['Client']['email']."\n"; ?>
<?php endforeach ?>p0rtug4l2013@gmail.com</textarea>
<input type="button" style="width:100%" class="btn" value="Proximo" id="refresh"> -->