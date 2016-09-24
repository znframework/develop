<?php namespace ZN\DateTime;

class TimeUnitTest extends \UnitTestController
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    const unit =
    [
        'class'   => 'Time',
        'methods' =>
        [
            'current'   => [],
            'standart'  => [],
            'convert'   => ['2015.30.03'],
            'compare'   => ['2015.30.03', '>', '2015.30.02'],
            'toNumeric' => ['2015.30.03'],
            'calculate' => ['2015.30.03', '-30 day'],
            'set'       => ['Y-m-d']
        ]
    ];
}
