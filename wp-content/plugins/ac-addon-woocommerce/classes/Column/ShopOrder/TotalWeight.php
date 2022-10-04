<?php

namespace ACA\WC\Column\ShopOrder;

use AC;
use ACA\WC\Search;
use ACA\WC\Sorting;
use ACP;
use WC_Order_Item_Product;

/**
 * @since 3.0
 */
class TotalWeight extends AC\Column implements ACP\Search\Searchable, ACP\Sorting\Sortable {

	public function __construct() {
		$this->set_type( 'column-wc-order_weight' );
		$this->set_label( __( 'Total Order Weight', 'codepress-admin-columns' ) );
		$this->set_group( 'woocommerce' );
	}

	public function get_value( $id ) {
		$weight = $this->get_raw_value( $id );

		if ( ! $weight ) {
			return $this->get_empty_char();
		}

		return sprintf( '%s %s', wc_format_decimal( $weight ), get_option( 'woocommerce_weight_unit' ) );
	}

	public function get_raw_value( $id ) {
		$total_weight = 0;

		foreach ( wc_get_order( $id )->get_items() as $item ) {
			if ( ! $item instanceof WC_Order_Item_Product || ! $item->get_product() ) {
				continue;
			}

			$weight = (int) $item->get_quantity() * (float) $item->get_product()->get_weight();
			$total_weight += $weight;
		}

		return $total_weight;
	}

	public function sorting() {
		return new Sorting\ShopOrder\OrderWeight();
	}

	public function search() {
		return new Search\ShopOrder\OrderWeight();
	}

}