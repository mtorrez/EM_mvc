<h1>Registro</h1>
<form action="" method="post">
	<label>Nombre</label>
	<input type="text" name="nombre" value="<?php echo $this->data['item']['nombre']; ?>">
	<label>Celular</label>
	<input type="text" name="telefono" value="<?php echo $this->data['item']['telefono']; ?>">
	<label>Correo</label>
	<input type="text" name="correo" value="<?php echo $this->data['item']['correo']; ?>">	
	<input type="hidden" name="id" value="<?php echo $this->data['item']['id']; ?>">
	<input type="submit" value="Enviar" />
</form>