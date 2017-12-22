<?php

namespace Jobsearch\PostingsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobsearch\PostingsBundle\Entity\Posting
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Posting
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
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string $link
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string $language
     *
     * @ORM\Column(name="language", type="string", length=12)
     */
    private $language;

    /**
     * @var string $rights
     *
     * @ORM\Column(name="rights", type="string", length=255)
     */
    private $rights;

    /**
     * @var string $feed
     *
     * @ORM\Column(name="feed", type="string", length=255)
     */
    private $feed;

    /**
     * @var integer $area
     *
     * @ORM\ManyToOne(targetEntity="\Jobsearch\CraigslistBundle\Entity\Area")
     * @ORM\JoinColumn(name="area", referencedColumnName="id")
     */
    private $area;

    /**
     * @var integer $jobtype
     *
     * @ORM\ManyToOne(targetEntity="\Jobsearch\CraigslistBundle\Entity\JobType")
     * @ORM\JoinColumn(name="jobtype", referencedColumnName="id")
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set link
     *
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set language
     *
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set rights
     *
     * @param string $rights
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
    }

    /**
     * Get rights
     *
     * @return string 
     */
    public function getRights()
    {
        return $this->rights;
    }

    /**
     * Set feed
     *
     * @param string $feed
     */
    public function setFeed($feed)
    {
        $this->feed = $feed;
    }

    /**
     * Get feed
     *
     * @return string 
     */
    public function getFeed()
    {
        return $this->feed;
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
     * Get jobtype
     *
     * @return integer 
     */
    public function getJobtype()
    {
        return $this->jobtype;
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
     * Set jobtype
     *
     * @param integer $jobtype
     */
    public function setJobtype($jobtype)
    {
        $this->jobtype = $jobtype;
    }
}