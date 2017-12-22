<?php

namespace Jobsearch\CraigslistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobsearch\CraigslistBundle\Entity\Search_Area
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Search_Area
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Search", inversedBy="search_areas")
     * @ORM\JoinColumn(name="search_id", referencedColumnName="id")
     */
    protected $search;

    /**
     * @var integer $area
     *
     * @ORM\Column(name="area", type="integer")
     */
    private $area;

    /**
     * @var integer $jobtype
     *
     * @ORM\Column(name="jobtype", type="integer")
     */
    private $jobtype;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set search
     *
     * @param integer $search
     */
    public function setSearch($search)
    {
        $this->search = $search;
    }

    /**
     * Get search
     *
     * @return integer 
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Set area
     *
     * @param integer $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * Get area
     *
     * @return integer 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set jobtype
     *
     * @param integer $jobtype
     */
    public function setJobtype($jobtype)
    {
        $this->jobtype = $jobtype;
    }

    /**
     * Get jobtype
     *
     * @return integer 
     */
    public function getJobtype()
    {
        return $this->jobtype;
    }
}