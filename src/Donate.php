<?php

require __DIR__.'/../vendor/stripe/stripe-php/lib/Stripe.php';

use Ship\View;

class Donate {

	protected $config;

	protected $log;

	protected $mailer;

	public function __construct($config, $log, $mailer) {
		$this->config = $config;
		$this->log = $log;
		$this->mailer = $mailer;
	}

	public function charge($token, $amount, $email) {
		try {
			Stripe::setApiKey($this->config->get('stripe.private'));

			$charge = Stripe_Charge::create(array(
				"amount" => $amount,
				"currency" => "usd",
				"card" => $token,
				"description" => "donation"
			));

			$this->notice($amount, $email);

			return true;
		}
		catch(Exception $e) {
			$this->log->addError($e->getMessage());

			return false;
		}
	}

	public function notice($amount, $email) {
		$html = new View(__DIR__ . '/../app/views/emails/donation.phtml');
		$plain = new View(__DIR__ . '/../app/views/emails/donation-text.phtml');

		$message = Swift_Message::newInstance()
			->setSubject('Thank you for contributing to Anchor CMS')
			->setFrom(array('hi@anchorcms.com' => 'Anchor CMS'))
			->setTo(array($email))
			->setBody($plain->render())
			->addPart($html->render(), 'text/html');

		$this->mailer->send($message);
	}

	public function validate(array $input) {
		if(false === filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
			return 'Invalid email address';
		}

		$options = array(
			'options' => array(
				'default' => 0,
				'min_range' => 0,
			)
		);

		if(false === filter_var($input['amount'], FILTER_VALIDATE_INT, $options)) {
			return 'Invalid amount';
		}

		if('' === $input['amount'] or $input['amount'] < 1) {
			return 'Amount must be more than 1';
		}

		return '';
	}

}