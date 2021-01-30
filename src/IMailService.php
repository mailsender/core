<?php declare(strict_types = 1);

namespace Mailsender\Core;

use Mailsender\Core\Entity\IMail;

/**
 * Interface IMailService
 *
 * @package Mailsender\Core
 */
interface IMailService
{

	/**
	 * Create instance of entity IMail.
	 * @param string $mailTypeName
	 * @return IMail
	 * @throws \Mailsender\Core\Exceptions\CreateMailException
	 */
	public function create(string $mailTypeName): IMail;

	/**
	 * Return content of the e-mail.
	 * @param IMail $email
	 * @return string
	 */
	public function getContent(IMail $email): string;

	/**
	 * Create e-mail from json.
	 * @param string $json
	 * @return IMail
	 */
	public function createByJson(string $json): IMail;

	/**
	 * Create e-mail from ID.
	 * @param int $id
	 * @return IMail
	 */
	public function createById(int $id): IMail;

}
