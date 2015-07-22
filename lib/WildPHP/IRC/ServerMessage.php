<?php

/*
	WildPHP - a modular and easily extendable IRC bot written in PHP
	Copyright (C) 2015 WildPHP

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
namespace WildPHP\IRC;

use Phergie\Irc\Parser as PhergieParser;
use InvalidArgumentException;

class ServerMessage implements IServerMessage
{

	protected $message;

	/**
	 * Create a parsed IRC message from string.
	 * @param string The string to be parsed.
	 * @throws InvalidArgumentException
	 */
	public function __construct($ircMessage)
	{
		if(!is_string($ircMessage))
			throw new InvalidArgumentException('ircMessage is of invalid type: expected string, got ' . gettype($ircMessage) . '.');

		$parser = new PhergieParser();
		$this->message = $parser->parse($ircMessage);
	}

	public function getMessage()
	{
		return $this->message['message'];
	}

	public function getCommand()
	{
		return $this->message['command'];
	}

	public function getParams()
	{
		return (array) $this->message['params'];
	}

	public function getPrefix()
	{
		return (string) $this->message['prefix'];
	}
	
	public function get()
	{
		return $this->message;
	}
}