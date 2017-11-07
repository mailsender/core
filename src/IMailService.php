<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:32
 */

namespace Oli\MailServer;

use Oli\MailServer\Entity\IMail;

interface IMailService
{

	/**
	 * Create instance of entity IMail.
	 * @param string $name
	 * @param string|null $json
	 * @return IMail
	 */
	public function create(string $name, ?string $json = null): IMail;

	/**
	 * Send created IMail entity to Sender object.
	 * @param IMail $mail
	 */
	public function send(IMail $mail): void;

}
