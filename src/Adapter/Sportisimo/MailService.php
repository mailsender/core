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
use Mailsender\MailSet\IMailService;
use Mailsender\MailSet\IMailTypeRepository;
use Mailsender\MailSet\ISenderAdapter;

final class MailService implements IMailService
{

	/**
	 * @var ISenderAdapter
	 */
	private $senderAdapter;

	/**
	 * @var IMailTypeRepository
	 */
	private $databaseAdapter;

	/**
	 * MailService constructor.
	 * @param ISenderAdapter $senderAdapter
	 * @param IMailTypeRepository $databaseAdapter
	 */
	public function __construct(ISenderAdapter $senderAdapter, IMailTypeRepository $databaseAdapter)
	{
		$this->senderAdapter = $senderAdapter;
		$this->databaseAdapter = $databaseAdapter;
	}

	/**
	 * Create instance of entity IMail.
	 * @param string $mailTypeName
	 * @param string|null $json
	 * @return IMail
	 */
	public function create(string $mailTypeName, ?string $json = null): IMail
	{
		$mail = new Mail();
		if($json === null)
		{
			$mailType = $this->databaseAdapter->fetchMailTypeByName($mailTypeName);
			$mail->setMailType($mailType);
		}
		else
		{
			$mail->setJson($json);
		}


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
