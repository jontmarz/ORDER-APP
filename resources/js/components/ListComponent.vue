<template>
    <div class="container">
        <!-- Lista pedidos -->
        <div class="card mt-3">
            <div class="card-header">
                <h1>Lista Pedidos</h1>
            </div>
            <div class="card-body">
                <!-- tabla pedidos -->
                <div class="tabla-ordenes tabla">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Comentarios</th>
                            <th scope="col">Impuesto</th>
                            <th scope="col">Total</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                <button class="btn btn-info">Ver datalle</button>
                            </td>
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
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
