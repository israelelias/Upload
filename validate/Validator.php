<?php

abstract class Validator {

	protected function getConfiguration() {
		return Holder::getConfig();
	}

}