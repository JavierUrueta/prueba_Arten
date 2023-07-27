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
                            <a class="nav-link active" aria-current="page" href="/proveedores">Proveedores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/productos">Productos</a>
                        </li>
                    </ul>                    
                    <form class="d-flex" role="search" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="btn btn-outline-success" style="margin-right: 50px; color:black; border-color:black; background-color:white;">
                            {{ __('Cerrar Sesion') }}
                            
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </nav>
        <br>
        <div class="container">
            <div class="row">
                <form action="{{ route('proveedores.buscar') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Buscar proveedor..." id="search-input">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>
                <div id="result-container">
                    <!-- Resultados de búsqueda en tiempo real se mostrarán aquí -->
                </div>
                <table class="table table-striped">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Razon_Social</th>
                            <th scope="col">Numero d/Proveedor</th>
                            <th scope="col">Fecha d/registro</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Region</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                        <tr>
                            <th scope="col" class="text-center">{{ $proveedor->id }}</th>
                            <td scope="col" class="text-center">{{ $proveedor->nombre }}</th>
                            <td scope="col" class="text-center">{{ $proveedor->razon_social }}</th>
                            <td scope="col" class="text-center">{{ $proveedor->numero_proveedor }}</th>
                            <td scope="col" class="text-center">{{ $proveedor->fecha_registro }}</th>
                            <td scope="col" class="text-center">{{ $proveedor->RFC }}</th>
                            <td scope="col" class="text-center">{{ $proveedor->imagen_random }}</th>
                            <td scope="col" class="text-center">{{ $proveedor->region->nombre}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <!-- Mostrar enlaces de paginación -->
                {{ $proveedores->links() }}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            const searchInput = document.getElementById('search-input');
            const resultContainer = document.getElementById('result-container');

            searchInput.addEventListener('input', function () {
                const query = this.value;
                axios.get(`/proveedores/busqueda-en-tiempo-real?q=${query}`)
                    .then(response => {
                        const proveedores = response.data;
                        let html = '';
                        proveedores.forEach(proveedor => {
                            html += `<li>${proveedor.nombre}</li>`;
                            // Agrega aquí más información del proveedor que desees mostrar en el resultado de búsqueda.
                        });
                        resultContainer.innerHTML = html;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        </script>
    </body>
</html>