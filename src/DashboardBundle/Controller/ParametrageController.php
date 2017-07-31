<?php

namespace DashboardBundle\Controller;

use DashboardBundle\Entity\Classes;
use DashboardBundle\Entity\Etudiant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ParametrageController extends Controller
{
    /**
     * @Route("/classes/{success}", name="classes_ensi")
     */
    public function indexAction($success=null)
    {
        $em=$this->getDoctrine()->getManager();
        $stmt = $em->getConnection()
            ->prepare("SELECT * FROM classes ");
        $stmt->execute();
        $classes = $stmt->fetchAll();
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


        return $this->render('/dashboard/parametrages/classes.html.twig',array('anneeuniversitaire'=>$anneuniversitaire,'classes'=>$classes,'success'=>$success));
    }


    /**
     * @Route("/add_classes", name="add_class")
     */
    public function addclassesAction()
    {
        try{
            $em=$this->getDoctrine()->getManager();
            $request = $this->getRequest();
            $niveau= $request->request->get('niveau');
            $nom= $request->request->get('nom');
            $class=new Classes();
            $class->setNiveau($niveau);
            $class->setNom($nom);
            $em->persist($class);
            $em->flush();
            $success=true;

        }
        catch(exception $e)
        {

        $succes=false;
        }

        return $this->redirectToRoute('classes_ensi', array('success'=>$success));


    }

    /**
     * @Route("/delete_all_classe", name="delete_all_classe")
     */
    public function deleteallclassesAction()
    {
        $em=$this->getDoctrine()->getManager();
        $stmt = $em->getConnection()
            ->prepare('DELETE  FROM classes');
        $stmt->execute();

        return $this->redirectToRoute('classes_ensi');


    }

    /**
     * @Route("/delete_one/{id}", name="delete_one_class")
     */
    public function deleteoneclassesAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $stmt = $em->getConnection()
            ->prepare("DELETE  FROM classes WHERE id=$id ");
        $stmt->execute();

        return $this->redirectToRoute('classes_ensi');


    }
    /**
     * @Route("/allenseignant", name="all_enseignants")
     */
    public function allenseignantAction()
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
        return $this->render('/dashboard/parametrages/enseignant.html.twig',array('anneeuniversitaire'=>$anneuniversitaire));

    }
    
     /**
     * @Route("/users", name="users_ensi")
     */
    public function paramusersAction()
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
        
        
        
         return $this->render('/dashboard/parametrages/users.html.twig',array('anneeuniversitaire'=>$anneuniversitaire));
        
          
    }






}
