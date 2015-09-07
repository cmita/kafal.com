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
        
        $v1 = $this->forward()->dispatch($widgetConfigArry[$segment]['controller'], array_merge(array('action' => $widgetConfigArry[$segment]['action']), $param));
           
        $this->layout()->addChild($v1, $segment);  
        
        
        //$this->layout()->setVariable('current_site_details', $currentSiteDetails->currentSiteDetails);
        //$this->layout()->setVariable('currentLayoutConfigArry', $currentLayoutConfigArry);
    }
}
