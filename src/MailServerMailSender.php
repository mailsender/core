<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 05.11.2017
 * Time: 18:29
 */

namespace Mailsender\MailSet;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\RequestOptions;
use Mailsender\MailSet\Entity\IMail;

class MailServerMailSender implements IMailSender
{

	/**
	 * @var string
	 */
	private $baseUri;

	/**
	 * @var int
	 */
	private $port;

	/**
	 * @var string
	 */
	private $userName;

	/**
	 * @var string
	 */
	private $password;

	/**
	 * MailServerAdapter constructor.
	 * @param string $baseUri
	 * @param int $port
	 * @param string $userName
	 * @param string $password
	 */
	public function __construct(string $baseUri, ?int $port = null, string $userName = '', string $password = '')
	{
		// TODO: Prejmenovat ipAddress na baseUri v dokumentaci
		$this->baseUri = $baseUri;
		$this->port = $port;
		$this->userName = $userName;
		$this->password = $password;
	}

	/**
	 * Sends e-mail data from application to print server.
	 * @param IMail $mail
	 * @param string $uri
	 * @throws ServerException
	 * @throws ClientException
	 * @throws ConnectException
	 * @throws \InvalidArgumentException
	 */
	public function send(IMail $mail, string $uri = ''): void
	{
		$baseUri = $this->port !== null ? $this->baseUri . ':' . $this->port : $this->baseUri;
		$client = new Client(['base_uri' => $baseUri]);
		$client->postAsync(
			$uri, [
			'auth' => [
				$this->userName,
				$this->password,
			],
			RequestOptions::JSON => \GuzzleHttp\json_encode($mail, JSON_FORCE_OBJECT),
		]
		);
	}
}
