<?php
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:11
 */

namespace Oli\MailServer\Entity;

interface IContact
{

	public function getName(): string;

	public function getEmail(): string;

}
