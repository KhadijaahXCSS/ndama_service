<?php
declare( strict_types=1 );

namespace Automattic\WooCommerce\GoogleListingsAndAds\DB\Table;

use Automattic\WooCommerce\GoogleListingsAndAds\DB\Table;
use DateTime;

defined( 'ABSPATH' ) || exit;

/**
 * Class MerchantIssueTable
 *
 * @package Automattic\WooCommerce\GoogleListingsAndAds\DB\Tables
 */
class MerchantIssueTable extends Table {

	/**
	 * Get the schema for the DB.
	 *
	 * This should be a SQL string for creating the DB table.
	 *
	 * @return string
	 */
	protected function get_install_query(): string {
		return "
CREATE TABLE `{$this->get_sql_safe_name()}` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `product_id` bigint(20) NOT NULL,
    `issue` varchar(200) NOT NULL,
    `code` varchar(100) NOT NULL,
    `severity` varchar(20) NOT NULL DEFAULT 'warning',
    `product` varchar(100) NOT NULL,
    `action` text NOT NULL,
    `action_url` varchar(1024) NOT NULL,
    `applicable_countries` text NOT NULL,
    `source` varchar(10) NOT NULL DEFAULT 'mc',
    `type` varchar(10) NOT NULL DEFAULT 'product',
    `created_at` datetime NOT NULL,
    PRIMARY KEY `id` (`id`)
) {$this->get_collation()};
";
	}

	/**
	 * Get the un-prefixed (raw) table name.
	 *
	 * @return string
	 */
	public static function get_raw_name(): string {
		return 'merchant_issues';
	}

	/**
	 * Delete stale issue records.
	 *
	 * @param DateTime $created_before Delete all records created before this.
	 */
	public function delete_stale( DateTime $created_before ): void {
		$query = "DELETE FROM `{$this->get_sql_safe_name()}` WHERE `created_at` < '%s'";
		$this->wpdb->query( $this->wpdb->prepare( $query, $created_before->format( 'Y-m-d H:i:s' ) ) ); // phpcs:ignore WordPress.DB.PreparedSQL
	}

	/**
	 * Delete product issues for specific products and source.
	 *
	 * @param array  $products_ids Array of product IDs to delete issues for.
	 * @param string $source       The source of the issues. Default is 'mc'.
	 */
	public function delete_specific_product_issues( array $products_ids, string $source = 'mc' ): void {
		if ( empty( $products_ids ) ) {
			return;
		}

		$placeholder = '(' . implode( ',', array_fill( 0, count( $products_ids ), '%d' ) ) . ')';
		$this->wpdb->query( $this->wpdb->prepare( "DELETE FROM `{$this->get_sql_safe_name()}` WHERE `product_id` IN {$placeholder} AND `source` = %s", array_merge( $products_ids, [ $source ] ) ) ); // phpcs:ignore WordPress.DB.PreparedSQL
	}

	/**
	 * Get the columns for the table.
	 *
	 * @return array
	 */
	public function get_columns(): array {
		return [
			'id'                   => true,
			'product_id'           => true,
			'code'                 => true,
			'severity'             => true,
			'issue'                => true,
			'product'              => true,
			'action'               => true,
			'action_url'           => true,
			'applicable_countries' => true,
			'source'               => true,
			'type'                 => true,
			'created_at'           => true,
		];
	}
}
