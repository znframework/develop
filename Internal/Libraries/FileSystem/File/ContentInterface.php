<?php namespace ZN\FileSystem\File;

interface ContentInterface
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
    // Read
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    //
    //--------------------------------------------------------------------------------------------------------
    public function read(string $file) : string;

    //--------------------------------------------------------------------------------------------------------
    // Find
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function find(string $file, string $data) : \stdClass;

    //--------------------------------------------------------------------------------------------------------
    // Write
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function write(string $file, string $data) : int;

    //--------------------------------------------------------------------------------------------------------
    // Append
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function append(string $file, string $data) : int;
}
