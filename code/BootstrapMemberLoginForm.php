<?php

class BootstrapMemberLoginForm extends MemberLoginForm {


	public function __construct($controller = null, $name = null, $fields = null, $actions = null, $checkCurrentUser = true) {
		if(!$controller) $controller = Controller::curr();
		if(!$name) $name = "LoginForm";
		parent::__construct($controller, $name, $fields, $actions, $checkCurrentUser);
		$this->Fields()->bootstrapify();
		$this->Actions()->bootstrapify();
		foreach($this->Actions() as $act)
		{
			if($act->getAttribute('type') == 'submit')
				$act->setStyle('primary');
		}
		$this->setTemplate("BootstrapForm");

		$this->invokeWithExtensions('updateBoostrapMemberLoginForm', $this);
	}

}