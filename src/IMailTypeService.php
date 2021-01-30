<?php declare(strict_types = 1);

namespace Mailsender\Core;

use Mailsender\Core\Entity\IMail;

/**
 * Interface IMailTypeService
 *
 * @package Mailsender\Core
 */
interface IMailTypeService
{

  /**
   * Return content of the e-mail.
   *
   * @param IMail $email
   *
   * @return string
   */
  public function getContent(IMail $email): string;

}
