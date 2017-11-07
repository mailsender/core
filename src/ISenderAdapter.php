<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:40
 */

namespace Mailsender\MailSet;

use Mailsender\MailSet\Entity\IMail;

interface ISenderAdapter
{

	public function send(IMail $mail): void;

}
