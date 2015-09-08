<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Food\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction(){
        
        
    }
    
    public function foodmenuAction()
    {
        
        $sm = $this->getServiceLocator();
        $foodObj = $sm->get("Food\Model\FoodModel");
        $foodItem = $foodObj->getFoodMenu();
        
        $view = new ViewModel();
        $view->setTemplate("food/index/foodmenu.phtml"); //foo/baz-bat/do-something-crazy
        
        $variables = array(
            'foodItem' => $foodItem,
        );
        
        $view = new ViewModel();
        $view->setVariables($variables);
        $this->layout()->setVariables($variables);
        return $view;
    }
    

    public function tabmenuAction()
    {
    
        $sm = $this->getServiceLocator();
        $foodObj = $sm->get("Food\Model\FoodModel");
        $appetizer = $foodObj->getFoodMenuByTag('appetizer');
        $entry = $foodObj->getFoodMenuByTag('entry');
        $drink = $foodObj->getFoodMenuByTag('drink');
        $view = new ViewModel();
        $view->setTemplate("food/index/foodmenu.phtml"); //foo/baz-bat/do-something-crazy
    
        $variables = array(
            'appitizer' => $appetizer,
            'entry' => $entry,
            'drink' => $drink,
        );
    
        $view = new ViewModel();
        $view->setVariables($variables);
        $this->layout()->setVariables($variables);
        return $view;
    }
}
