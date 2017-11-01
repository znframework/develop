<?php namespace ZN\ViewObjects\View;

use Validation, Arrays, DB, Session;

class InternalForm
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    protected $elements =
    [
        'input' =>
        [
            'button', 'reset' , 'submit'  , 'radio', 'checkbox',
            'date'  , 'time'  , 'datetime', 'week' , 'month'   ,
            'text'  , 'search', 'password', 'email', 'tel'     ,
            'number', 'url'   , 'range'   , 'image', 'color'
        ]
    ];


    //--------------------------------------------------------------------------------------------------------
    // $settings
    //--------------------------------------------------------------------------------------------------------
    //
    // Ayarları tutmak için
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $validate = [];

    //--------------------------------------------------------------------------------------------------------
    // $method
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $method;

    //--------------------------------------------------------------------------------------------------------
    // Common
    //--------------------------------------------------------------------------------------------------------
    //
    // attributes()
    // _input()
    //
    //--------------------------------------------------------------------------------------------------------
    use ViewCommonTrait;

    //--------------------------------------------------------------------------------------------------------
    // Open
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param array  $attributes
    //
    // Usable 3 Parameter For Enctype
    // 1. multipart     => multipart/form-data
    // 2. application   => application/x-www-form-urlencoded
    // 3. text          => text/plain
    //
    //--------------------------------------------------------------------------------------------------------
    public function open(String $name = NULL, Array $_attributes = []) : String
    {
        if( isset($this->settings['attr']['name']) )
        {
            $name = $this->settings['attr']['name'];
        }

        $_attributes['name'] = $name;

        if( isset($_attributes['enctype']) )
        {
            $enctype = $_attributes['enctype'];

            if( isset($this->enctypes[$enctype]) )
            {
                $_attributes['enctype'] = $this->enctypes[$enctype];
            }
        }

        if( ! isset($_attributes['method']) )
        {
            $_attributes['method'] = 'post';
        }

        if( isset($this->settings['where']) )
        {
            $this->settings['getrow'] = DB::get($name)->row();
        }

        if( $query = ($this->settings['query'] ?? NULL) )
        {
            $this->settings['getrow'] = DB::query($query)->row();
        }

        $this->method = $_attributes['method'];

        $return = '<form'.$this->attributes($_attributes).'>'.EOL;

        if( isset($this->settings['token']) )
        {
            $return .= CSRFInput();
        }

        $this->_unsetopen();

        return $return;
    }

    //--------------------------------------------------------------------------------------------------------
    // Open
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function close() : String
    {
        unset($this->settings['getrow']);

        return '</form>'.EOL;
    }

    //--------------------------------------------------------------------------------------------------------
    // Date Time Local
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function datetimeLocal(String $name = NULL, String $value = NULL, Array $_attributes = []) : String
    {
        return $this->_input($name, $value, $_attributes, 'datetime-local');
    }

    //--------------------------------------------------------------------------------------------------------
    // Textarea
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function textarea(String $name = NULL, String $value = NULL, Array $_attributes = []) : String
    {
        if( ! isset($this->settings['attr']['name']) && ! empty($name) )
        {
            $this->settings['attr']['name'] = $name;
        }

        if( isset($this->settings['attr']['value']) )
        {
            $value = $this->settings['attr']['value'];
        }

        if( ! empty($this->settings['attr']['name']) )
        {
            $this->_posback($this->settings['attr']['name'], $value);

            // 5.4.2[added]
            $this->_validate($this->settings['attr']['name'], $this->settings['attr']['name']);
            
            // 5.4.2[added]
            $value = $this->_getrow('textarea', $value, $this->settings['attr']);
        }

        return '<textarea'.$this->attributes($_attributes).'>'.$value.'</textarea>'.EOL;
    }

    //--------------------------------------------------------------------------------------------------------
    // Select
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param array  $options
    // @param scalar $selected
    // @param array  $attributes
    // @param bool   $multiple
    //
    //--------------------------------------------------------------------------------------------------------
    public function select(String $name = NULL, Array $options = [], $selected = NULL, Array $_attributes = [], Bool $multiple = false) : String
    {
        if( ! empty($this->settings['table']) || ! empty($this->settings['query']) )
        {
            $key     = key($options);
            $current = current($options);

            $options = Arrays::removeFirst($options);

            if( ! empty($this->settings['table']) )
            {
                $table = $this->settings['table'];

                if( strstr($table, ':') )
                {
                    $tableEx = explode(':', $tableEx);
                    $table   = $tableEx[1];
                    $db      = $tableEx[0];

                    $db = DB::differentConnection($db);
                    $result = $db->select($current, $key)->get($table)->result();
                }
                else
                {
                    $result = DB::select($current, $key)->get($table)->result();
                }
            }
            else
            {
                $result = DB::query($this->settings['query'])->result();
            }

            foreach( $result as $row )
            {
                $options[$row->$key] = $row->$current;
            }
        }

        if( isset($this->settings['option']) )
        {
            $options = $this->settings['option'];
        }

        if( isset($this->settings['exclude']) )
        {
            $options = Arrays::excluding($options, $this->settings['exclude']);
        }

        if( isset($this->settings['include']) )
        {
            $options = Arrays::including($options, $this->settings['include']);
        }

        if( isset($this->settings['order']['type']) )
        {
            $options = Arrays::order($options, $this->settings['order']['type'], $this->settings['order']['flags']);
        }

        if( isset($this->settings['selectedKey']) )
        {
            $selected = $this->settings['selectedKey'];
        }

        if( isset($this->settings['selectedValue']) )
        {
            $flip     = array_flip($options);
            $selected = $flip[$this->settings['selectedValue']];
        }

        // Son parametrenin durumuna multiple olması belirleniyor.
        // Ancak bu parametrenin kullanımı gerekmez.
        // Bunun için multiple() yöntemi oluşturulmuştur.
        if( $multiple === true )
        {
            $_attributes['multiple'] ="multiple";
        }

        if( $name !== '' )
        {
            $_attributes['name'] = $name;
        }

        if( ! empty($_attributes['name']) )
        {
            $this->_posback($_attributes['name'], $selected);

            // 5.4.2[added]
            $this->_validate($_attributes['name'], $_attributes['name']);
            
            // 5.4.2[added]
            $selected = $this->_getrow('select', $selected, $_attributes);
        }

        $selectbox = '<select'.$this->attributes($_attributes).'>';

        if( is_array($options) ) foreach( $options as $key => $value )
        {
            if( is_array($selected) )
            {
                if( in_array($key, $selected) )
                {
                    $select = 'selected="selected"';
                }
                else
                {
                    $select = "";
                }
            }
            else
            {
                if( $selected == $key )
                {
                    $select = 'selected="selected"';
                }
                else
                {
                    $select = "";
                }
            }

            $selectbox .= '<option value="'.$key.'" '.$select.'>'.$value.'</option>'.EOL;
        }

        $selectbox .= '</select>'.EOL;

        $this->_unsetselect();

        return $selectbox;
    }

    //--------------------------------------------------------------------------------------------------------
    // Multi Select
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param array  $options
    // @param scalar $selected
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function multiselect(String $name = NULL, Array $options = [], $selected = NULL, Array $_attributes = []) : String
    {
        return $this->select($name, $options, $selected, $_attributes, true);
    }

    //--------------------------------------------------------------------------------------------------------
    // Hidden
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function hidden(String $name = NULL, String $value = NULL) : String
    {
        if( isset($this->settings['attr']['name']) )
        {
            $name = $this->settings['attr']['name'];
        }

        if( isset($this->settings['attr']['value']) )
        {
            $value = $this->settings['attr']['value'];
        }

        $this->settings = [];

        $hiddens = NULL;

        $value = ( ! empty($value) )
                 ? 'value="'.$value.'"'
                 : "";

        // 1. parametre dizi ise
        if( is_array($name) ) foreach( $name as $key => $val )
        {
            $hiddens .= '<input type="hidden" name="'.$key.'" id="'.$key.'" value="'.$val.'">'.EOL;
        }
        else
        {
            $hiddens =  '<input type="hidden" name="'.$name.'" id="'.$name.'" '.$value.'>'.EOL;
        }

        return $hiddens;
    }

    //--------------------------------------------------------------------------------------------------------
    // File
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param bool   $multiple
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function file(String $name = NULL, Bool $multiple = false, Array $_attributes = []) : String
    {
        if( ! empty($this->settings['attr']['multiple']) )
        {
            $multiple = true;
        }

        if( ! empty($this->settings['attr']['name']) )
        {
            $name = $this->settings['attr']['name'];
        }

        if( $multiple === true )
        {
            $this->settings['attr']['multiple'] = 'multiple';
            $name = suffix($name, '[]');
        }

        return $this->_input($name, '', $_attributes, 'file');
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Unset Select Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _unsetselect()
    {
        unset($this->settings['table']);
        unset($this->settings['query']);
        unset($this->settings['option']);
        unset($this->settings['exclude']);
        unset($this->settings['include']);
        unset($this->settings['order']);
        unset($this->settings['selectedKey']);
        unset($this->settings['selectedValue']);
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Unset Select Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _unsetopen()
    {
        unset($this->settings['where']);
        unset($this->settings['query']);
        unset($this->settings['token']);
    }
}
