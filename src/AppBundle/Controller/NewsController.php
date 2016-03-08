<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\News;
use AppBundle\Form\NewsType;

/**
 * News controller.
 *
 * @Route("/news")
 */
class NewsController extends Controller
{
    /**
     * Lists all News entities.
     *
     * @Route("/", name="news_index",methods={"GET"})
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

//        $news = $em->getRepository('AppBundle:News')->findAll();

        $qb=$em->getRepository('AppBundle:News')->createQueryBuilder('n');

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($qb,$request->query->getInt('page',1));

<<<<<<< HEAD





=======
>>>>>>> ef3341ce1d889427c0b61466372d7436132ca23f
        return $this->render('news/index.html.twig', array(
            'pagination' => $pagination,
        ));
    }

    /**
     * Creates a new News entity.
     *
     * @Route("/new", name="news_new",methods={"GET","POST"})
     */
    public function newAction(Request $request)
    {
        $news = new News();
        $form = $this->createForm('AppBundle\Form\NewsType', $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();

            return $this->redirectToRoute('news_show', array('id' => $news->getId()));
        }

        return $this->render('news/new.html.twig', array(
            'news' => $news,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a News entity.
     *
     * @Route("/{id}", name="news_show",methods={"GET"})
     */
    public function showAction(News $news)
    {
//        $deleteForm = $this->createDeleteForm($news);
        return $this->render('news/show.html.twig', array(
            'news' => $news,
//            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing News entity.
     *
     * @Route("/{id}/edit", name="news_edit",methods={"GET", "POST"})
     */
    public function editAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('AppBundle:News')->find($id);

        if(!$entity)
        {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $editForm = $this->createForm('AppBundle\Form\NewsType',$entity);
        $editForm->handleRequest($request);

        if($editForm->isValid()){
            $em->flush();
            return $this->redirect($this->generateUrl('news_edit',['id'=>$id]));
        }

       return $this->render('news/edit.html.twig',[
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
       ]);

    }
<<<<<<< HEAD
//    public function generateUUWiseURL()
//    {
//        $Data=array();
//
//
//        $beforeUB=19;
//        $currentMoth=3;
//        $currentDay=2;
//
//        $randMuine=rand(3,9);
//        $randSec=rand(10,50);
//        $timec=mktime(00,04,01,2,12,2014);
//        $currentDateTime=date('Y-m-d h:i:s',$timec);
//        $sumPoints=floor(rand(1000,200000));
//        $errorPoints=floor($sumPoints*(0.01*rand(1,10)));
//        $nightPoints=floor($sumPoints*(0.01*rand(0,30)));
//        $OKPoints=floor($sumPoints-$errorPoints);
//        $afterUB=floor($OKPoints/1000)+$beforeUB;
//
//        $url="https://admin.uuwise.com/siteadmin/
//        SoftAuthorPointLogInfoList.aspx
//        ?__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=
//        %2FwEPDwUKMTY4MDQ0NTkyMA9kFgJmD2QWAgIBD2QWAmYPZBYEAgEPDxYCHgdWaXNpYmxlaGRkAgMPDx
//        YCHwBnZBYIAgEPFgIeBFRleHQFE%2Be8lui%2BkeaVsOaNrjEyMzI5ODNkAgMPDxYCHwBnZBYCAgEPFg
//        IfAQUHMTIzMjk4M2QCJQ8PZBYCHgdvbmZvY3VzBSdwb3BVcENhbGVuZGFyKHRoaXMsIHRoaXMsICJ5eX
//        l5LW1tLWRkIilkAisPDxYCHwEFDOaPkOS6pOS%2FruaUuWRkZImAfY6m2vaCx37iEr93K%2F7OHoUl&__
//        EVENTVALIDATION=%2FwEWCwL%2Fp8XcDALY1rmgBwKP%2FdLsCAKRnd3tBgKRjeSHBwLgnvHuBwLSyqifD
//        gLxwcfyCALPpJ%2F2AQLvkITXCgKggZPmC1%2FNmWjxnkgryoz8VWz5NnGM9%2Bqu
//        &ctl00%24ContentPlaceHolder1%24txtAuthorId=109
//        &ctl00%24ContentPlaceHolder1%24txtSoftId=623
//        &ctl00%24ContentPlaceHolder1%24txtUBBefore='.$beforeUB.'
//        &ctl00%24ContentPlaceHolder1%24txtUBBAfter='.$afterUB.'
//        &ctl00%24ContentPlaceHolder1%24txtPoints='.$OKPoints.'
//        &ctl00%24ContentPlaceHolder1%24txtPointsTotal='.$sumPoints.'
//        &ctl00%24ContentPlaceHolder1%24txtPointsError='.$errorPoints.'
//        &ctl00%24ContentPlaceHolder1%24txtPointsOut='.$nightPoints.'
//        &ctl00%24ContentPlaceHolder1%24txtLogDate='.$currentDateTime.'
//        &ctl00%24ContentPlaceHolder1%24btnUpdate=%E6%8F%90%E4%BA%A4%E4%BF%AE%E6%94%B9";
//
//        $beforeUB=$afterUB;
//        $currentDay=$currentDay+rand(1,2);
//        $Data[]=$url;
//    }
=======
>>>>>>> ef3341ce1d889427c0b61466372d7436132ca23f



//    public function editAction(Request $request, News $news)
//    {
////        $deleteForm = $this->createDeleteForm($news);
//        $editForm = $this->createForm('AppBundle\Form\NewsType', $news);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isSubmitted() && $editForm->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($news);
//            $em->flush();
//
//            return $this->redirectToRoute('news_edit', array('id' => $news->getId()));
//        }
//
//        return $this->render('news/edit.html.twig', array(
//            'news' => $news,
//            'edit_form' => $editForm->createView(),
////            'delete_form' => $deleteForm->createView(),
//        ));
//    }

//    /**
//     * Deletes a News entity.
//     *
//     * @Route("/{id}", name="news_delete",methods={"DELETE"})
//     */
//    public function deleteAction(Request $request, News $news)
//    {
//        $form = $this->createDeleteForm($news);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($news);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('news_index');
//    }
//
//    /**
//     * Creates a form to delete a News entity.
//     *
//     * @param News $news The News entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(News $news)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('news_delete', array('id' => $news->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }
}
