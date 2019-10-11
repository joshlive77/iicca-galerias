<div id="iicca-publicaciones-breadcumb" class="iicca-breadcumb eltdf-title-holder eltdf-standard-with-breadcrumbs-type eltdf-has-bg-image eltdf-bg-parallax eltdf-disable-responsive" style="background-color: rgb(219, 151, 60); background-image: url(<?= get_the_post_thumbnail_url() ?>); background-blend-mode: multiply; background-size: cover;">
    <div class="eltdf-title-image">
        <img itemprop="image" src="" alt="Image Alt">
    </div>
    <div class="eltdf-title-wrapper">
        <div class="eltdf-title-inner">
            <div class="eltdf-grid">
                <div class="eltdf-title-info">
                    <h2 class="eltdf-page-title entry-title" style="color: #ffffff"><?= get_the_title() ?></h2>
                </div>
                <div class="eltdf-breadcrumbs-info">
                    <div itemprop="breadcrumb" class="eltdf-breadcrumbs ">
                        <a href="<?= get_site_url() ?>">Inicio</a>
                        <span class="eltdf-delimiter">
                            &nbsp; / &nbsp;
                        </span>
                        <a href="<?= get_site_url() ?>/galerias/">Galerias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>