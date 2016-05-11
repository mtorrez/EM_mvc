<!DOCTYPE HTML>
<html lang="es"> 
	<head> 
		<meta charset="utf-8"> 
		<link rel="stylesheet" href="estilos.css"> 
		<title><?php echo $this->data['titulo']; ?></title> 
	</head> 
	<body> 
		<header> 
			<h1>Lista de contactos</h1>
		</header>
		<p><a href="index.php?action=nuevo">Nuevo contacto</a></p>
		<div id="contenido"> 
			<table border="1">
				<tr>
					<th>Nombe</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th></th>
					<th></th>
				</tr>
				<?php foreach ($this->data['contactos'] as $item) : ?>
					<tr>
						<td><?php echo $item['nombre']; ?></td>
						<td><?php echo $item['telefono']; ?></td>
						<td><?php echo $item['correo']; ?></td>
						<td><a href="?action=editar&id=<?php echo $item['id']; ?>">Editar</a></td>
						<td><a href="?action=eliminar&id=<?php echo $item['id']; ?>" onclick="return(confirm('Esta seguro'));">Eliminar</a></td>
					</tr>
				<?php endforeach; ?>
			 </table>
		</div> 
	</body> 
</html>