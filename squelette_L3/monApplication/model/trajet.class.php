<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="jabaianb.trajet")
 **/
class Trajet
{
    /** 
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     **/
    public $id;

    /** 
     * @Column(type="string", length=25, nullable=true)
     **/
    public $depart;

    /** 
     * @Column(type="string", length=25, nullable=true)
     **/
    public $arrivee;

    /** 
     * @Column(type="integer", nullable=true)
     **/
    public $distance;
}
?>