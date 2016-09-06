<?php
class App {
	public $data;
	public $Request;
	public $request_page;
	public $landing_page;
	public $index_page;
	public $non_index_page;
	public $html_page;
	public $menu_highlight;

	private $_require_login;

	
	function __construct() {
		$this->Request = new Request;
		$this->html_page = [
				'layout' => 'default',
				'title'  => 'MVRC',
				'plugin_css'  => [],
				'custom_css'  => [],
				'plugin_js'   => [],
				'custom_js'   => [],
			];
		$this->menu_highlight = [];
		$this->_require_login = true;


		$this->renderAbortPage();

		$this->landing_page 	= getPath('landing_page') . $this->Request->route . '.php';
		$this->index_page 		= getPath('rc') . $this->Request->route . DS . 'index.php';
		$this->non_index_page 	= getPath('rc') . $this->Request->route . '.php';


		if ( $this->Request->route == '/' && file_exists(getPath('landing_page') . DS . 'index.php') ) {
			$this->_require_login 	= false;

			$this->request_page 	= getPath('landing_page') . DS . 'index.php';
			$this->view_path 		= getPath('view') . DS . 'landing_page' . DS . 'index.view.php';
		}
		else if ( file_exists($this->landing_page) ) {
			$this->_require_login 	= false;

			$this->request_page 	= $this->landing_page;
			$this->view_path 		= getPath('view') . DS . 'landing_page' . $this->Request->route . '.view.php';
		}
		else if ( file_exists($this->index_page) ) {
			$this->request_page = $this->index_page;
			$this->view_path 	= getPath('view') . $this->Request->route . DS . 'index.view.php';
		}
		else if ( file_exists($this->non_index_page) ) {
			$this->request_page = $this->non_index_page;
			$this->view_path 	= getPath('view') . $this->Request->route . '.view.php';
		}
	}

	public function run() {
		$this->_beforeHandleRequest();
		require_once $this->request_page;
		$this->renderView();
	}

	private function _beforeHandleRequest() {
		if ( $this->_require_login && ! Session::isLogin() ) {
			if ( ! $this->Request->is('get') && strcasecmp('/login', $this->Request->route) == 0 ) redirect('/login');
			$this->renderLoginPage();
		}

		if ( Session::has('post') ) {
			$this->data['post'] = Session::get('post');
			Session::delete('post');
		}
	}

	public function renderView() {
		require_once getPath('view') . DS . 'layout' . DS . $this->html_page['layout'] . DS . 'header.php';
		require_once $this->view_path;
		require_once getPath('view') . DS . 'layout' . DS . $this->html_page['layout'] . DS . 'footer.php';
	}

	public function render($view_path) {
		require_once getPath('view') . DS . 'layout' . DS . $this->html_page['layout'] . DS . 'header.php';
		require_once getPath('view') . DS . trim($view_path, '/') . '.view.php';
		require_once getPath('view') . DS . 'layout' . DS . $this->html_page['layout'] . DS . 'footer.php';
		die();
	}

	public function renderAbortPage() {
		$this->request_page = abort();
		$this->view_path = getPath('view') . DS . 'landing_page' . DS . 'abort.view.php';
	}

	public function renderLoginPage() {
		$this->request_page = $this->request_page = getPath('landing_page') . DS . 'login.php';
		$this->view_path = getPath('view') . DS . 'landing_page' . DS . 'login.view.php';
	}

}
?>
