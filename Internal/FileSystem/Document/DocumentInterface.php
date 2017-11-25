<?php namespace ZN\FileSystem\Document;

interface DocumentInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------
    
    //--------------------------------------------------------------------------------------------------------
    // Target
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $target
    //
    //--------------------------------------------------------------------------------------------------------
    public function target(String $target) : InternalDocument;

    //--------------------------------------------------------------------------------------------------------
    // Apply
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function apply();
}