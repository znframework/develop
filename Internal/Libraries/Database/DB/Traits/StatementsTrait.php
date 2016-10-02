<?php namespace ZN\Database\DB\Traits;

trait StatementsTrait
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
    // Statements
    //--------------------------------------------------------------------------------------------------------
    //
    // @var Array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $statementElements =
    [
        'autoincrement',
        'primarykey'   ,
        'foreignkey'   ,
        'unique'       ,
        'null'         ,
        'notnull'      ,
        'exists'       ,
        'notexists'    ,
        'constraint'
    ];

    //--------------------------------------------------------------------------------------------------------
    // Property
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed  $type
    // @param string $col
    // @param bool   $output
    //
    //--------------------------------------------------------------------------------------------------------
    public function property($type, string $col = NULL, bool $output = true) : string
    {
        if( is_array($type) )
        {
            $state = '';

            foreach( $type as $key => $val )
            {
                if( ! is_numeric($key) )
                {
                    $state .= $this->db->statements($key, $val);
                }
                else
                {
                    $state .= $this->db->statements($val);
                }
            }

            return $state;
        }
        else
        {
            return $this->db->statements($type, $col, $output);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Default Value
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $default
    // @param bool   $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function defaultValue(string $default = NULL, bool $type = false) : string
    {
        if( ! is_numeric($default) )
        {
            $default = presuffix($default, '"');
        }

        return $this->db->statements('default', $default, $type);
    }

    //--------------------------------------------------------------------------------------------------------
    // Like
    //--------------------------------------------------------------------------------------------------------
    //
    // @param variadic $args
    //
    //--------------------------------------------------------------------------------------------------------
    public function like(string $value, string $type = 'starting') : string
    {
        $operator = $this->db->operator(__FUNCTION__);

        if( $type === "inside" )
        {
            $value = $operator.$value.$operator;
        }

        // İle Başlayan
        if( $type === "starting" )
        {
            $value = $value.$operator;
        }

        // İle Biten
        if( $type === "ending" )
        {
            $value = $operator.$value;
        }

        return $value;
    }
}
