<?php 
namespace ZN\Services;

interface CURLInterface
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
	// Init
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $url
	//
	//----------------------------------------------------------------------------------------------------
	public function init(String $url = NULL);
	
	//----------------------------------------------------------------------------------------------------
	// Exec
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function exec();
	
	//----------------------------------------------------------------------------------------------------
	// Escape
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $url
	//
	//----------------------------------------------------------------------------------------------------
	public function escape(String $str);
	
	//----------------------------------------------------------------------------------------------------
	// Unescape
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $url
	//
	//----------------------------------------------------------------------------------------------------
	public function unescape(String $str);
	
	//----------------------------------------------------------------------------------------------------
	// Info
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $opt
	//
	//----------------------------------------------------------------------------------------------------
	public function info(String $opt);
	
	//----------------------------------------------------------------------------------------------------
	// Error
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function error();
	
	//----------------------------------------------------------------------------------------------------
	// Errno
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function errno();

	//----------------------------------------------------------------------------------------------------
	// Pause
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $bitmask
	//
	//----------------------------------------------------------------------------------------------------
	public function pause(Int $bitmask = 0);
	
	//----------------------------------------------------------------------------------------------------
	// Reset
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function reset();
	
	//----------------------------------------------------------------------------------------------------
	// Option
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $options
	// @param mixed  $value
	//
	//----------------------------------------------------------------------------------------------------
	public function option(String $options, $value);
	
	//----------------------------------------------------------------------------------------------------
	// Close
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function close();

	//----------------------------------------------------------------------------------------------------
	// Errval
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $errno
	//
	//----------------------------------------------------------------------------------------------------
	public function errval(Int $errno = 0);
	
	//----------------------------------------------------------------------------------------------------
	// Version
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $errno
	//
	//----------------------------------------------------------------------------------------------------
	public function version($data = NULL);
}