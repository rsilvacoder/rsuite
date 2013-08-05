<?php if (empty($links)): ?>
	<div class="clients ">
	<?php echo $this->Form->create('Grab'); ?>
		<fieldset>
			<legend><?php echo __('Grab emails'); ?></legend>
		<?php
			echo $this->Form->input('links',array('type' => 'textarea'));
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
	</div>
<?php else : ?>

	<div>

		<iframe id="frame" src="<?php echo $links[0]; ?>" style="width:100%;"></iframe>

	</div>

<?php endif ?>