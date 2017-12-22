<?php

namespace Jobsearch\CraigslistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobsearch\CraigslistBundle\Entity\Search
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Search
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $user
     *
     * @ORM\Column(name="user", type="integer")
     */
    private $user;

    /**
     * @var string $keywords
     *
     * @ORM\Column(name="keywords", type="string", length=255)
     */
    private $keywords;

    /**
     * @var integer $lastentry
     *
     * @ORM\Column(name="lastentry", type="integer")
     */
    private $lastentry;

    /**
     * @ORM\OneToMany(targetEntity="Search_Area", mappedBy="search")
     */
    protected $search_areas;

    public function __construct()
    {
        $this->search_areas = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set user
     *
     * @param integer $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set lastentry
     *
     * @param integer $lastentry
     */
    public function setLastentry($lastentry)
    {
        $this->lastentry = $lastentry;
    }

    /**
     * Get lastentry
     *
     * @return integer 
     */
    public function getLastentry()
    {
        return $this->lastentry;
    }

    /**
     * Add search_areas
     *
     * @param Jobsearch\CraigslistBundle\Entity\Search_Area $searchAreas
     */
    public function addSearch_Area(\Jobsearch\CraigslistBundle\Entity\Search_Area $searchAreas)
    {
        $this->search_areas[] = $searchAreas;
    }

    /**
     * Get search_areas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSearchAreas()
    {
        return $this->search_areas;
    }
}