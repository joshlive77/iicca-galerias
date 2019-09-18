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
    }

    private function customPosts(){
        require_once IICCA_GALERIAS . 'lib/post-types/galerias-cp.php';
        new IiccaGaleriasCP();
    }

    private function shortCodes()
    {
        require_once IICCA_GALERIAS . 'lib/shortcodes/lista-galerias/lista-galerias.php';
        new IiccaListaGalerias();
    }
}
