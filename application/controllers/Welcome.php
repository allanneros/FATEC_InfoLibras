<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$sessao = lerSessaoAtual();

		if ($sessao) {
			redirect(base_url() . index_page() . '/inicio');

		} else {
			$this->load->view('welcome_message');

		}
	}
}
