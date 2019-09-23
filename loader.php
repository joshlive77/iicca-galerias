<?php

// =============================================================================
// LOADER 
// Carga todo el contenido del plugin
// =============================================================================

/**
 * Objeto que carga todas las partes del plugin
 */
class IiccaGalerias
{
    /**
     * Contructor instancia todos los metodos 
     * que cargan las partes del plugin
     */
    function __construct()
    {
        self::shortCodes();
        self::customPosts();
        self::taxonomies();
        self::metaboxes();
    }

    private function customPosts()
    {
        // require_once IICCA_GALERIAS . 'lib/post-types/galerias-cp.php';
        require_once IICCA_GALERIAS . 'lib/post-types/imagennes-cp.php';
        new IiccaImagenesCP();
    }

    private function taxonomies()
    {
        // require_once IICCA_GALERIAS . 'lib/taxonomies/carpeta-tx.php';
        require_once IICCA_GALERIAS . 'lib/taxonomies/galeria-tax.php';
        new Tax_Galeria();

        require_once IICCA_GALERIAS . 'lib/taxonomies/categoria-tax.php';
        new Tax_Categoria();
    }

    private function metaboxes()
    {
        require_once IICCA_GALERIAS . 'lib/metaboxes/fecha-mb.php';
        new MB_fecha();
    }

    private function shortCodes()
    {
        require_once IICCA_GALERIAS . 'lib/shortcodes/lista-galerias/lista-galerias.php';
        new IiccaListaGaleriasSc ();

        require_once IICCA_GALERIAS .'lib/shortcodes/galeria/galeria.php';
        new IiccaGaleriaSc ();
        
    }
}
