<?php
namespace ZN\Services;
 
interface NetInterface
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
	// Check DNS
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host
	// @param string $type
	//
	//----------------------------------------------------------------------------------------------------
	public function checkDns(String $host, String $type = 'MX') : Bool;
	
	//----------------------------------------------------------------------------------------------------
	// DNS Records
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host
	// @param string $type
	// @param bool   $raw
	//
	//----------------------------------------------------------------------------------------------------
	public function dnsRecords(String $host, String $type = 'any', Bool $raw = false) : \stdClass;
	
	//----------------------------------------------------------------------------------------------------
	// MX Records
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host
	//
	//----------------------------------------------------------------------------------------------------
	public function mxRecords(String $host) : \stdClass;
	
	//----------------------------------------------------------------------------------------------------
	// Socket
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host
	// @param int    $port
	// @param int    $timeout
	//
	//----------------------------------------------------------------------------------------------------
	public function socket(String $host, Int $port = -1, Int $timeout = 60);
	
	//----------------------------------------------------------------------------------------------------
	// Psocket
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host
	// @param int    $port
	// @param int    $timeout
	//
	//----------------------------------------------------------------------------------------------------
	public function psocket(String $host, Int $port = -1, Int $timeout = 60);
	
	//----------------------------------------------------------------------------------------------------
	// IP v4 To Host
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $ip
	//
	//----------------------------------------------------------------------------------------------------
	public function ipv4ToHost(String $ip) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Host To IP v4
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host
	//
	//----------------------------------------------------------------------------------------------------
	public function hostToIpv4(String $host) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Host To IP v4 List
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $host
	//
	//----------------------------------------------------------------------------------------------------
	public function hostToIpv4List(String $host) : Array;
	
	//----------------------------------------------------------------------------------------------------
	// Protocol Number
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function protocolNumber(String $name) : Int;
	
	//----------------------------------------------------------------------------------------------------
	// Protocol Name
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $number
	//
	//----------------------------------------------------------------------------------------------------
	public function protocolName(Int $number) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Service Port
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $service
	// @param string $protocol
	//
	//----------------------------------------------------------------------------------------------------
	public function servicePort(String $service, String $protocol) : Int;
	
	//----------------------------------------------------------------------------------------------------
	// Service Name
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int    $port
	// @param string $protocol
	//
	//----------------------------------------------------------------------------------------------------
	public function serviceName(Int $port, String $protocol) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Local
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function local() : String;
	
	//----------------------------------------------------------------------------------------------------
	// Rcode
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $code
	//
	//----------------------------------------------------------------------------------------------------
	public function rcode(Int $code = NULL);

	//----------------------------------------------------------------------------------------------------
	// Chr To Ip V4
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $chr
	//
	//----------------------------------------------------------------------------------------------------
	public function chrToIpv4(String $chr) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Ip v4 To Chr
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $addr
	//
	//----------------------------------------------------------------------------------------------------
	public function ipv4ToChr(String $addr) : String;
	
	//----------------------------------------------------------------------------------------------------
	// Ip v4 To Number
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $ip
	//
	//----------------------------------------------------------------------------------------------------
	public function ipv4ToNumber(String $ip) : Int;
	
	//----------------------------------------------------------------------------------------------------
	// Number To IP v4
	//----------------------------------------------------------------------------------------------------
	// 
	// @param int $numberAddress
	//
	//----------------------------------------------------------------------------------------------------
	public function numberToIpv4(Int $numberAddress) : String;
}