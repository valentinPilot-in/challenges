<?php

namespace ACA\WC\Editing\ProductVariation;

use AC\Helper\Select\Option;
use AC\Request;
use AC\Type\ToggleOptions;
use ACP;
use WC_Product_Variation;

class Enabled implements ACP\Editing\Service {

	public function get_view( $context ) {
		return new ACP\Editing\View\Toggle(
			new ToggleOptions( new Option( 'private' ), new Option( 'publish' ) )
		);
	}

	public function get_value( $id ) {
		$variation = new WC_Product_Variation( $id );

		return $variation->get_status();
	}

	public function update( Request $request ) {
		$variation = new WC_Product_Variation( $request->get( 'id' ) );
		$variation->set_status( $request->get( 'value' ) );

		return $variation->save() > 0;
	}

}