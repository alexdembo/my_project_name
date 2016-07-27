<?php
/**
 * Created by PhpStorm.
 * User: nout
 * Date: 15-Jul-16
 * Time: 14:01
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

define('pearErrorMode', 'CACHE_LITE_ERROR_DIE');



class CacheLiteService extends Controller implements CacheInterface {

    function cacheSetup(){
        $options = array(
            'cacheDir' => '/tmp/',
            'lifeTime' => $this->getParameter('lifetime'),
            'pearErrorMode' => pearErrorMode);
        $cache = new \Cache_Lite($options);
        return $cache;
    }

    public function getCache($pageID){
        return $this->cacheSetup()->get($pageID);
    }

    public function saveCache($pageID){
        $this->cacheSetup()->save($this->cacheSetup()->get($pageID));
        }

     public function removeCache($pageID){
         return $this->cacheSetup()->remove($pageID);

     }
}