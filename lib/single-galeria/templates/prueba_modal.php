<div class="imagenes zoom-gallery">
    <!--

	Width/height ratio of thumbnail and the main image must match to avoid glitches.

	If ratios are different, you may add CSS3 opacity transition to the main image to make the change less noticable.

     -->

    <?php foreach ($data as $imagen) : ?>
        <div class="image-container">
            <a class="imagen" href="<?= $imagen->getImagen() ?>" data-source="http://500px.com/photo/32736307" title="<?= $imagen->getTitulo() ?>">
                <!-- <img src="< imagen->getImagen() ?>" width="193" height="125"> -->
                <img src="<?= $imagen->getImagen() ?>">
                <!-- <div class="descripcion" style="background-image: url(<= $imagen->getImagen() ?>);" >
                        <p>hola que hace</p>
                    </div> -->
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