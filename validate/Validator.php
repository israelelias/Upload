<?php

/**
 * Classe abstrata onde possui todos os métodos comum de validação
 */
abstract class Validator {

	protected function getConfiguration() {
		return Holder::getConfig();
	}

}