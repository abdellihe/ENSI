<?php

namespace DashboardBundle\Controller;

use DashboardBundle\Entity\Slide;
use DashboardBundle\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContenuWebController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard_ensi")
     */
    public function indexAction()
    {
        return $this->render('DashboardBundle:Default:index.html.twig');
    }

    /**
     * @Route("/bienvenue/{success}", name="login_ensi")
     */
    public function pageloginAction($success=5)
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
        //adresse ip de la machine client
     $myip= $_SERVER["REMOTE_ADDR"];
        return $this->render('/dashboard/login/login.html.twig',array('success'=>$success,'anneuniversitaire'=>$anneuniversitaire,'mois'=>$month,'myip'=>$myip));
    }

    /**
     * @Route("/verifmail", name="verif_mail")
     */
    public function verifmailAction()
    {

        dump('hello');die;

    }

    /**
     * @Route("/home", name="home_ensi")
     */
    public function homeAction()
    {

        return $this->render('/dashboard/home/home.html.twig');

    }


    /**
     * @Route("/slider", name="slider_ensi")
     */
    public function sliderAction()
    {
        $em=$this->getDoctrine()->getManager();
        $req="SELECT * FROM slide";
        $stmt = $em->getConnection()
            ->prepare($req);
        $stmt->execute();
        $slide=$stmt->fetchAll();
        return $this->render('/dashboard/slider/slider.html.twig',array('slide'=>$slide));

    }

    /**
     * @Route("/addslider", name="add_slide")
     */
    public function addsliderAction()
    {

         $em=$this->getDoctrine()->getManager();
         $now=date('Y/m/d');
         $request = $this->getRequest();
         $titre= $request->request->get('titre');
         $file = $request->files->get('img');
         $name_file=$file->getClientOriginalName();
         $appPath = $this->container->getParameter('kernel.root_dir');
         $path=realpath($appPath . '/../web/assets/siteWeb/img/slider');
         $path_img =$path.'\\'.$name_file;
         $slider=new Slide();
         $slider->setTitre($titre);
         $slider->setDateCreate($now);
         $slider->setPath($name_file);
         $em->persist($slider);
         $em->flush();
        //copy file in slider
        if(!is_null($file)){
          $file->move($path, $name_file); // move the file to a path
        }

   return $this->redirectToRoute('slider_ensi');
    }
    
    /**
     * @Route("/deleteslider/{id}", name="delete_slide")
     */
    public function deletesliderAction($id)
    {
        
         $em=$this->getDoctrine()->getManager();
        //delete file from directory
        //build path
        //get name file
        $req="SELECT path_img FROM slide WHERE id=$id ";
        $stmt1=$em->getConnection()->prepare($req);
        $stmt1->execute();
        $res=$stmt1->fetch();
        $appPath = $this->container->getParameter('kernel.root_dir');
        $path=realpath($appPath . '/../web/assets/siteWeb/img/slider');
        $path_file =$path.'\\'.$res['path_img'];
        unlink($path_file);

        $stmt = $em->getConnection()
            ->prepare("DELETE  FROM slide WHERE id=$id ");
        $stmt->execute();

        return $this->redirectToRoute('slider_ensi');
        
    }
    

    /**
     * @Route("/actus", name="actualites_ensi")
     */
    public function actusAction()
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

        //get all news

        $em=$this->getDoctrine()->getManager();
        $req="SELECT * FROM news";
        $stmt = $em->getConnection()
            ->prepare($req);
        $stmt->execute();
        $res=$stmt->fetchAll();


        return $this->render('/dashboard/actualites/actualites.html.twig',array('anneeuniversitaire'=>$anneuniversitaire,'new'=>$res));

    }


    /**
     * @Route("/addnews", name="add_new")
     */
    public function addnewAction()
    {
        $em=$this->getDoctrine()->getManager();
        $now=date('Y/m/d');
        $request = $this->getRequest();
        $file = $request->files->get('piece');
        $niveau= $request->request->get('niveau');
        $estnew= $request->request->get('new');
        $title= $request->request->get('title');
        $name_file=$file->getClientOriginalName();
        $appPath = $this->container->getParameter('kernel.root_dir');
        $path=realpath($appPath . '/../web/assets/uploads/news');
        $path_file =$path.'\\'.$name_file;
        $new=new News();
        $new->setNiveau($niveau);
        $new->setFile($name_file);
        $new->setTitle($title);
        $new->setEstNew($estnew);
        $new->setDateCreate($now);
        $em->persist($new);
        $em->flush();
        //copy file in slider
        if(!is_null($file)){
            $file->move($path, $name_file); // move the file to a path
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
        return $this->redirectToRoute('actualites_ensi');

    }



    /**
     * @Route("/deletenew/{id}", name="delete_new")
     */
    public function deletenewAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        //delete file from directory
        //build path
        //get name file
        $req="SELECT path_file FROM news WHERE id=$id ";
        $stmt1=$em->getConnection()->prepare($req);
        $stmt1->execute();
        $res=$stmt1->fetch();
        $appPath = $this->container->getParameter('kernel.root_dir');
        $path=realpath($appPath . '/../web/assets/uploads/news');
        $path_file =$path.'\\'.$res['path_file'];
        unlink($path_file);

        $stmt = $em->getConnection()
            ->prepare("DELETE  FROM news WHERE id=$id ");
        $stmt->execute();

        return $this->redirectToRoute('actualites_ensi');
    }

    /**
     * @Route("/deleteallnew", name="delete_all_news")
     */
    public function deleteallnewAction()
    {

        $em = $this->getDoctrine()->getManager();
        //delete all uploaded file from directory
        //build path
        //get name file
        $req = "SELECT path_file FROM news  ";
        $stmt1 = $em->getConnection()->prepare($req);
        $stmt1->execute();
        $res = $stmt1->fetchAll();
        $appPath = $this->container->getParameter('kernel.root_dir');
        $path = realpath($appPath . '/../web/assets/uploads/news');
        foreach ($res as $val) {
        $path_file = $path . '\\' . $val['path_file'];
        unlink($path_file);
    }

        $stmt = $em->getConnection()
            ->prepare("DELETE  FROM news ");
        $stmt->execute();

        return $this->redirectToRoute('actualites_ensi');


    }







    }
