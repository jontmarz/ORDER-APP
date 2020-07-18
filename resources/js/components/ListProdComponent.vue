<template>
    <div class="container">
        <div class="col-md-8 mx-auto">
            <!-- Tabla productos en pedido -->
            <div class="card mt-3">
                <div class="card-header">
                    <h1>Lista de Productos en Pedido: id</h1>
                </div>
                <div class="card-body">
                    <div class="tabla-productos tabla">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>
                                    <button class="btn btn-warning mr-4">Editar</button>
                                    <button class="btn btn-danger">Borrar</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
