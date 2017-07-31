<?php

namespace DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="DashboardBundle\Repository\NewsRepository")
 */
class News
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", nullable=true)
     */
    private $niveau;
    /**
     * @var int
     *
     * @ORM\Column(name="est_new", type="integer", nullable=true)
     */
    private $estNew;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_create", type="date", nullable=true)
     */
    private $date_create;
    /**
     * @var string
     *
     * @ORM\Column(name="path_file", type="string", nullable=true)
     */
    private $file;

    /**
     * @var int
     *
     * @ORM\Column(name="publication_pour", type="integer", nullable=true)
     */
    private $publicationpour;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param string $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }



    /**
     * @return int
     */
    public function getEstNew()
    {
        return $this->estNew;
    }

    /**
     * @param int $estNew
     */
    public function setEstNew($estNew)
    {
        $this->estNew = $estNew;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return DateTime
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * @param DateTime $date_create
     */
    public function setDateCreate($date_create)
    {
        $this->date_create =date_create($date_create);
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return int
     */
    public function getPublicationpour()
    {
        return $this->publicationpour;
    }

    /**
     * @param int $publicationpour
     */
    public function setPublicationpour($publicationpour)
    {
        $this->publicationpour = $publicationpour;
    }




}
