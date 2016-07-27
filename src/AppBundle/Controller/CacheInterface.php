<?php
/**
 * Created by PhpStorm.
 * User: nout
 * Date: 15-Jul-16
 * Time: 14:01
 */

namespace AppBundle\Controller;


interface CacheInterface
{
    public function getCache($pageID);
    public function saveCache($pageID);
    public function removeCache($pageID);
}