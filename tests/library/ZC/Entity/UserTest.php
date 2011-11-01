<?php
namespace ZC\Entity;

class UserTest extends \ModelTestCase
{
	public function testCanCreateUser(){
		$this->assertInstanceOf('ZC\Entity\User', new User());
	}
}
