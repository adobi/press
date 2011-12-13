<?php echo form_open() ?>

	<fieldset style="margin-top:20px;">
	    <legend>Please login</legend>
		<div class="clearfix">
			<label for="xlInput">Password</label>
			<div class="input">
			  <input type="password" size="30" name="password" id="password" class="password" />
			</div>
		</div>		
		<div class="actions">
			<input type="submit" value="Login" class="btn primary">
		</div>  		
	</fieldset>
<?php echo form_close() ?>