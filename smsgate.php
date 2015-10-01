<?php

namespace Everus\SMScGate\Transport;

class httpTransport 
{
	const DEFAUL_CHARSET = 'windows-1251';

	private $login;
	private $password;
	// кодировка
	private $charset;

	public function __construct($login, $password, $charset = DEFAUL_CHARSET) 
	{
		$this->login = $login;
		$this->password = $password;
		$this->charset = $charset;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function setLogin($login)
	{
		$this->login = $login;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getCharset()
	{
		return $this->charset;
	}

	public function setCharset($charset)
	{
		$this->charset = $charset;
	}
}