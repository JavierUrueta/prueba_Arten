<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Proveedores</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
            /* Personaliza el tamaño del navbar */
            .navbar {
            height: 120px;
            background-color: #63af9a; /* Cambiar el color al que desees */
            }
            /* Personaliza el tamaño del texto en el navbar */
            .navbar-brand, .nav-link {
            font-size: 24px;
            }
            /* Personaliza la distancia entre elementos de menú */
            .navbar-nav .nav-item {
            margin-right: 40px; /* Ajusta el valor según el espacio que desees entre elementos */
            }

            /* Evita que el último elemento tenga margen derecho */
            .navbar-nav .nav-item:last-child {
            margin-right: 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <img src="{!! asset('images/logo.png') !!}" style="width: 20%; margin-right: 50px;">
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/proveedores">Proveedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/productos">Productos</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" >
                        <button class="btn btn-outline-success" type="submit" style="margin-right: 50px; color:black; border-color:black; background-color:white;">Sign Out</button>
                    </form>
                </div>
            </div>
        </nav>
        <br>
        <div class="container-lg">
            <!-- Button trigger modal -->
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #63af9a; color:white; padding: 10px 10px;">
            Agregar Producto
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/crearProducto" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombreForm"><br>

                                    <label for="folio" class="form-label">Folio</label>
                                    <input type="text" class="form-control" id="folio" name="folioForm"><br>

                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidadForm"><br>

                                    <label for="unidad" class="form-label">Unidades</label>
                                    <input type="number" class="form-control" id="unidad" name="unidadForm"><br>

                                    <label for="precio" class="form-label">Precio por Unidad</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" id="precio_por_unidad" name="precioForm">
                                        <span class="input-group-text">.00</span>
                                    </div><br>

                                    <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                                    <input type="date" class="form-control" id="fecha_ingreso" name="fechaForm"><br>

                                    <label for="id_proveedor" class="form-label">Provedor</label>
                                    <select class="form-select" aria-label="Default select example" name="proveedorForm">
                                        <option selected>Selecciona un Proveedor</option>
                                        @foreach($proveedores as $proveedor)
                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="Crear">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container-lg">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Folio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Precio p/unidad</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">Proveedor</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <th scope="row">{{$producto->id}}</th>
                            <td scope="col" class="text-center">{{$producto->nombre}}</td>
                            <td scope="col" class="text-center">{{$producto->folio}}</td>
                            <td scope="col" class="text-center">{{$producto->cantidad}}</td>
                            <td scope="col" class="text-center">{{$producto->unidad}}</td>
                            <td scope="col" class="text-center">{{$producto->precio_por_unidad}}</td>
                            <td scope="col" class="text-center">{{$producto->fecha_ingreso}}</td>
                            <td scope="col" class="text-center">{{$producto->proveedor->nombre}}</td>
                            <!--Boton Editar-->
                            <td scope="col" class="text-center"><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarModal{{$producto->id}}">Editar</button></td>
                            <!-- Modal para Editar -->
                            <div class="modal fade" id="editarModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel{{$producto->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel{{$producto->id}}">Editar Producto {{$producto->nombre}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formularioEditar" action="/actualizarProducto/{{$producto->id}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre{{$producto->id}}" name="editNombreForm" value="{{$producto->nombre}}"><br>

                                                    <label for="nombre" class="form-label">Folio</label>
                                                    <input type="text" class="form-control" id="folio{{$producto->id}}" name="editFolioForm" value="{{$producto->folio}}"><br>

                                                    <label for="nombre" class="form-label">Cantidades</label>
                                                    <input type="number" class="form-control" id="cantidad{{$producto->id}}" name="editCantidadForm" value="{{$producto->cantidad}}"><br>

                                                    <label for="nombre" class="form-label">Unidades</label>
                                                    <input type="number" class="form-control" id="unidad{{$producto->id}}" name="editUnidadForm" value="{{$producto->unidad}}"><br>

                                                    <label for="precio" class="form-label">Precio por Unidad</label>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text">$</span>
                                                        <input type="text" class="form-control" id="precio{{$producto->id}}" name="editPrecioForm" value="{{$producto->precio_por_unidad}}"><br>
                                                        <span class="input-group-text">.00</span>
                                                    </div>

                                                    <label for="nombre" class="form-label">Fecha de Ingreso</label>
                                                    <input type="date" class="form-control" id="fecha{{$producto->id}}" name="editFechaForm" value="{{$producto->fecha_ingreso}}"><br>

                                                    <label for="id_proveedor" class="form-label">Provedor</label>
                                                    <select class="form-select" aria-label="Default select example" name="editProveedorForm" id="proveedor{{$producto->id}}" value="{{$producto->proveedor}}">
                                                        <option value="{{$producto->proveedor->id}}" selected>{{$producto->proveedor->nombre}}</option>
                                                        @foreach($proveedores as $proveedor)
                                                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                                                    <!--<button type="button" class="btn btn-primary" id="guardarCambios({{$producto->id}})">Guardar cambios</button>-->
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--Boton Eliminar-->
                            <td scope="col" class="text-center"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminarModal{{$producto->id}}">Eliminar</button></td>
                            <!-- Modal para Eliminar -->
                            <div class="modal fade" id="eliminarModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel{{$producto->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!-- Aquí coloca el contenido del modal para confirmar la eliminación del producto -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarModalLabel{{$producto->id}}">Eliminar Producto {{$producto->nombre}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>¿Estás seguro de que deseas eliminar el producto {{$producto->nombre}}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>                                        
                                            <a href="/borrarProducto/{{$producto->id}}" class="btn btn-danger">Eliminar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script>
            function guardarCambios(btn) {
                // Obtener el ID del producto desde el atributo data-producto-id del botón
                var productoId = btn.getAttribute('data-producto-id');

                // Obtener los valores del producto a editar usando los selectores correspondientes
                var nombre = document.getElementById('nombre' + productoId).value;
                var nombre = document.getElementById('folio' + productoId).value;
                var nombre = document.getElementById('cantidad' + productoId).value;
                var nombre = document.getElementById('unidad' + productoId).value;
                var nombre = document.getElementById('precio' + productoId).value;
                var nombre = document.getElementById('fecha' + productoId).value;
                var nombre = document.getElementById('proveedor' + productoId).value;

                // Luego, puedes hacer lo que desees con los valores, como enviarlos mediante AJAX para actualizar el producto en el servidor

                // Por ejemplo, para enviar el formulario al servidor, puedes usar algo como esto:
                document.getElementById('formularioEditar' + productoId).submit();
            }
        </script>

    </body>
</html>