<?php

namespace ACA\WC\ListScreen;

use ACP;

class Product extends ACP\ListScreen\Post {

	public function __construct() {
		parent::__construct( 'product' );

		$this->set_group( 'woocommerce' );
	}

	protected function register_column_types() {
		parent::register_column_types();

		$this->register_column_types_from_dir( 'ACA\WC\Column\Product' );
	}

}