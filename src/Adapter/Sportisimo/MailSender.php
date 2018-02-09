<?php
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 01.01.2018
 * Time: 10:32
 */

namespace Mailsender\MailSet\Adapter\Sportisimo;

use Mailsender\MailSet\Entity\IMail;
use Mailsender\MailSet\IMailSender;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Class KlerkSender
 * @package Mailsender\MailSet\Adapter\Sportisimo
 */
class MailSender implements IMailSender
{

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
	 * KlerkSender constructor.
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
	}

	public function send(IMail $mail): void
	{
		$mailer = new PHPMailer(true);
		try {
			//Server settings
			$mailer->SMTPDebug = 2;                 														// Enable verbose debug output
			$mailer->isSMTP();                      														// Set mailer to use SMTP
			$mailer->Host = $this->host;  																	// Specify main and backup SMTP servers
			$mailer->SMTPAuth = true;               														// Enable SMTP authentication
			$mailer->Username = $this->username;    														// SMTP username
			$mailer->Password = $this->password;    														// SMTP password
			$mailer->SMTPSecure = $this->smtpSecure;														// Enable TLS encryption, `ssl` also accepted
			$mailer->Port = $this->port;            														// TCP por										t to connect to

			//Recipients
			$mailer->setFrom($mail->getSender()->getEmail(), $mail->getSender()->getName());

			// TODO: budeme posilat jeden mail vzdy na jednu mailovou adresu?
			$mailer->addAddress($mail->getRecipient()->getEmail(), $mail->getRecipient()->getName());		// Add a recipient
			// TODO: Kopie se nebudou nikdy posilat? Mame jen skryté kopie.
			foreach ($mail->getBccRecipients() as $bccRecipient)
			{
				$mailer->addBCC($bccRecipient->getEmail());
			}

			//Attachments
			foreach ($mail->getAttachments() as $attachment)
			{
				$mailer->addAttachment($attachment->getPath() . '/' . $attachment->getFileName());		// Add attachments

			}
			// TODO: Budeme chtit prejmenovavat prilohy?
//			$mailer->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			//Content
			$mailer->isHTML();                                  // Set email format to HTML
			$mailer->Subject = $mail->getSubject();

			// TODO: Vytvorit zpravu z latte sablony.
			$latte = '<h1>Ahoj babi</h1>';
			$mailer->msgHTML($latte);

			$mailer->send();
			echo 'Message has been sent';
		} catch (\Exception $e) {
			echo 'Message could not be sent./n';
			echo $e->getMessage() . '/n';
			echo 'Mailer Error: ' . $mailer->ErrorInfo;
		}
	}

}
