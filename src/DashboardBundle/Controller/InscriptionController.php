<?php

namespace DashboardBundle\Controller;

use DashboardBundle\Entity\Etudiant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class InscriptionController extends Controller
{
    /**
     * @Route("/inscri", name="inscri_ensi")
     */
    public function indexAction()
    {

        //get mois actuelle
        $month=date('m');
        //get anné actuelle
        $yearnow=date('Y');
        if($month=='09') {

            $anneuniversitaire = $yearnow  . '/' . ($yearnow+1);
        }
        else{

            $anneuniversitaire = ($yearnow-1) . '/' .$yearnow;
        }
        return $this->render('/dashboard/inscriptions/inscriptions.html.twig',array('anneeuniversitaire'=>$anneuniversitaire));
    }

    /**
     * @Route("/save_inscri", name="save_inscri")
     */
    public function saveAction()
    {

        try {

            $em = $this->getDoctrine()->getManager();
            $request = $this->getRequest();
            $inscri= $request->request->get('inscri');
            $password=$request->request->get('pasword');
            $date_now=date('Y/m/d');
            $salt=MD5($password.'qsdqsd32QSDQSDQSD12356484qsdqsdqsd'.'ENSIqsdqsd654654').MD5('ECOLE NATIONALE DES SCIENCES DE LINFORMATIQUE');
            $e = new Etudiant();
            $e->setNom($inscri['nom']);
            $e->setPrenom($inscri['prenom']);
            $e->setDateNaissance($inscri['dateNaissance']);
            $e->setSexe($inscri['sexe']);
            $e->setMail($inscri['email']);
            $e->setUsername($inscri['username']);
            $e->setVille($inscri['ville']);
            $e->setAdresse($inscri['adresse']);
            $e->setCin($inscri['cin']);
            $e->setNuminscri($inscri['numInscription']);
            $e->setPassword($salt);
            $e->setNiveau($inscri['niveau']);
            $e->setIdclasse($inscri['idclasse']);
            $e->setConcoursprepa($inscri['concours']);
            $e->setPrepa($inscri['prepa']);
            $e->setRangconcours($inscri['rangPrepa']);
            $e->setParmiconcours($inscri['parmiPrepa']);
            $e->setEstRedoublant($inscri['redoublant']);
            $e->setMoyii1($inscri['moyii1']);
            $e->setRangii1($inscri['rangii1']);
            $e->setOption($inscri['option']);
            $e->setMoyii2($inscri['moyii2']);
            $e->setTelMobile($inscri['telMobile']);
            $e->setNumtelfixe($inscri['numTelFixe']);
            $e->setIsDeleted(false);
            $e->setEstDesactive(false);
            $e->setEstvalide(null);
            $e->setDateCreate($date_now);
            $em->persist($e);
            $em->flush();
            $success = true;


        }
        catch(exception $e )
        {

            $success=false;

        }
        //get mois actuelle
        $month=date('m');
        //get anné actuelle
        $yearnow=date('Y');
        if($month=='09') {

            $anneuniversitaire = $yearnow  . '/' . ($yearnow+1);
        }
        else{

            $anneuniversitaire = ($yearnow-1) . '/' .$yearnow;
        }


        return $this->redirectToRoute('login_ensi', array('success'=>$success));
    //    return $this->render('/dashboard/login/login.html.twig',array('success'=>$success,'anneuniversitaire'=>$anneuniversitaire));
    }
    /**
     * @Route("/get_classes", name="get_json_classes_by_level")
     */
    public function getclassebylevelAction(Request $request)
    {
        $level = $request->request->get("data");
        $em=$this->getDoctrine()->getManager();
        $stmt = $em->getConnection()
            ->prepare("SELECT nom,id FROM classes WHERE niveau='$level' ");
        $stmt->execute();
        $res=$stmt->fetchAll();

        $response = new JsonResponse();
        $response->setData($res);

        return $response;

    }







}
