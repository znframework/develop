<?php namespace ZN\DataTypes;

use Json;

class InternalXML implements XMLInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Version
    //--------------------------------------------------------------------------------------------------------
    //
    // Genel Kullanım: Bir XML belgesinin versiyonunu oluşturur.
    //
    // @param  string   $version -> 1.0
    // @return this
    //
    //--------------------------------------------------------------------------------------------------------
    public function version(String $version = '1.0') : InternalXML
    {
        XMLFactory::class('XMLBuilder')->version($version);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Encoding
    //--------------------------------------------------------------------------------------------------------
    //
    // Genel Kullanım: Bir XML belgesinin kodlama türünü belirtir.
    //
    // @param  string   $encoding -> UTF-8
    // @return this
    //
    //--------------------------------------------------------------------------------------------------------
    public function encoding(String $encoding = 'UTF-8') : InternalXML
    {
        XMLFactory::class('XMLBuilder')->encoding($encoding);

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Build
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array  $data
    // @param string $version
    // @param string $encoding
    //
    //--------------------------------------------------------------------------------------------------------
    public function build(Array $data, String $version = NULL, String $encoding = NULL) : String
    {
        return XMLFactory::class('XMLBuilder')->do($data, $version, $encoding);
    }

    //--------------------------------------------------------------------------------------------------------
    // Save
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function save(String $file, String $data) : Bool
    {
        return XMLFactory::class('XMLSave')->do($file, $data);
    }

    //--------------------------------------------------------------------------------------------------------
    // Load
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string   $file
    // @return string
    //
    //--------------------------------------------------------------------------------------------------------
    public function load(String $file) : String
    {
        return XMLFactory::class('XMLLoader')->do($file);
    }

    //--------------------------------------------------------------------------------------------------------
    // Parse
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $xml
    // @param string $result
    //
    //--------------------------------------------------------------------------------------------------------
    public function parse(String $xml, String $result = 'object')
    {
        return XMLFactory::class('XMLParser')->do($xml, $result);
    }

    //--------------------------------------------------------------------------------------------------------
    // Parse Array
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $data
    // @return array
    //
    //--------------------------------------------------------------------------------------------------------
    public function parseArray(String $data) : Array
    {
        return $this->parse($data, 'array');
    }

    //--------------------------------------------------------------------------------------------------------
    // Parse Json
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $data
    // @return array
    //
    //--------------------------------------------------------------------------------------------------------
    public function parseJson(String $data) : String
    {
        return Json::encode($this->parse($data, 'array'));
    }

    //--------------------------------------------------------------------------------------------------------
    // Parse Object
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string   $data
    // @return object
    //
    //--------------------------------------------------------------------------------------------------------
    public function parseObject(String $data) : \stdClass
    {
        return $this->parse($data, 'object');
    }
}
