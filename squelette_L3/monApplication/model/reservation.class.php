<?php

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="jabaianb.reservation")
 **/
class Reservation
{
    /** 
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     **/
    public $id;

    /** 
     * @ManyToOne(targetEntity="Voyage")
     * @JoinColumn(name="voyage", referencedColumnName="id")
     **/
    public $voyage;

    /** 
     * @ManyToOne(targetEntity="Utilisateur")
     * @JoinColumn(name="voyageur", referencedColumnName="id")
     **/
    public $voyageur;

}


?>
