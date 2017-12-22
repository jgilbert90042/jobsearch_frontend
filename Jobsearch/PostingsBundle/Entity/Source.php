<?php

namespace Jobsearch\PostingsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobsearch\PostingsBundle\Entity\Source
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Source
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
     * @var string $url
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var integer $posting
     *
     * @ORM\Column(name="posting", type="integer")
     */
    private $posting;

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
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
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
}