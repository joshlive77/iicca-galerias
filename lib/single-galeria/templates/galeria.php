    <div class="iicca-galeria">

        <div class="imagenes">

        <?php foreach($data as $imagen):?>

            <div class="imagen">
                <img src="<?=$imagen->getImagen()?>">
                <a class="modal" href="#popup-2">
                    <p></p>
                </a>
                <div class="popup" id="popup-2">
                    <div class="popup-inner">
                        <div class="popup__photo">
                            <img src="<?=$imagen->getImagen()?>" alt="">
                        </div>
                        <a class="popup__close" href="#">X</a>
                    </div>
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
    </div>