<?php

// =============================================================================
// MODELO DE IMAGEN
// =============================================================================

require_once IICCA_GALERIAS . '/include/helpers/tools.php';

class ImagenModel
{
    private $id;
    private $titulo;
    private $imagen;
    private $descripcion;
    private $galerias;
    private $fecha;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        if (!empty($imagen)) {
            $this->imagen = $imagen;
        } else {
            $this->imagen = IICCA_GALERIAS_URL . 'lib/shortcodes/lista-galerias/assets/img/image-default.png';
        }
        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        
        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        if (!empty($fecha)) {
            $this->fecha = IiccaGaleriaTools::traducirFecha($fecha);
        } else {
            $this->fecha = '';
        }

        return $this;
    }

    /**
     * Get the value of galerias
     */ 
    public function getGalerias()
    {
        return $this->galerias;
    }

    /**
     * Set the value of galerias
     *
     * @return  self
     */ 
    public function setGalerias($galerias)
    {
        $this->galerias = $galerias;

        return $this;
    }
}
