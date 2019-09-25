<div class="iicca-galerias eltdf-tabs eltdf-tabs-standard ui-tabs">

    <ul class="eltdf-tabs-nav ui-tabs-nav ">
        <?php $cont = 0; ?>
        <?php foreach ($data as $nombre => $categorias) : ?>
            <li class="ui-state-default ui-tabs-active <?= $cont == 0 ? 'ui-state-active' : '' ?>">
                <a href="#tab-bvxcb-114" class="ui-tabs-anchor" id="cat-<?= $cont++; ?>"> <?= $nombre ?> </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?php $cont = 0; ?>
    <?php foreach ($data as $categoria) : ?>    
        <div class="contenedor-galerias eltdf-tab-container ui-tabs-panel ui-widget-content ui-corner-bottom <?= $cont == 0 ? 'eltdf-visible' : '' ?>" id="cat-<?= $cont++; ?>">
            <div class="iicca-lista-galerias">
                <?php foreach ($categoria as $galeria) : ?>

                    <div class="galeria" style="display: block;">
                        <div class="contenedor">
                            <div class="imagen">
                                <img src="<?= $galeria->getImagen() ?>">
                            </div>
                            <div class="contenido">
                                <div class="titulo">
                                    <a href="<?= $galeria->getSingle() ?>">
                                        <h3><?= $galeria->getTitulo() ?></h3>
                                    </a>
                                </div>
                                <div class="etiquetas">
                                    <?php $categorias = $galeria->getategorias() ?>
                                    <?php foreach ($categorias as $tag) : ?>
                                    <a>
                                        <span><?= $tag ?></span>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                                <div class="descripcion">
                                    <p><?= $galeria->getDescripcion() ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>

    <?php endforeach; ?>

</div>