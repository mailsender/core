<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:37
 */

namespace Mailsender\MailSet\Adapter\Sportisimo;

use Mailsender\MailSet\Adapter\Sportisimo\Entity\Mail;
use Mailsender\MailSet\Entity\IMail;
use Mailsender\MailSet\IDatabaseAdapter;
use Mailsender\MailSet\IMailService;
use Mailsender\MailSet\ISenderAdapter;
use Ramsey\Uuid\Uuid;

final class MailService implements IMailService
{

	/**
	 * @var ISenderAdapter
	 */
	private $senderAdapter;

	/**
	 * @var IDatabaseAdapter
	 */
	private $databaseAdapter;

	/**
	 * MailService constructor.
	 * @param ISenderAdapter $senderAdapter
	 * @param IDatabaseAdapter $databaseAdapter
	 */
	public function __construct(ISenderAdapter $senderAdapter, IDatabaseAdapter $databaseAdapter)
	{
		$this->senderAdapter = $senderAdapter;
		$this->databaseAdapter = $databaseAdapter;
	}

	/**
	 * Create instance of entity IMail.
	 * @param string $name
	 * @param string|null $json
	 * @return IMail
	 */
	public function create(string $name, ?string $json = null): IMail
	{
		if($json !== null)
		{
			$mailType = $this->databaseAdapter->fetchMailTypeByName($name);
		}
		else
		{
			$mailType = json_decode($json);
		}

		$mail = new Mail();
		$mail->setMailType($mailType);
		$mail->setSender($mailType->getSender());
		$mail->setSubject($mailType->getSubject());
		$mail->setAttachments($mailType->getAttachments());
		$mail->setBccRecipients($mailType->getBccRecipients());
		$mail->setCharset($mailType->getCharset());
		$mail->setDateCreated(new \DateTime());
		$mail->setHashcode(md5(Uuid::uuid4()));

		return $mail;
	}

	/**
	 * Send created IMail entity to Sender object.
	 * @param IMail $mail
	 */
	public function send(IMail $mail): void
	{
		$this->senderAdapter->send($mail);
	}
}
