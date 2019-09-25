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
        require_once IICCA_GALERIAS . 'lib/post-types/imagen-cp.php';
        new IiccaImagenCP();
        require_once IICCA_GALERIAS . 'lib/post-types/galeria-cp.php';
        new IiccaGaleriasCP();
    }

    private function taxonomies()
    {
        // require_once IICCA_GALERIAS . 'lib/taxonomies/carpeta-tx.php';
        require_once IICCA_GALERIAS . 'lib/taxonomies/categoria-tax.php';
        new Tax_Categoria();

        // require_once IICCA_GALERIAS . 'lib/taxonomies/';
        // new Tax_Categoria();
    }

    private function metaboxes()
    {
        require_once IICCA_GALERIAS . 'lib/metaboxes/fecha-mb.php';
        new MB_fecha();
        require_once IICCA_GALERIAS . 'lib/metaboxes/galerias-mb.php';
        new MB_galerias();
    }

    private function shortCodes()
    {
        require_once IICCA_GALERIAS . 'lib/shortcodes/lista-galerias/lista-galerias.php';
        new IiccaListaGaleriasSc ();

        require_once IICCA_GALERIAS .'lib/shortcodes/galeria/galeria.php';
        new IiccaGaleriaSc ();
        
    }
}
