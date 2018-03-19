<?php

namespace App\Integrations;

use App\Support\Curl;

class TelegramIntegration {
	
	private $_token = "316263935:AAG6oSKRp-rgK8UdLGRX99Awf4W8yUH9Jjg";
	private $_chatId = "-200312641";
	private $_email = '';
	private $_phone = '';
	private $_additionalData = [];
	
	/**
	 * TelegramIntegration constructor.
	 *
	 * @param string $email
	 * @param string $phone
	 * @param array  $additionalData
	 */
	public function __construct($email = null, $phone = null, $additionalData = []) {
		$this->_email = $email;
		$this->_phone = $phone;
		$this->_additionalData = $additionalData;
	}
	
	private function _send($text) {
		$text = urlencode($text);
		$sendMessage = new Curl('POST', "https://api.telegram.org/bot$this->_token/sendMessage?chat_id=$this->_chatId&text=$text&parse_mode=HTML");
		$sendMessage->exec();
	}
	
	/**
	 * Send message to telegram chat from bot.
	 */
	public function sendMessage() {
		$text = "<b>New Lead Added!</b>\n";
		$text .= "Email: $this->_email\n";
		$text .= "Phone: $this->_phone\n";
		if (count($this->_additionalData) != 0) {
			foreach ($this->_additionalData as $key => $value) {
				$text .= "$key: $value\n";
			}
		}
		
		$this->_send($text);
	}
	
	public function sendFailedCallMessage($reason) {
		$text = "<b>Новый заказ звонка!</b>\n";
		$text .= "Автоматически дозвониться не удалось\n";
		$text .= "Причина - $reason\n";
		$text .= "Телефон: $this->_phone";
		
		$this->_send($text);
	}
	
	public function sendSuccessCallMessage() {
		$text = "<b>Новый заказ звонка!</b>\n";
		$text .= "Автоматический дозвон.\n";
		$text .= "Телефон: $this->_phone";
		
		$this->_send($text);
	}
}
