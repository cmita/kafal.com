<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Gallery\Model;


use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GalleryModel implements ServiceLocatorAwareInterface {

    protected $services;
    
    
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->services = $serviceLocator;
    }
    
    public function getServiceLocator() {
        return $this->services;
    }
    
    public function getFoodMenu(){
       $config= $this->getServiceLocator()->get("config");
       $menuItem = $config['menuItem'];
       return $menuItem;
    }
    

    public function getFoodMenuByTag($tag){
        $config= $this->getServiceLocator()->get("config");
        $menuItem = $config['menuItem'];
        $resultSet = array();
        
        foreach($menuItem as $item){
            
            if(in_array($tag,$item['tags'])){
                $resultSet[] = $item;
            }
        }
        return $resultSet;
    }
}
