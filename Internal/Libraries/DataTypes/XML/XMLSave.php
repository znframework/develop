<?php namespace ZN\DataTypes\XML;

use File;

class XMLSave
{
    //--------------------------------------------------------------------------------------------------------
    // Extension
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $extension = '.xml';

    //--------------------------------------------------------------------------------------------------------
    // Save
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $file
    // @param string $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function do(String $file, String $data) : Bool
    {
        $file = suffix($file, $this->extension);

        return File::write($file, $data);
    }
}
