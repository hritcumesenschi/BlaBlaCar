<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="jabaianb.voyage")
 **/
class Voyage
{
    /** 
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     **/
    public $id;

    /** 
     * @ManyToOne(targetEntity="Utilisateur")
     * @JoinColumn(name="conducteur", referencedColumnName="id")
     **/
    public $conducteur;

    /** 
     * @ManyToOne(targetEntity="Trajet")
     * @JoinColumn(name="trajet", referencedColumnName="id")
     **/
    public $trajet;

    /** 
     * @Column(type="integer", nullable=true)
     **/
    public $tarif;

    /** 
     * @Column(type="integer", nullable=true)
     **/
    public $nbPlace;

    /** 
     * @Column(type="integer", nullable=true)
     **/
    public $heureDepart;

    /** 
     * @Column(type="string", length=500, nullable=true)
     **/
    public $contraintes;

}

?>