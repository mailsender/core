<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:32
 */

namespace Mailsender\Core;

use Mailsender\Core\Entity\IMail;

interface IMailService
{

	/**
	 * Create instance of entity IMail.
	 * @param string $mailTypeName
	 * @return IMail
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
