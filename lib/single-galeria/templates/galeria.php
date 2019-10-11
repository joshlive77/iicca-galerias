<div class="imagenes zoom-gallery">

    <?php foreach ($data as $imagen) : ?>
        <div class="image-container">
            <a class="imagen" href="<?= $imagen->getImagen() ?>" data-source="http://500px.com/photo/32736307" title="<?= $imagen->getTitulo() ?>">
                <img src="<?= $imagen->getImagen() ?>">
            </a>
            <div class="descripcion">
                <p><?= $imagen->getTitulo() ?></p>
            </div>
        </div>
    <?php endforeach; ?>

</div>


</div>
</div>
</div>
</div>

</div>

</div>
</div>