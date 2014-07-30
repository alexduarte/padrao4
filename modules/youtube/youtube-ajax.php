<?php

if (isset($_POST['ajax']))
{
    include(dirname(__FILE__).'/../../config/config.inc.php');
    include(dirname(__FILE__).'/../../init.php');
    include(dirname(__FILE__).'/youtube.php');
    
    $moduleInstance = new youtube();
    
    /* direct file access protection */
    if (!isset($_POST['token']) || (isset($_POST['token'])) && $_POST['token'] != sha1(_COOKIE_KEY_.$moduleInstance->name)) die('token_error');
    
    if (isset($_POST['getProductList']))
    {
        die($moduleInstance->getProductList((int)$_POST['id_category'], (int)$_POST['page'], $_POST['search_val']));
    }
    elseif(isset($_POST['getProductVideos']))
    {
        die($moduleInstance->getProductVideos((int)$_POST['id_product']));
    }
    elseif(isset($_POST['addVideo']))
    {
        die($moduleInstance->addVideo((int)$_POST['id_product'], $_POST['url']));
    }
    elseif(isset($_POST['toggleVideoStatus']))
    {
        die($moduleInstance->toggleVideoStatus((int)$_POST['id_video'], (int)$_POST['status']));
    }
    elseif(isset($_POST['deleteVideo']))
    {
        die($moduleInstance->deleteVideo((int)$_POST['id_video']));
    }
    elseif(isset($_POST['positionVideos']))
    {
        die($moduleInstance->positionVideos($_POST['videos_list']));
    }
}