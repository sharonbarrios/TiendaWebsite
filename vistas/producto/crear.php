<!--Creación de Producto-->

<?php if (isset($edit) && isset($pro) && is_object($pro)) : ?>
    <h1>Editar producto <?= $pro->nombre ?></h1>
    <?php $url_action = base_url . "producto/save&id=" . $pro->id; ?>
<?php else : ?>
    <h1>Crear nuevos productos</h1>
    <?php $url_action = base_url . "producto/save"; ?>
<?php endif; ?>


<form action="<?= $url_action ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="" class="form-control" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>">
    </div>
    <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea name="descripcion" id="" cols="30" rows="4" class="form-control">
<?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?>
</textarea>
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="" class="form-control" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>">
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="" class="form-control" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?>">
    </div>
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria" id="" class="form-control">
            <?php while ($cat = $categorias->fetch_object()) : ?>

                <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
                    <?= $cat->nombre ?>
                </option>

            <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="imagen">Imagen</label>
        <?php if (isset($pro) && is_object($pro)) : ?>
            <?php if ($pro->imagen != null) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="Camiseta" class="thumb">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png" alt="" class="thumb">
            <?php endif; ?>
        <?php endif; ?>
        <input type="file" name="imagen" id="" class="btn">
    </div>
    <div>
        <input type="submit" value="Guardar" class="buttons btn btn-info">
    </div>
</form>