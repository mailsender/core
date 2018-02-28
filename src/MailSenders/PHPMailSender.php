<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 28.02.2018
 * Time: 21:13
 */

namespace Mailsender\MailSet\MailSenders;

use Mailsender\Core\Entity\IMail;
use Mailsender\Core\IMailService;
use Mailsender\Core\MailSenders\IMailSender;
use PHPMailer\PHPMailer\PHPMailer;

class PHPMailSender implements IMailSender
{

	/**
	 * @var IMailService
	 */
	private $mailService;

	/**
	 * @var PHPMailer
	 */
	private $phpMailer;

	/**
	 * @var string
	 */
	private $host;

	/**
	 * @var int
	 */
	private $port;

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @var string
	 */
	private $password;

	/**
	 * @var string
	 */
	private $smtpSecure;

	/**
	 * PHPMailSender constructor.
	 * @param string $host
	 * @param int $port
	 * @param string $username
	 * @param string $password
	 * @param string $smtpSecure
	 * @param IMailService $mailService
	 * @param PHPMailer $phpMailer
	 */
	public function __construct(string $host, int $port, string $username, string $password, string $smtpSecure, IMailService $mailService, PHPMailer $phpMailer)
	{
		$this->host = $host;
		$this->port = $port;
		$this->username = $username;
		$this->password = $password;
		$this->smtpSecure = $smtpSecure;
		$this->mailService = $mailService;
		$this->phpMailer = $phpMailer;
	}

	/**
	 * Send created IMail entity.
	 * @param IMail $mail
	 */
	public function send(IMail $mail): void
	{
		$emailContent = $this->mailService->getContent($mail);

		try {
			//Server settings
			$this->phpMailer->SMTPDebug = 2;                 	// Enable verbose debug output
			$this->phpMailer->isSMTP();                      	// Set mailer to use SMTP
			$this->phpMailer->Host = $this->host;  				// Specify main and backup SMTP servers
			$this->phpMailer->SMTPAuth = true;               	// Enable SMTP authentication
			$this->phpMailer->Username = $this->username;    	// SMTP username
			$this->phpMailer->Password = $this->password;    	// SMTP password
			$this->phpMailer->SMTPSecure = $this->smtpSecure;	// Enable TLS encryption, `ssl` also accepted
			$this->phpMailer->Port = $this->port;            	// TCP port to connect to

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
//			$this->phpMailer->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			//Content
			$this->phpMailer->isHTML();
			$this->phpMailer->Subject = $mail->getSubject();

			$this->phpMailer->msgHTML($emailContent);

			$this->phpMailer->send();
			echo 'Message has been sent';
		} catch (\Exception $e) {
			echo 'Message could not be sent./n';
			echo $e->getMessage() . '/n';
			echo 'Mailer Error: ' . $this->phpMailer->ErrorInfo;
		}
	}

}
