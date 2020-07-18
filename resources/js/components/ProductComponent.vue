<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto">
                <!-- Producto -->
                <div class="card">
                    <div class="card-header">
                        <h1>Nuevo Producto</h1>
                    </div>
                    <div class="card-body">
                        <div class="product">
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="nombre" name="name" required pattern="[a-zA-ZÀ-ÿ0-9 ]+">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Descripción" name="description" required pattern="[a-zA-ZÀ-ÿ0-9 ]+">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Precio" name="price" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$">
                                </div>
                                <div class="buttons text-center">
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
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
