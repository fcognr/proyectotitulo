<!--=====================================
		VENTANAS MODAL INGRESO USUARIOS
======================================-->

<!-- Modal -->
<div class="modal" id="modalLogin">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">INGRESA A TU CUENTA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">    

      		<!-- Ingreso con credenciales-->
        	<form>
        		
	        	Ingresa tu correo electrónico
	        	<div class="input-group mb-3">

	        		<div class="input-group-prepend">
	        			<span class="input-group-text"><i class="fas fa-envelope"></i></span>
	        		</div>
	        		<input type="email" class="form-control" placeholder="Email">
        		</div>
	        	
	        	Ingresa tu contraseña
	        	<div class="input-group mb-3">
	        		<div class="input-group-prepend">
	        			<span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
	        		</div>
	        		<input type="password" class="form-control" placeholder="Contraseña">
	        	</div>
	        	

      		<input type="submit" class="btn-primary btn-block" value="Ingresar">
	        	<p><p><p><p>

	        <!-- Ingreso con rrss -->
	        <div class="d-flex">
      			<div class="px-2 flex-fill">
      				<p class="p-2 bg-danger text-center">	
      					<i class="fab fa-google">	</i>
      					Ingreso con Google
      				</p>
      			</div>
 
      			<div class="px-2 flex-fill">
      				<p class="p-2 bg-primary text-center text-white">	
      					<i class="fab fa-facebook">	</i>
      					Ingreso con Facebook
      				</p>
      			</div>
      		</div>


      	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        
        ¿No tienes cuenta? Registrate aquí | 
        <strong>
        	<a href="#modalRegistro" data-toggle="modal" data-dismiss="modal">
        		Registrarse
        	</a>
        </strong>
      </div>

    </div>
  </div>
</div>

<!--=====================================
		VENTANAS MODAL REGISTRO USUARIOS
======================================-->

<!-- Modal -->
<div class="modal" id="modalRegistro">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">REGISTRARSE</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">    

      		<!-- Ingreso con credenciales-->
        	<form>

        		Ingresa tu Nombre
	        	<div class="input-group mb-3">

	        		<div class="input-group-prepend">
	        			<span class="input-group-text">
	        				<i class="fas fa-user"></i>
	        			</span>
	        		</div>
	        		<input type="text" class="form-control" placeholder="Nombre">
        		</div>

        		Ingresa tu Apellido
	        	<div class="input-group mb-3">

	        		<div class="input-group-prepend">
	        			<span class="input-group-text">
	        				<i class="fas fa-user"></i>
	        			</span>
	        		</div>
	        		<input type="text" class="form-control" placeholder="Apellido">
        		</div>

        		Ingresa tu Número de teléfono
	        	<div class="input-group mb-3">

	        		<div class="input-group-prepend">
	        			<span class="input-group-text">
	        				<i class="fas fa-phone"></i>
	        			</span>
	        		</div>
	        		<input type="text" class="form-control" placeholder="telefono">
        		</div>
        		
	        	Ingresa tu correo electrónico
	        	<div class="input-group mb-3">

	        		<div class="input-group-prepend">
	        			<span class="input-group-text"><i class="fas fa-envelope"></i></span>
	        		</div>
	        		<input type="email" class="form-control" placeholder="Email">
        		</div>
	        	
	        	Ingresa tu contraseña
	        	<div class="input-group mb-3">
	        		<div class="input-group-prepend">
	        			<span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
	        		</div>
	        		<input type="password" class="form-control" placeholder="Contraseña">
	        	</div>
	        	

      		<input type="submit" class="btn-primary btn-block" value="Registrarse">
	        	<p><p><p><p>


      	</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        
        ¿Ya estás registrado? Ingresa aquí | 
        <strong>
        	<a href="#modalRegistro" data-toggle="modal" data-dismiss="modal">
        		Ingresar
        	</a>
        </strong>
      </div>

    </div>
  </div>
</div>

<!--=====================================
		VENTANAS MODAL PLANES
======================================-->

<div class="modal" id="modalPlanes">

	<div class="modal-dialog">

		<div class="modal-content">
			
			<div class="modal-header">
				<h4 class="modal-title"></h4>
				<button  type="button" class="close" data-dismiss="modal">&times;</button>			
			</div>

			<div class="modal-body">
				<img src="" class="img-thumbnail">
				<p class="py-3"></p>

				<div class="text-center">
					<a href="cabanas.html" class="btn btn-primary text-center">Reserva tu cabaña</a>
				</div>
				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
		
	</div>
	

</div>