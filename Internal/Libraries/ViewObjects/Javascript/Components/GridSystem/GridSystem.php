<?php namespace ZN\ViewObjects\Javascript\Components;

use Html, Form, Buffer;

class GridSystem extends ComponentsExtends implements GridSystemInterface
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
    // Row
    //--------------------------------------------------------------------------------------------------------
    //
    // @param callable $columns
    // @param array    $attr = NULL
    //
    //--------------------------------------------------------------------------------------------------------
    public function row(Callable $columns, Array $attr = [])
    {
        $content = Buffer::function($columns, [$this]);

        echo Html::attr($attr)->class('row')->div($content);
    }

    //--------------------------------------------------------------------------------------------------------
    // Col
    //--------------------------------------------------------------------------------------------------------
    //
    // @poram scalar   $size
    // @param callable $code
    // @param array    $attr = NULL
    //
    //--------------------------------------------------------------------------------------------------------
    public function col($size, Callable $code, Array $attr = [])
    {
        $content = Buffer::function($code, [new Form, new Html]);

        echo Html::attr($attr)->class('col-' . ( is_numeric($size) ? 'lg-' . $size : $size))->div($content);
    }

    //--------------------------------------------------------------------------------------------------------
    // Generate
    //--------------------------------------------------------------------------------------------------------
    //
    // @param callable $grid
    //
    //--------------------------------------------------------------------------------------------------------
    public function generate(Callable $grid) : String
    {
        $contents = Buffer::function($grid, [$this]);

        $attr['autoloadExtensions'] = $this->autoloadExtensions ?? false;
        $attr['extensions']         = $this->extensions         ?? [];
        $attr['attributes']         = $this->attributes         ?? [];
        $attr['contents']           = $contents;

        $this->defaultVariables();

        return $this->load('GridSystem/View', $attr);
    }
}
