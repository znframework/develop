<?php
namespace ZN\Database\Abstracts;

abstract class DriverAbstract
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
	// Config
	//----------------------------------------------------------------------------------------------------
	// 
	// @var array
	//
	//----------------------------------------------------------------------------------------------------
	protected $config;
	
	//----------------------------------------------------------------------------------------------------
	// Connect
	//----------------------------------------------------------------------------------------------------
	// 
	// @var callable
	//
	//----------------------------------------------------------------------------------------------------
	protected $connect;
	
	//----------------------------------------------------------------------------------------------------
	// Query
	//----------------------------------------------------------------------------------------------------
	// 
	// @var string
	//
	//----------------------------------------------------------------------------------------------------
	protected $query;

	//----------------------------------------------------------------------------------------------------
	// Connect
	//----------------------------------------------------------------------------------------------------
	// 
	// @param array $config
	//
	//----------------------------------------------------------------------------------------------------
	abstract public function connect($config);

	//----------------------------------------------------------------------------------------------------
	// Variable Types
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  void
	//
	//----------------------------------------------------------------------------------------------------
	public function vartypes()
	{
		return $this->variableTypes;
	}

	//----------------------------------------------------------------------------------------------------
	// Insert ID
	//----------------------------------------------------------------------------------------------------
	// 
	// @param  void
	//
	//----------------------------------------------------------------------------------------------------
	public function insertID(){}

	//----------------------------------------------------------------------------------------------------
	// Column Data
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $column
	//
	//----------------------------------------------------------------------------------------------------
	public function columnData($column){}

	//----------------------------------------------------------------------------------------------------
	// Num Rows
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function numRows(){}

	//----------------------------------------------------------------------------------------------------
	// Columns
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function columns(){}

	//----------------------------------------------------------------------------------------------------
	// Num Fields
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function numFields(){}

	//----------------------------------------------------------------------------------------------------
	// Real Escape String
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $data
	//
	//----------------------------------------------------------------------------------------------------
	public function realEscapeString($data){}

	//----------------------------------------------------------------------------------------------------
	// Error
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function error(){}

	//----------------------------------------------------------------------------------------------------
	// Fetch Array
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function fetchArray(){}

	//----------------------------------------------------------------------------------------------------
	// Fetch Assoc
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function fetchAssoc(){}

	//----------------------------------------------------------------------------------------------------
	// Fetch Row
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function fetchRow(){}

	//----------------------------------------------------------------------------------------------------
	// Affected Rows
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function affectedRows(){}

	//----------------------------------------------------------------------------------------------------
	// Close
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function close(){}

	//----------------------------------------------------------------------------------------------------
	// Version
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function version(){}
	
	//----------------------------------------------------------------------------------------------------
	// Result
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type
	//
	//----------------------------------------------------------------------------------------------------
	public function result($type = 'object')
	{
		if( empty($this->query) ) 
		{
			return false;
		}
		
		$rows = [];
		
		while( $data = $this->fetchAssoc() )
		{
 			if( $type === 'object' )
 			{
 				$data = (object)$data;
 			}
 			
 			$rows[] = $data;
		}
		
		return $rows;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Result Array
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function resultArray()
	{
		return $this->result('array');
	}

	//----------------------------------------------------------------------------------------------------
	// Row
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function row()
	{
		if( ! empty($this->query) )
		{
			$data = $this->fetchAssoc();
			
			return (object)$data;
		}
		else
		{
			return false;
		}
	}

	//----------------------------------------------------------------------------------------------------
	// Exec
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $query
	// @param array  $security
	//
	//----------------------------------------------------------------------------------------------------
	public function exec($query, $security = NULL){}

	//----------------------------------------------------------------------------------------------------
	// Exec Query
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $query
	// @param array  $security
	//
	//----------------------------------------------------------------------------------------------------
	public function multiQuery($query, $security = NULL){}

	//----------------------------------------------------------------------------------------------------
	// Query
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $query
	// @param array  $security
	//
	//----------------------------------------------------------------------------------------------------
	public function query($query, $security = NULL){}

	//----------------------------------------------------------------------------------------------------
	// Trans Start
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function transStart(){}

	//----------------------------------------------------------------------------------------------------
	// Trans Roll Back
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function transRollback(){}

	//----------------------------------------------------------------------------------------------------
	// Trans Commit
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function transCommit(){}
	 
	//----------------------------------------------------------------------------------------------------
	// Var Type
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $type
	// @param mixed  $len
	// @param bool   $output: true -> $len(id), false -> $len id  
	//
	//----------------------------------------------------------------------------------------------------
	private function cvartype($type = '', $len = '', $output = true)
	{
	 	if( $len === '' )
		{
			return " $type ";	
		}
		elseif( $output === true )
		{
			return " $type($len) ";	
		}
		else
		{
			return " $type $len ";		
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Operator
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $operator
	//
	//----------------------------------------------------------------------------------------------------
	public function operator($operator = 'like')
	{
		return isset( $this->operators[$operator] )
		       ? $this->operators[$operator]
			   : false;
	}

	//----------------------------------------------------------------------------------------------------
	// Statements
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $state
	// @param mixed  $len
	// @param bool   $output: true -> $len(id), false -> $len id  
	//
	//----------------------------------------------------------------------------------------------------
	public function statements($state = '', $len = '', $type = true)
	{
		if( isset( $this->statements[$state] ) )
		{
			if( strstr($this->statements[$state], '%') )
			{
				$vartype = str_replace('%', $len, $this->statements[$state]);
				
				return $this->cvartype($vartype);
			}
			
			return $this->cvartype($this->statements[$state], $len, $type);
		}
		else
		{
			return false;
		}
	}
	
	//----------------------------------------------------------------------------------------------------
	// Var Type
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $vartype
	// @param mixed  $len
	// @param bool   $output: true -> $len(id), false -> $len id  
	//
	//----------------------------------------------------------------------------------------------------
	public function variableTypes($vartype = '', $len = '', $type = true)
	{
		return isset( $this->variableTypes[$vartype] )
		       ? $this->cvartype($this->variableTypes[$vartype], $len, $type)
			   : false;
	}
}