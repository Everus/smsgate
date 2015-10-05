<?php

namespace Everus\SMScGate\Message;

class message
{
	private $id;
	private $cost;
	// текст сообщения
	private $text;
	// список телефонов
	private $phones = array();
	// формат сообщения (0 - обычное sms, 1 - flash-sms, 2 - wap-push, 3 - hlr, 4 - bin, 5 - bin-hex, 6 - ping-sms, 7 - mms, 8 - mail, 9 - call)
	private $formats = array(
		1 => "flash=1", 
		"push=1", 
		"hlr=1", 
		"bin=1", 
		"bin=2", 
		"ping=1", 
		"mms=1", 
		"mail=1", 
		"call=1");
	private $format;
	// $time - необходимое время доставки в виде строки (DDMMYYhhmm, h1-h2, 0ts, +m)
	private $time;
	private $query;

	public function getPhones()
	{
		return $this->phones;
	}

	public function setPhones($phones)
	{
		$this->phones=$phones;
	}

	public function addPhone($phone)
	{
		$this->phones[] = $phone;
	}

	public function deletePhone($phone)
	{
		foreach ($this->phones as $key => $value) {
			if($value === $phone) {
				unset($this->phones[$key]);
				break;
			}
		}
	}

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

	public function getCost()
	{
		return $this->cost;
	}

	public function setCost($cost)
	{
		$this->cost = $cost;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}
}