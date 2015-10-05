<?php

namespace Everus\SMScGate\Transport;


class httpQueryBuilder
{
    private $host;
    private $args = array();
    private $query;
    private $cmd;
    private $protocol = 'http';

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    public function getCmd()
    {
        return $this->cmd;
    }

    public function setCmd($cmd)
    {
        $this->cmd = $cmd;
        return $this;
    }

    public function addArg($key, $value)
    {
        $this->args[$key] = $value;
        return $this;
    }

    public function getArgs()
    {
        return $this->args;
    }

    public function prepareArgs()
    {
        $argsString = '';
        foreach($this->args as $key => $value) {
            $argsString .= (($argsString === '') ? '' : '&').$key.'='.urlencode($value);
        }
        return $argsString;
    }

    public function getQuery()
    {
        $this->buildQuery();
        return $this->query;
    }

    private function buildQuery()
    {
        $this->query = $this->protocol.'://'.$this->host.$this->cmd.'?'.$this->prepareArgs();
    }

    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }
}