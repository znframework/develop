<?php
trait FormElementsTrait
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
		
	//----------------------------------------------------------------------------------------------------
	// Setting Methods Başlangıç
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// exclude()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $exclude
	//
	//----------------------------------------------------------------------------------------------------
	public function exclude($exclude = array())
	{
		if( is_scalar($exclude) )
		{
			$exclude[] = $exclude;	
		}
		
		$this->settings['exclude'] = $exclude;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// order()
	//----------------------------------------------------------------------------------------------------
	// 
	// Arrays::order() yönteminde kullanılan type ve flags parametreleri aynen geçerlidir.
 	//
	// @param string $type:desc
	// @param string $flags:regular
	//
	//----------------------------------------------------------------------------------------------------
	public function order($type = 'desc', $flags = 'regular')
	{
		$this->settings['order']['type']  = $type;
		$this->settings['order']['flags'] = $flags;
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// name()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function name($name = '')
	{
		$this->_element(__FUNCTION__, $name);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// addClass()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $class
	//
	//----------------------------------------------------------------------------------------------------
	public function addClass($class = '')
	{
		$this->_element(__FUNCTION__, $class);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// placeholder()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function placeholder($value = '')
	{
		$this->_element(__FUNCTION__, $value);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// rows()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function rows($value = '')
	{
		$this->_element(__FUNCTION__, $value);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// style()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function style($value = '')
	{
		$this->_element(__FUNCTION__, $value);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// max()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $max
	//
	//----------------------------------------------------------------------------------------------------
	public function max($max = '')
	{
		$this->_element(__FUNCTION__, $max);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// min()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $min
	//
	//----------------------------------------------------------------------------------------------------
	public function min($min = '')
	{
		$this->_element(__FUNCTION__, $min);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// maxlength()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $maxlength
	//
	//----------------------------------------------------------------------------------------------------
	public function maxLength($maxlength = '')
	{
		$this->_element(__FUNCTION__, $maxlength);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// width()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $width
	//
	//----------------------------------------------------------------------------------------------------
	public function width($width = '')
	{
		$this->_element(__FUNCTION__, $width);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// height()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $height
	//
	//----------------------------------------------------------------------------------------------------
	public function height($height = '')
	{
		$this->_element(__FUNCTION__, $height);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// align()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $align
	//
	//----------------------------------------------------------------------------------------------------
	public function align($align = '')
	{
		$this->_element(__FUNCTION__, $align);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// required()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function required()
	{
		$this->_element(__FUNCTION__, __FUNCTION__);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// autofocus()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function autoFocus()
	{
		$this->_element(__FUNCTION__, __FUNCTION__);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// disabled()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function disabled()
	{
		$this->_element(__FUNCTION__, __FUNCTION__);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// readonly()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function readOnly()
	{
		$this->_element(__FUNCTION__, __FUNCTION__);
		
		return $this;
	}

	//----------------------------------------------------------------------------------------------------
	// vspace()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $vspace
	//
	//----------------------------------------------------------------------------------------------------
	public function vspace($vspace = '')
	{
		$this->_element(__FUNCTION__, $vspace);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// step()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $step
	//
	//----------------------------------------------------------------------------------------------------
	public function step($step = '')
	{
		$this->_element(__FUNCTION__, $step);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// border()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $border
	//
	//----------------------------------------------------------------------------------------------------
	public function border($border = '')
	{
		$this->_element(__FUNCTION__, $border);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// wrap()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $wrap
	//
	//----------------------------------------------------------------------------------------------------
	public function wrap($wrap = '')
	{
		$this->_element(__FUNCTION__, $wrap);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// cols()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $wrap
	//
	//----------------------------------------------------------------------------------------------------
	public function cols($cols = '')
	{
		$this->_element(__FUNCTION__, $cols);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// size()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $size
	//
	//----------------------------------------------------------------------------------------------------
	public function size($size = '')
	{
		$this->_element(__FUNCTION__, $size);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// role()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $role
	//
	//----------------------------------------------------------------------------------------------------
	public function role($role = '')
	{
		$this->_element(__FUNCTION__, $role);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// draggable()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $draggable
	//
	//----------------------------------------------------------------------------------------------------
	public function draggable($draggable = '')
	{
		$this->_element(__FUNCTION__, $draggable);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// dropzone()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $dropzone
	//
	//----------------------------------------------------------------------------------------------------
	public function dropzone($dropzone = '')
	{
		$this->_element(__FUNCTION__, $dropzone);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onblur()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onblur
	//
	//----------------------------------------------------------------------------------------------------
	public function onBlur($onblur = '')
	{
		$this->_element(__FUNCTION__, $onblur);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onchange()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onchange
	//
	//----------------------------------------------------------------------------------------------------
	public function onChange($onchange = '')
	{
		$this->_element(__FUNCTION__, $onchange);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onclick()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onclick
	//
	//----------------------------------------------------------------------------------------------------
	public function onClick($onclick = '')
	{
		$this->_element(__FUNCTION__, $onclick);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// ondblclick()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $ondblclick
	//
	//----------------------------------------------------------------------------------------------------
	public function onDblClick($ondblclick = '')
	{
		$this->_element(__FUNCTION__, $ondblclick);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onFocus()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $focus
	//
	//----------------------------------------------------------------------------------------------------
	public function onFocus($focus = '')
	{
		$this->_element(__FUNCTION__, $focus);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onkeydown()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onkeydown
	//
	//----------------------------------------------------------------------------------------------------
	public function onKeyDown($onkeydown = '')
	{
		$this->_element(__FUNCTION__, $onkeydown);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onkeypress()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onkeypress
	//
	//----------------------------------------------------------------------------------------------------
	public function onKeyPress($onkeypress = '')
	{
		$this->_element(__FUNCTION__, $onkeypress);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onkeyup()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onkeyup
	//
	//----------------------------------------------------------------------------------------------------
	public function onKeyUp($onkeyup = '')
	{
		$this->_element(__FUNCTION__, $onkeyup);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onmousedown()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onmousedown
	//
	//----------------------------------------------------------------------------------------------------
	public function onMouseDown($onmousedown = '')
	{
		$this->_element(__FUNCTION__, $onmousedown);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onmousemove()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onmousemove
	//
	//----------------------------------------------------------------------------------------------------
	public function onMouseMove($onmousemove = '')
	{
		$this->_element(__FUNCTION__, $onmousemove);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onmouseout()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onmouseout
	//
	//----------------------------------------------------------------------------------------------------
	public function onMouseOut($onmouseout = '')
	{
		$this->_element(__FUNCTION__, $onmouseout);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onmouseover()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onmouseover
	//
	//----------------------------------------------------------------------------------------------------
	public function onMouseOver($onmouseover = '')
	{
		$this->_element(__FUNCTION__, $onmouseover);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onmouseup()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onmouseup
	//
	//----------------------------------------------------------------------------------------------------
	public function onMouseUp($onmouseup = '')
	{
		$this->_element(__FUNCTION__, $onmouseup);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// onselect()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $onselect
	//
	//----------------------------------------------------------------------------------------------------
	public function onSelect($onselect = '')
	{
		$this->_element(__FUNCTION__, $onselect);
		
		return $this;
	}

	//----------------------------------------------------------------------------------------------------
	// value()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function value($value = '')
	{
		$this->_element(__FUNCTION__, $value);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// id()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $id
	//
	//----------------------------------------------------------------------------------------------------
	public function id($id = '')
	{
		$this->_element(__FUNCTION__, $id);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// attr()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $attr
	//
	//----------------------------------------------------------------------------------------------------
	public function attr($attr = array())
	{
		if( isset($this->settings['attr']) && is_array($this->settings['attr']) )
		{
			$settings = $this->settings['attr'];	
		}
		else
		{
			$settings = array();	
		}
		
		$this->settings['attr'] = array_merge($settings, $attr);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// checked()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  void
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function checked($checked = true)
	{
		if( $checked === true )
		{		
			$this->_element(__FUNCTION__, __FUNCTION__);
		}
	
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// selected()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  void
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function selected($selected = true)
	{
		if( $selected === true )
		{
			$this->_element(__FUNCTION__, __FUNCTION__);
		}
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// multiple()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  void
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function multiple($multiple = true)
	{
		if( $multiple === true )
		{
			$this->_element(__FUNCTION__, __FUNCTION__);
		}
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Setting Methods Bitiş
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Tag Methods Başlangıç
	//----------------------------------------------------------------------------------------------------

	//----------------------------------------------------------------------------------------------------
	// enctype()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $enctype
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function enctype($enctype = '')
	{
		$this->_element(__FUNCTION__, $enctype);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// method()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  string $method
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function method($method = '')
	{
		$this->_element(__FUNCTION__, $method);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// action()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $action
	//
	//----------------------------------------------------------------------------------------------------
	public function action($action = '')
	{
		$this->_element(__FUNCTION__, ( isUrl($action) ? $action : siteUrl($action) ));
		
		return $this;
	}

	//----------------------------------------------------------------------------------------------------
	// selectedKey()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $key
	//
	//----------------------------------------------------------------------------------------------------
	public function selectedKey($key = '')
	{
		$this->_element(__FUNCTION__, $key);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// selectedValue()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function selectedValue($value = '')
	{
		$this->_element(__FUNCTION__, $value);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// option()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed  $key
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function option($key = '', $value = '')
	{
		if( is_array($key) )
		{
			$this->settings['option'] = $key;	
		}
		else
		{
			$this->settings['option'][$key] = $value;
		}
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// type()
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type
	//
	//----------------------------------------------------------------------------------------------------
	public function type($type = '')
	{
		$this->_element(__FUNCTION__, $type);
		
		return $this;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Input Method Bitiş
	//----------------------------------------------------------------------------------------------------
}