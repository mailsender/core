<?php declare(strict_types = 1);

namespace Mailsender\Core\MailSenders;

use Mailsender\Core\Entity\IMail;
use Mailsender\Core\Exceptions\CreateMailException;
use Mailsender\Core\IMailTypeService;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class PHPMailSender
 * Copyright (c) 2017 Sportisimo s.r.o.
 *
 * @package Mailsender\Core\MailSenders
 */
class PHPMailSender implements IMailSender
{

	/**
	 * @var PHPMailer
	 */
	private PHPMailer $phpMailer;

	/**
	 * @var string
	 */
	private string $host;

	/**
	 * @var int
	 */
	private int $port;

	/**
	 * @var string
	 */
	private string $username;

	/**
	 * @var string
	 */
	private string $password;

	/**
	 * @var string
	 */
	private string $smtpSecure;

	/**
	 * PHPMailSender constructor.
	 * @param string $host
	 * @param int $port
	 * @param string $username
	 * @param string $password
	 * @param string $smtpSecure
	 */
	public function __construct(string $host, int $port, string $username, string $password, string $smtpSecure)
	{
		$this->host = $host;
		$this->port = $port;
		$this->username = $username;
		$this->password = $password;
		$this->smtpSecure = $smtpSecure;
		$this->phpMailer = new PHPMailer(true);
	}

  /**
   * Send created IMail entity.
   *
   * @param IMail                                  $mail
   * @param \Mailsender\Core\IMailTypeService|null $mailType
   *
   * @throws \Mailsender\Core\Exceptions\CreateMailException
   * @throws \PHPMailer\PHPMailer\Exception
   */
	public function send(IMail $mail, ?IMailTypeService $mailType = null): void
	{
	  if($mailType !== null)
	  {
	    $emailContent = $mailType->getContent($mail);
	  }
	  else
    {
      throw new CreateMailException('Second parametr ($mailType) is necessery to build content of the mail.');
    }

		//Server settings
		$this->phpMailer->SMTPDebug = 0;                 	// Enable verbose debug output
		$this->phpMailer->isSMTP();                      	// Set mailer to use SMTP
		$this->phpMailer->Host = $this->host;  				// Specify main and backup SMTP servers
		$this->phpMailer->SMTPAuth = true;               	// Enable SMTP authentication
		$this->phpMailer->Username = $this->username;    	// SMTP username
		$this->phpMailer->Password = $this->password;    	// SMTP password
		$this->phpMailer->SMTPSecure = $this->smtpSecure;	// Enable TLS encryption, `ssl` also accepted
		$this->phpMailer->Port = $this->port;            	// TCP port to connect to
		$this->phpMailer->CharSet = $mail->getCharset();

		//Recipients
		$this->phpMailer->setFrom($mail->getSender()->getEmail(), $mail->getSender()->getName());

		// TODO: budeme posilat jeden mail vzdy na jednu mailovou adresu?
		$this->phpMailer->addAddress($mail->getRecipient()->getEmail(), $mail->getRecipient()->getName());		// Add a recipient
		// TODO: Kopie se nebudou nikdy posilat? Mame jen skryté kopie.
		foreach ($mail->getBccRecipients() as $bccRecipient)
		{
			$this->phpMailer->addBCC($bccRecipient->getEmail());
		}

		//Attachments
		foreach ($mail->getAttachments() as $attachment)
		{
			$this->phpMailer->addAttachment($attachment->getPath() . '/' . $attachment->getFileName());		// Add attachments
		}
		// TODO: Budeme chtit prejmenovavat prilohy?
//		$this->phpMailer->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		//Content
		$this->phpMailer->isHTML();
		$this->phpMailer->Subject = $mail->getSubject() ?? '';

		$this->phpMailer->msgHTML($emailContent);

		$this->phpMailer->send();
		foreach ($mail->getAttachments() as $attachment)
		{
			if($attachment->isDeleteAfterSend())
			{
				unlink($attachment->getPath() . '/' . $attachment->getFileName());
			}
		}
	}

}
