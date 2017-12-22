<?php

namespace Jobsearch\FeedsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Jobsearch\FeedsBundle\Entity\UserFeed;

class FeedController extends Controller
{
    /**
     * @Route("/feed/list")
     * @Template()
     */
    public function listAction()
    {
      $usr = $this->get('security.context')->getToken()->getUser();
      $em = $this->getDoctrine()->getEntityManager();

      $search_list_query = $em->createQuery(
        'SELECT s from JobsearchCraigslistBundle:Search s ' .
        'WHERE s.user=:userId')
        ->setParameter('userId', $usr->getId());

      $sl_results = $search_list_query->getResult();
      $searches = array();
      foreach ($sl_results as $slr) {
        array_push($searches,$slr);
      }

      return $this->render('JobsearchFeedsBundle:Default:listfeeds.html.twig',
      array('searches' => $searches));
    }

    /**
     * @Route("/feed/list.json")
     * @Template()
     */
    public function listJSONAction()
    {
      $usr = $this->get('security.context')->getToken()->getUser();
      $em = $this->getDoctrine()->getEntityManager();

      $search_list_query = $em->createQuery(
        'SELECT s from JobsearchCraigslistBundle:Search s ' .
        'WHERE s.user=:userId')
        ->setParameter('userId', $usr->getId());

      $sl_results = $search_list_query->getResult();
      $searches = array();
      foreach ($sl_results as $slr) {
        $search = array();
        $search["name"] = $slr->getName();
        $search["id"] = $slr->getId();
        array_push($searches,$search);
      }
        return new Response(json_encode($searches));
    }

    /**
     * @Route("/feed/create")
     * @Template()
     */
    public function createAction()
    {
      return new Response('Nothing here yet. Login with the username \'phpuser\' and the password \'phpuser\' to see the demo feed or contact joe@gilbertcon.com to create your own.');
    }

    /**
     * @Route("/feed/update/{search}", requirements={"search" = "\d+"})
     * @Template()
     */
    public function updateAction($search)
    {

 //     $log = fopen("/tmp/jobsearch.log","a");
      $usr = $this->get('security.context')->getToken()->getUser();
      $em = $this->getDoctrine()->getEntityManager();

      $last_post_query = $em->createQuery(
        'SELECT uf, p FROM JobsearchFeedsBundle:UserFeed uf ' .
        'JOIN uf.posting p ' .
        'where uf.search=:searchId order by p.id desc')
        ->setMaxResults(1)
        ->setParameter('searchId', $search);

      $last_post_query->useResultCache(true, 3600, 'LastPost');
      $cacheDriver = $em->getConfiguration()->getResultCacheImpl();
      $cacheDriver->delete('LastPost');

      $last_post_result = $last_post_query->getOneOrNullResult();
      $last_post_result == NULL ?  $lastPostId = 0 :
        $lastPostId = $last_post_result->getPosting()->getId();

//      fwrite($log,"\n$search $lastPostId\n");

      $search_query = $em->createQuery(
        'SELECT s ' .
        'FROM JobsearchCraigslistBundle:Search s ' .
        'where s.user=:user')
        ->setParameter('user', $usr->getId());
        
      $search_results = $search_query->getResult();

      foreach ($search_results as $sr) {
        if ($sr->getId() != $search) {
          continue;
        } else {
//          fwrite($log, "Looking at results for $search\n");
        }

//        $sr = $this->getDoctrine()->getRepository('JobsearchSearchesBundle:Search')->find($search);

        $job_types_results = $sr->getSearchAreas();

        foreach ($job_types_results as $jtr) {
      
            $postings_query = $em->createQuery(
            'SELECT p FROM JobsearchPostingsBundle:Posting p ' .
            'WHERE p.area=:area and p.jobtype=:jobtype AND p.id > :lastId')
            ->setParameter('area', $jtr->getArea())
            ->setParameter('jobtype', $jtr->getJobtype())
            ->setParameter('lastId', $lastPostId);

          $postings_results = $postings_query->getResult();

          foreach ($postings_results as $pr) {
            $match_str = $sr->getKeywords();
            if (preg_match("/$match_str/i", $pr->getTitle()) or 
              preg_match("/$match_str/i", $pr->getDescription())) {

             fwrite($log, "Adding item, " . $pr->getTitle() . "\n");

              $feedItem = new UserFeed();
              $feedItem->setPosting($pr);
              $feedItem->setSearch($sr);
              $feedItem->setAdded(new \DateTime("now"));
              
              $em->persist($feedItem);
              $em->flush();
            } 
          }
        }
      } 
 //     fclose($log);
      return $this->redirect(
        $this->generateUrl('jobsearch_feeds_feed_show',
          array('search' => $search)));
    }
    /**
     * @Route("/feed/show/{search}", requirements={"search" = "\d+"})
     * @Template()
     */
    public function showAction($search)
    {
      $usr = $this->get('security.context')->getToken()->getUser();

      $em = $this->getDoctrine()->getEntityManager();

      $get_feed_query = $em->createQuery(
        'SELECT uf, p from JobsearchFeedsBundle:UserFeed uf ' .
        'JOIN uf.posting p ' .
        'WHERE uf.search=:searchId order by p.date desc')
        ->setMaxResults(100)
        ->setParameter('searchId', $search);

      $uf_results = $get_feed_query->getResult();

      $postings = array();
      foreach ($uf_results as $ufr) {
        array_push($postings,$ufr->getPosting());
      }
      
      return $this->render('JobsearchFeedsBundle:Default:showfeed.html.twig',
      array('postings' => $postings,
            'search' => $search));
    }
}
