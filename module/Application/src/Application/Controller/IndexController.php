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
        $preview =$_GET['preview'];
        if(empty($preview)){
            $layout  = $this->layout();
            $this->layout('/layout/under_construction.phtml');
        }else{
        
        
        $layout  = $this->layout();
        $this->layout('/layout/home2.phtml');
        
        //$currentSiteDetails = new Container('currentSiteDetails');
        //$siteLayout = $currentSiteDetails->currentSiteDetails['layout'];
       // $siteLayoutConfig = $this->_getLayoutConfig()['layouttype'];//
        //$widgetConfigArry = $this->_getLayoutConfig()['widget'];//
        
        
        
        $aboutusView = $this->forward()->dispatch("Application\Controller\Index", array_merge(array('action' =>  "about"), array()));
        $contactView = $this->forward()->dispatch("Application\Controller\Index", array_merge(array('action' =>  "contact"), array()));
        $serviceView = $this->forward()->dispatch("Application\Controller\Index", array_merge(array('action' =>  "service"), array()));
        
        $beerView = $this->forward()->dispatch("Food\Controller\Index", array_merge(array('action' =>  "taggedmenu"), array('tag'=> array('beer'=>"BOTTLED BEER",'cocktail'=>'ALCOHOLIC DRINKS (COCKTAIL)','mocktails'=>"NON-ALCOHOLIC DRINK (MOCKTAILS)", "beverages" => 'Beverages'))));
        $menuView = $this->forward()->dispatch("Food\Controller\Index", array_merge(array('action' =>  "taggedmenu"), array('tag'=> 
                        array('appetizers'=>"APPETIZER",'street'=>"Street Speciality",'specialities'=>"Himalayan Specialities",'soups'=>"Soup & Salad",'vegetarian'=>"Vegeterian",
                            'chicken'=>"Chicken",'lamb'=>"Lamb",'seafood'=>"Seafood",'tandoori'=>"Tamdoori",'speciality'=>"speciality",'wraps'=>"Wraps n Roll",'rice'=>"Biryany n Fired Rice",
                            'bread'=>"bread",'sides'=>"sides",'deserts'=>"deserts"))));
        $galleryView = $this->forward()->dispatch("Application\Controller\Index", array_merge(array('action' =>  "gallery"), array('tag'=> 'food')));
        
        $this->layout()->addChild($menuView, "menu");
        $this->layout()->addChild($beerView, "beer");
        $this->layout()->addChild($aboutusView, "aboutus");
        $this->layout()->addChild($contactView, "contactus");
        $this->layout()->addChild($serviceView, "service");
        $this->layout()->addChild($galleryView, "gallery");
        
        }
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
    

    public function galleryAction(){
    
        //$sm = $this->getServiceLocator();
        //$galleryObj = $sm->get("Gallery\Model\GalleryModel");
        //$tag= $this->params('tag');
    
        $view = new ViewModel();
        $view->setTemplate("application/index/gallery.phtml");
    
        $gallerySet= array(array('name'=> 'kafalrestaurant1'),array('name'=>'kafalrestaurant2'),array('name'=>'kafalrestaurant3'),array('name'=>'kafalrestaurant4'));
    
        $variables = array(
            'gallerySet' => $gallerySet
        );
    
        $view = new ViewModel();
        $view->setVariables($variables);
        $this->layout()->setVariables($variables);
        return $view;
    }
    
    public function submitcontactAction(){
        
    }
    
}
