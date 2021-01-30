<?php declare(strict_types = 1);

namespace Mailsender\Core\MailSenders;

use Mailsender\Core\Entity\IMail;
use Mailsender\Core\IMailTypeService;

/**
 * Interface IMailSender
 *
 * @package Mailsender\Core\MailSenders
 */
interface IMailSender
{

  /**
   * Send created IMail entity.
   *
   * @param IMail                                  $mail
   * @param \Mailsender\Core\IMailTypeService|null $mailType
   */
	public function send(IMail $mail, ?IMailTypeService $mailType = null): void;

}
