<div class="eltdf-content">
    <div class="eltdf-content-inner">
        <div class="eltdf-container eltdf-default-page-template">

            <div class="eltdf-container-inner clearfix">
                <div class="eltdf-grid-row">
                    <div class="eltdf-page-content-holder eltdf-grid-col-12">
                        <div class="vc_row wpb_row vc_row-fluid">

                            <div class="imagenes zoom-gallery">

                                <?php foreach ($data as $imagen) : ?>
                                    <div class="image-container">
                                        <a class="imagen" href="<?= $imagen->getImagen() ?>" data-source="<?= $imagen->getImagen() ?>" title="<?= $imagen->getTitulo() ?>">
                                            <img src="<?= $imagen->getImagen() ?>">
                                        </a>
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