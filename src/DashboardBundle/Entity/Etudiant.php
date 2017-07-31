<?php

namespace DashboardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="DashboardBundle\Repository\EtudiantRepository")
 */
class Etudiant
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
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var DateTime $datenaissance
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var int
     *
     * @ORM\Column(name="sexe", type="integer", nullable=true)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_mail", type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="num_cin", type="string", length=255, nullable=true)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="num_inscri", type="string", length=255, nullable=true)
     */
    private $numinscri;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @var classes
     *
     * @ORM\ManyToOne(targetEntity="\DashboardBundle\Entity\Classes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_classe", referencedColumnName="id")
     * })
     */
    private $idclasse;

    /**
     * @var string
     *
     * @ORM\Column(name="concours_prepa", type="string", length=255, nullable=true)
     */
    private $concoursprepa;


    /**
     * @var string
     *
     * @ORM\Column(name="prepa", type="string", length=255, nullable=true)
     */
    private $prepa;

    /**
     * @var string
     *
     * @ORM\Column(name="rang_concours", type="string", nullable=true)
     */
    private $rangconcours;

    /**
     * @var string
     *
     * @ORM\Column(name="parmi_concours", type="string", nullable=true)
     */
    private $parmiconcours;

    /**
     * @var string
     *
     * @ORM\Column(name="moyenne_ii1", type="string", nullable=true)
     */
    private $moyii1;

    /**
     * @var string
     *
     * @ORM\Column(name="moyenne_ii2", type="string", nullable=true)
     */
    private $moyii2;


    /**
     * @var string
     *
     * @ORM\Column(name="rang_ii1", type="string", nullable=true)
     */
    private $rangii1;

    /**
     * @var string
     *
     * @ORM\Column(name="parmi_ii1", type="string", nullable=true)
     */
    private $parmiii1;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel_mobile", type="string", nullable=true)
     */
    private $telMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel_fixe", type="string", nullable=true)
     */
    private $numtelfixe;

    /**
     * @var string
     *
     * @ORM\Column(name="option", type="string", nullable=true)
     */
    private $option;

    /**
     * @var int
     *
     * @ORM\Column(name="est_redoublant", type="integer", nullable=true)
     */
    private $estRedoublant;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_deleted", type="boolean", nullable=true)
     */
    private $isDeleted;
    /**
     * @var boolean
     *
     * @ORM\Column(name="est_desactive", type="boolean", nullable=true)
     */
    private $estDesactive;

    /**
     * @var boolean
     *
     * @ORM\Column(name="est_valide", type="boolean", nullable=true)
     */
    private $estvalide;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_create", type="date", nullable=true)
     */
    private $dateCreate;

    /**
     * @return boolean
     */
    public function isEstvalide()
    {
        return $this->estvalide;
    }

    /**
     * @param boolean $estvalide
     */
    public function setEstvalide($estvalide)
    {
        $this->estvalide = $estvalide;
    }




    /**
     * @return string
     */
    public function getTelMobile()
    {
        return $this->telMobile;
    }

    /**
     * @param string $telMobile
     */
    public function setTelMobile($telMobile)
    {
        $this->telMobile = $telMobile;
    }

    /**
     * @return string
     */
    public function getNumtelfixe()
    {
        return $this->numtelfixe;
    }

    /**
     * @param string $numtelfixe
     */
    public function setNumtelfixe($numtelfixe)
    {
        $this->numtelfixe = $numtelfixe;
    }

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * @param DateTime $dateNaissance
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = date_create($dateNaissance);
    }

    /**
     * @return int
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param int $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param string $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return string
     */
    public function getNuminscri()
    {
        return $this->numinscri;
    }

    /**
     * @param string $numinscri
     */
    public function setNuminscri($numinscri)
    {
        $this->numinscri = $numinscri;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
     * @return string
     */
    public function getConcoursprepa()
    {
        return $this->concoursprepa;
    }

    /**
     * @param string $concoursprepa
     */
    public function setConcoursprepa($concoursprepa)
    {
        $this->concoursprepa = $concoursprepa;
    }

    /**
     * @return string
     */
    public function getPrepa()
    {
        return $this->prepa;
    }

    /**
     * @param string $prepa
     */
    public function setPrepa($prepa)
    {
        $this->prepa = $prepa;
    }

    /**
     * @return string
     */
    public function getRangconcours()
    {
        return $this->rangconcours;
    }

    /**
     * @param string $rangconcours
     */
    public function setRangconcours($rangconcours)
    {
        $this->rangconcours = $rangconcours;
    }

    /**
     * @return string
     */
    public function getParmiconcours()
    {
        return $this->parmiconcours;
    }

    /**
     * @param string $parmiconcours
     */
    public function setParmiconcours($parmiconcours)
    {
        $this->parmiconcours = $parmiconcours;
    }

    /**
     * @return string
     */
    public function getMoyii1()
    {
        return $this->moyii1;
    }

    /**
     * @param string $moyii1
     */
    public function setMoyii1($moyii1)
    {
        $this->moyii1 = $moyii1;
    }

    /**
     * @return string
     */
    public function getMoyii2()
    {
        return $this->moyii2;
    }

    /**
     * @param string $moyii2
     */
    public function setMoyii2($moyii2)
    {
        $this->moyii2 = $moyii2;
    }

    /**
     * @return string
     */
    public function getRangii1()
    {
        return $this->rangii1;
    }

    /**
     * @param string $rangii1
     */
    public function setRangii1($rangii1)
    {
        $this->rangii1 = $rangii1;
    }

    /**
     * @return string
     */
    public function getParmiii1()
    {
        return $this->parmiii1;
    }

    /**
     * @param string $parmiii1
     */
    public function setParmiii1($parmiii1)
    {
        $this->parmiii1 = $parmiii1;
    }

    /**
     * @return string
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param string $option
     */
    public function setOption($option)
    {
        $this->option = $option;
    }

    /**
     * @return boolean
     */
    public function isEstRedoublant()
    {
        return $this->estRedoublant;
    }

    /**
     * @param boolean $estRedoublant
     */
    public function setEstRedoublant($estRedoublant)
    {
        $this->estRedoublant = $estRedoublant;
    }

    /**
     * @return boolean
     */
    public function isIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * @param boolean $isDeleted
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * @return boolean
     */
    public function isEstDesactive()
    {
        return $this->estDesactive;
    }

    /**
     * @param boolean $estDesactive
     */
    public function setEstDesactive($estDesactive)
    {
        $this->estDesactive = $estDesactive;
    }

    /**
     * @return classes
     */
    public function getIdclasse( )
    {
        return $this->idclasse;
    }

    /**
     * @param classes $idclasse
     */
    public function setIdclasse($idclasse)
    {
        $this->idclasse = $idclasse;
    }

    /**
     * @return DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * @param DateTime $dateCreate
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }



}
