<div class="thumbnail <?php echo $_CLASS; if($_IMAGE){ ?> image<?php } ?>" <?php if($_ID != NULL){ ?>id="<?php echo $_ID; ?>" <?php } ?>  style="<?php echo $_STYLE; ?>" <?php if($_LINK != NULL){ echo("onclick = 'window.open(\"$_LINK\", \"_self\");'"); } ?> >
	<?php if($_IMAGE){ ?><img src="<?php echo $_IMAGE; ?>"> <?php } ?>
	<div class="thumbnail-cover <?php echo $_ALT; ?>" style="<?php echo $_STYLE_ALT; ?>">
		<div class="thumbnail-text thumbnail-glider" style="<?php echo $_STYLE_GLIDER; ?>">
			<?php echo $_TITLE ?>
			<span class="thumbnail-info">
				<?php echo $_INFO ?>
			</span>
		</div>
	</div>
</div>