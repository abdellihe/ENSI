<?php

namespace SiteBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //get all news

        $em=$this->getDoctrine()->getManager();
        $req="SELECT * FROM news ORDER BY date_create DESC";
        $stmt = $em->getConnection()
            ->prepare($req);
        $stmt->execute();
        $res=$stmt->fetchAll();
        //all sldies 
        $em=$this->getDoctrine()->getManager();
        $sql="SELECT * FROM slide ORDER BY date_create DESC";
        $stmt1 = $em->getConnection()
            ->prepare($sql);
        $stmt1->execute();
        $slide=$stmt1->fetchAll();
 
        // replace this example code with whatever you need
        return $this->render('siteWeb/ensi-uma/siteweb.html.twig',array('new'=>$res,'slide'=>$slide));
    }

    /**
     * @Route("/presentation", name="presentation_ensi")
     */
    public function presentationAction(Request $request)
    {
        //get all news

        $em=$this->getDoctrine()->getManager();
        $req="SELECT * FROM news ORDER BY date_create DESC";
        $stmt = $em->getConnection()
            ->prepare($req);
        $stmt->execute();
        $res=$stmt->fetchAll();

        // replace this example code with whatever you need
        return $this->render('siteWeb/presentation/presentation.html.twig',array('new'=>$res));
    }

    /**
     * @Route("/organigramme", name="organigramme_ensi")
     */
    public function organigrammeAction(Request $request)
    {
        //get all news

        $em=$this->getDoctrine()->getManager();
        $req="SELECT * FROM news ORDER BY date_create DESC";
        $stmt = $em->getConnection()
            ->prepare($req);
        $stmt->execute();
        $res=$stmt->fetchAll();
        // replace this example code with whatever you need
        return $this->render('siteWeb/organigramme/organigramme.html.twig',array('new'=>$res));
    }

    /**
     * @Route("/espaces", name="espaces_ensi")
     */
    public function espaceAction(Request $request)
    {
        //get all news

        $em=$this->getDoctrine()->getManager();
        $req="SELECT * FROM news ORDER BY date_create DESC";
        $stmt = $em->getConnection()
            ->prepare($req);
        $stmt->execute();
        $res=$stmt->fetchAll();
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

        // replace this example code with whatever you need
        return $this->render('siteWeb/espaceprive/espaceprive.html.twig',array('anneuniversitaire'=>$anneuniversitaire,'new'=>$res));
    }














}
