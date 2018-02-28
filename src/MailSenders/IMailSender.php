<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:40
 */

namespace Mailsender\Core\MailSenders;

use Mailsender\Core\Entity\IMail;

interface IMailSender
{

	/**
	 * Send created IMail entity.
	 * @param IMail $mail
	 */
	public function send(IMail $mail): void;

}
