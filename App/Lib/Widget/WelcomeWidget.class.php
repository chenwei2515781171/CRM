<?php 

class WelcomeWidget extends Widget 
{
	public function render($data)
	{
		if(C('ismobile')){
			return $this->renderFile ("m_index");
		}else{
			return $this->renderFile ("index");
		}
	}
}