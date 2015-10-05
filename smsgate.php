<?php

namespace Everus\SMScGate\Transport;

class httpTransport 
{
	const DEFAUL_CHARSET = 'windows-1251';
	const PROTOCOL = 'http';
	const HOST = 'smsc.ru/sys/';

	private $login;
	private $password;
	// кодировка
	private $charset;
	private $balance = null;

	public function __construct($login, $password, $charset = httpTransport::DEFAUL_CHARSET)
	{
		$this->login = $login;
		$this->password = $password;
		$this->charset = $charset;
	}

	public function ensureBalance()
	{
		if($this->balance === null){
			$queryBuilder = new httpQueryBuilder();
			$queryBuilder->setProtocol(httpTransport::PROTOCOL)
				->setCmd('balance.php')
				->setHost(httpTransport::HOST)
				->addArg('login', $this->login)
				->addArg('psw', $this->password);
			$query = $queryBuilder->getQuery();
			$answer = $this->executeQuery($query);
			$this->balance = $answer['balance'];
		}
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

	public function getBalance()
	{
		$this->ensureBalance();
		return $this->balance;
	}

	private function executeQuery($query)
	{
		$response = '';
		return json_decode($response, true);
	}
}