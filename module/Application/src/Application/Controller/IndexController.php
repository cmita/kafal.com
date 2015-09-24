<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        /*
        $currentSiteDetails = new Container('currentSiteDetails');
        $siteLayout = $currentSiteDetails->currentSiteDetails['layout'];
        $siteLayoutConfig = $this->_getLayoutConfig()['layouttype'];//
        $widgetConfigArry = $this->_getLayoutConfig()['widget'];//
        */
        $layout  = $this->layout();
        $this->layout('/layout/home2.phtml');
        
        $aboutusView = $this->forward()->dispatch("Application\Controller\Index", array_merge(array('action' =>  "about"), array()));
        $contactView = $this->forward()->dispatch("Application\Controller\Index", array_merge(array('action' =>  "contact"), array()));
        $serviceView = $this->forward()->dispatch("Application\Controller\Index", array_merge(array('action' =>  "service"), array()));
        
        $beerView = $this->forward()->dispatch("Food\Controller\Index", array_merge(array('action' =>  "taggedmenu"), array('tag'=> array('beer'=>"BEER",'wine'=>"WINE",'cocktail'=>'COCKTAIL','mocktails'=>"MOCKTAILS"))));
        $lunchView = $this->forward()->dispatch("Food\Controller\Index", array_merge(array('action' =>  "taggedmenu"), array('tag'=> array('appetizer'=>"APPETIZER",'entry'=>"ENTRY"))));


        $this->layout()->addChild($lunchView, "lunch");
        $this->layout()->addChild($beerView, "beer");
        $this->layout()->addChild($aboutusView, "aboutus");
        $this->layout()->addChild($contactView, "contactus");
        $this->layout()->addChild($serviceView, "service");
        
        
        //$this->layout()->setVariable('current_site_details', $currentSiteDetails->currentSiteDetails);
        //$this->layout()->setVariable('currentLayoutConfigArry', $currentLayoutConfigArry);
    }
    
    public function menuAction(){
        $this->layout('/layout/one_col.phtml');
        $layout  = $this->layout();
        $v1 = $this->forward()->dispatch("Food\Controller\Index", array_merge(array('action' =>  "tabmenu"), array()));
         
        $this->layout()->addChild($v1, "footItems");
    }

    public function contactAction(){
        $view = new ViewModel();
        $view->setTemplate("application/index/contact.phtml");
         
        $view = new ViewModel();
        return $view;
    }
    
    public function aboutAction(){
         $view = new ViewModel();
         $view->setTemplate("application/index/about.phtml");
         
         $view = new ViewModel();
         return $view;
        
    }
    
    public function serviceAction(){
        $view = new ViewModel();
        $view->setTemplate("application/index/service.phtml");
         
        $view = new ViewModel();
        return $view;
    
    }
    
}
