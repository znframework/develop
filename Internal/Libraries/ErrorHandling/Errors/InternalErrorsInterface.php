<?php namespace ZN\ErrorHandling;

interface InternalErrorsInterface
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
    // Message
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $langFile
    // @param string $errorMsg
    // @param mixed  $ex
    //
    //--------------------------------------------------------------------------------------------------------
    public function message(string $langFile, string $errorMsg, $ex = NULL) : string;

    //--------------------------------------------------------------------------------------------------------
    // Last
    //--------------------------------------------------------------------------------------------------------
    //
    // @param  string $type
    // @return mixed
    //
    //--------------------------------------------------------------------------------------------------------
    public function last(string $type = NULL);

    //--------------------------------------------------------------------------------------------------------
    // Log
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param int    $type
    // @param string $destination
    // @param string $header
    //
    //--------------------------------------------------------------------------------------------------------
    public function log(string $message, int $type = 0, ? string $destination = NULL, string $header = NULL) : bool;

    //--------------------------------------------------------------------------------------------------------
    // Report
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int
    //
    //--------------------------------------------------------------------------------------------------------
    public function report(int $level = NULL) : int;

    //--------------------------------------------------------------------------------------------------------
    // Handler
    //--------------------------------------------------------------------------------------------------------
    //
    // @param int
    //
    //--------------------------------------------------------------------------------------------------------
    public function handler($handler, int $errorTypes = E_ALL | E_STRICT);

    //--------------------------------------------------------------------------------------------------------
    // Trigger
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $msg
    // @param int    $errorType
    //
    //--------------------------------------------------------------------------------------------------------
    public function trigger(string $msg, int $errorType = E_USER_NOTICE) : bool;

    //--------------------------------------------------------------------------------------------------------
    // Restore
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function restore() : bool;
}
