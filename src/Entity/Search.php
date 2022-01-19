<?php
namespace App\Entity;

use App\Entity\Categorie;
use Doctrine\ORM\Mapping as ORM;

class Search{

    /**
     * 
     * @ORM\ManyToOne(targetEntity=Categorie::class)
     */
    private $categorie;

    /**
     * 
     *
     */
    private $libelle;

    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of libelle
     */ 
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @return  self
     */ 
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }
}

?>