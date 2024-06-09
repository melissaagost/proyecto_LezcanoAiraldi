<section class="joyeria">
<?php if(isset($productos) && !empty($productos)): ?>

<!---portada--->
<div class="portada-joyeria">
    <img src="<?= base_url('assets/img/joyeria2.jpg') ?>" alt="Imagen de portada">
    <div class="cover-text">
        <h1>ENGRAVADOS</h1>
    </div>
</div>

<!---productos--->
<div class="container-productos-general">
    <div class="products-container">

        <?php foreach ($productos as $producto): ?>
            <?php if($producto['activo'] == 'SI' && $producto['categoria_id'] == 3): ?>

                <div class="product" data-name="<?php echo 'p-' . $producto['id_producto']; ?>">
                    <img src="<?php echo base_url('public/uploads/' . $producto['imagen']); ?>" alt="">
                    <h3 class="nombre-prod"><?php echo $producto['nombre']; ?></h3>
                    <div class="price"><?php echo '$' . $producto['precio_vta']; ?></div>
                </div>

            <?php endif; ?>
        <?php endforeach; ?>

    </div>
</div>


<!---reviews--->
<div class="products-preview">

    <?php foreach ($productos as $producto): ?>
        <?php if($producto['activo'] == 'SI' && $producto['categoria_id'] == 3): ?>

            <div class="preview" data-target="p-<?php echo $producto['id_producto']; ?>">
                <i class="fas fa-times"></i>
                <img src="<?php echo base_url('public/uploads/' . $producto['imagen']); ?>" alt="">
                <h3 class="nombre-prod"><?php echo $producto['nombre']; ?></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span>(250)</span>
                </div>
                <p class="texto-prod"><?php echo $producto['descripcion']; ?></p>
                <div class="price"><?php echo '$' . $producto['precio_vta']; ?></div>
                <div class="buttons">
                    <a href="#" class="buy">comprar ahora</a>
                    <a href="#" class="cart">añadir al carrito</a>
                </div>
            </div>

        <?php endif; ?>
    <?php endforeach; ?>

</div>


<!---formulario consulta sobre prod--->
<p class="consulta-prod">Si tienes dudas acerca de algún producto no dudes en ponerte en contacto:</p>

<div class="fila">

         
        <form action="<?php echo base_url('consultas/saveP'); ?>" method="post">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="box" required>
            <input type="text" name="producto" id="nombre" placeholder="Producto" class="box" required>
            <textarea type="text" name="mensaje" id="mensaje" class="box" placeholder="Mensaje..." id="" cols="30" rows="10" required></textarea>
            <input type="submit" value="Enviar" class="btn">
            <input type="submit" value="Limpiar" onclick="borrarTextArea()" class="btn">
        </form>

</div>

<script>
        function borrarTextArea() {
            // Obtener todos los campos de texto en el formulario
            var camposTexto = document.querySelectorAll('input[type="text"]');

            // Iterar sobre cada campo de texto y limpiar su contenido
            camposTexto.forEach(function(campo) {
                campo.value = '';
            });
        }
    </script>
<?php endif; ?>
</section>