<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<title>Multimedial</title>
</head>
<body>
	<div class="container">

		<div class="row">
			<h2>Multimedial</h2>
		</div>

		<!sdfsdfsdfsdfsd>
		<div class="mb-5">
			<?php echo form_open('welcome/agregar',['id'=>'form-persona']);?>
				<div class="row">
					<div class="form-group col-sm-4">
						<label for="">CI</label>
						<input type="text" name="ci" id="ci" class=form-control requeried>
					</div>
					<div class="form-group col-sm-4">
						<label for="">Nombre</label>
						<input type="text" name="nombre_completo"  id="nombre_completo" class=form-control requeried>
					</div>
					<div class="form-group col-sm-4">
						<label for="">fecha de nacimiento</label>
						<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class=form-control requeried>
					</div>
				</div>
				<div class="row">
				<div class="form-group col-sm-4">
						<label for="">telefono</label>
						<input type="text" name="telefono" id="telefono" class=form-control requeried>
					</div>
					<div class="form-group col-sm-4">
						<label for="">departamento</label>
						<input type="text" name="departamento" id="departamento" class=form-control requeried>
					</div>
				</div>
				<br>
				<button type="submit" class="btn btn-primary btn-block">Guardar</button>
			<?php echo form_close();?>
		</div>

		<div class="row">
			<div class="card col-12">
				<div class="card-header">
					<h4>Tabla de estudiantes</h4>
				</div>
				<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
						<th scope="col">CI</th>
						<th scope="col">Nombre</th>
						<th scope="col">fecha de nacimiento</th>
						<th scope="col">telefono</th>
						<th scope="col">departamento</th>
						<th scope="col">Editar</th>
						<th scope="col">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$count = 0;
							foreach ($personas as $persona) {
								echo '
									<tr>
										<td>'.$persona->ci.'</td>
										<td>'.$persona->nombre_completo.'</td>
										<td>'.$persona->fecha_nacimiento.'</td>
										<td>'.$persona->telefono.'</td>
										<td>'.$persona->departamento.'</td>
										<td><button type="button" class="btn btn-warning" onclick="llenar_datos(`'.$persona->ci.'`,`'.$persona->nombre_completo.'`,`'.$persona->fecha_nacimiento.'`,`'.$persona->telefono.'`,`'.$persona->departamento.'`)">Editar</button></td>
										<td><a href="'.base_url('welcome/eliminar/'.$persona->ci).'" type="button" class="btn btn-danger">Eliminar</a></td>
									</tr>
								';
							}
						?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script>

		let url ="<?php echo base_url('welcome/editar');?>"

		const llenar_datos = (ci, nombre_completo, fecha_nacimiento, telefono, departamento) => {
			let path = url+"/"+ci;
			console.log(ci, nombre_completo, fecha_nacimiento, telefono, departamento);
			console.log(path);
			document.getElementById('form-persona').setAttribute('action',path);
			document.getElementById('ci').value = ci;
			document.getElementById('nombre_completo').value = nombre_completo;
			document.getElementById('fecha_nacimiento').value = fecha_nacimiento;
			document.getElementById('telefono').value = telefono;
			document.getElementById('departamento').value = departamento;
		};

	</script>
</body>
</html>
