<?php

namespace Jobsearch\FeedsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobsearch\FeedsBundle\Entity\UserFeed
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class UserFeed
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
     * @var integer $posting
     *
     * @ORM\ManyToOne(targetEntity="\Jobsearch\PostingsBundle\Entity\Posting")
     * @ORM\JoinColumn(name="posting", referencedColumnName="id")
     */
    private $posting;

    /**
     * @var integer $search
     *
     * @ORM\ManyToOne(targetEntity="\Jobsearch\CraigslistBundle\Entity\Search")
     * @ORM\JoinColumn(name="Search", referencedColumnName="id")
     */
    private $search;

    /**
     * @var datetime $added
     *
     * @ORM\Column(name="added", type="datetime")
     */
    private $added;


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
     * Set posting
     *
     * @param integer $posting
     */
    public function setPosting($posting)
    {
        $this->posting = $posting;
    }

    /**
     * Get posting
     *
     * @return integer 
     */
    public function getPosting()
    {
        return $this->posting;
    }

    /**
     * Get last posting added to feed
     *
     * @return integer 
     */

    /**
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
     * Set added
     *
     * @param datetime $added
     */
    public function setAdded($added)
    {
        $this->added = $added;
    }

    /**
     * Get added
     *
     * @return datetime 
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Set search
     *
     * @param Jobsearch\CraigslistBundle\Entity\Search $search
     */
    public function setSearch(\Jobsearch\CraigslistBundle\Entity\Search $search)
    {
        $this->search = $search;
    }

    /**
     * Get search
     *
     * @return Jobsearch\CraigslistBundle\Entity\Search 
     */
    public function getSearch()
    {
        return $this->search;
    }
}