<template>
    <div class="container">
            <div class="col-md-8 mx-auto">
                <!-- Orden -->
                <div class="card mt-3">
                    <div class="card-header">
                        <h1>Nuevo Pedido</h1>
                    </div>
                    <div class="card-body">
                        <div class="orden">
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Detalle" name="detail" required pattern="[a-zA-ZÀ-ÿ0-9 ]+">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Impuesto" name="tax" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Total" name="total" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Estado del Pedido" name="estatus" required pattern="[a-zA-ZÀ-ÿ ]+">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Comentarios" name="comments" required pattern="[a-zA-ZÀ-ÿ ]+">
                                </div>
                                <div class="buttons">
                                    <button type="submit" class="btn btn-primary mr-4">Guardar</button>
                                    <button class="btn btn-danger">Limpiar</button>
                                </div>
                            </form>
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
