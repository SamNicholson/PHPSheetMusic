<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 11/05/2015
 * Time: 23:30
 */

namespace interfaces;


interface FileHandler
{

    public function openFile($filePath);

    public function saveFile($filePath = null);

}