<div class="iicca-galerias eltdf-tabs eltdf-tabs-standard ui-tabs">

    <ul class="eltdf-tabs-nav ui-tabs-nav  ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
        <li class="ui-state-default ui-tabs-active ui-state-active ui-corner-top" role="tab" tabindex="0" aria-controls="tab-bvxcb-114" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true">
            <a href="#tab-bvxcb-114" class="ui-tabs-anchor" id="ui-id-1" role="presentation" tabindex="-1"> Eventos </a>
        </li>
        <li class="ui-state-default  ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-bvxcb-188" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
            <a href="#tab-bvxcb-188" class="ui-tabs-anchor" id="ui-id-2" role="presentation" tabindex="-1"> Entrega de Certificados </a>
        </li>
        <li class="ui-state-default  ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-bvxcb-69" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
            <a href="#tab-bvxcb-69" class="ui-tabs-anchor" id="ui-id-2" role="presentation" tabindex="-1"> Presentación de Libros </a>
        </li>
        <li class="ui-state-default  ui-corner-top" role="tab" tabindex="-1" aria-controls="tab-bvxcb-77" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
            <a href="#tab-bvxcb-77" class="ui-tabs-anchor" id="ui-id-2" role="presentation" tabindex="-1"> Convenios </a>
        </li>
    </ul>

    <?php $cont = 0; ?>
    <?php foreach ($data as $categoria) : ?>

        <div class="contenedor-galerias eltdf-tab-container ui-tabs-panel ui-widget-content ui-corner-bottom <?= $cont == 0 ? 'eltdf-visible' : '' ?>" <?= $cont == 0 ? '' : 'style="display:none"' ?> id="cat-<?= $cont++; ?>">
            <div class="iicca-lista-galerias">
                <?php foreach ($categoria as $galeria) : ?>
                    <div class="galeria" style="display: block;">
                        <div class="contenedor">
                            <div class="imagen">
                                <img src=" <?= $galeria->getImagen(); ?> ">
                            </div>
                            <div class="contenido">
                                <div class="titulo">
                                    <a href="https://iicca.edu.bo/galeria-prueba/">
                                        <h3> <?= $galeria->getTitulo(); ?> </h3>
                                    </a>
                                </div>
                                <div class="etiquetas">
                                    <a href="https://iicca.edu.bo/galerias-lista-prueba/">
                                        <span>tag1</span>
                                    </a>
                                    <a href="https://iicca.edu.bo/galerias-lista-prueba/">
                                        <span>tag1</span>
                                    </a>
                                    <a href="https://iicca.edu.bo/galerias-lista-prueba/">
                                        <span>tag1</span>
                                    </a>
                                </div>
                                <div class="descripcion">
                                    <p> <?= $galeria->getDescripcion(); ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    <?php endforeach; ?>

</div>