<?php
/** 
 * @version 1.0.0
 */

add_filter( 'woocommerce_email_customer_details_fields', 'lpb_email_with_extra_fields', 10, 3 );
function lpb_email_with_extra_fields ( $fields, $sent_to_admin, $order ) {
	$order_id = $order->get_id();
	$extra_fields = array(
		'Celular' => 'billing_cellphone',
		'CPF' => 'billing_cpf',
		'RG' => 'billing_rg',
		'CNPJ' => 'billing_cnpj',
		'Razão Social' => 'billing_company',
		'Inscrição Estadual' => 'billing_ie',
		'Data de Nascimento' => 'billing_birthdate',
		'Sexo' => 'billing_sex',
	);

	$person_type = intval( get_post_meta( $order_id, '_billing_persontype', true ) );

	foreach( $extra_fields as $label => $id ) {
		if ( $person_type === 1 ) {
			if ( $id === 'billing_cnpj') continue;
			if ( $id === 'billing_company' ) continue;
			if ( $id === 'billing_ie' ) continue;
		} elseif ( $person_type === 2 ) {
			if ( $id === 'billing_cpf') continue;
			if ( $id === 'billing_rg') continue;
		}

		$value = get_post_meta( $order_id, '_' . $id, true );
		
		if ( ! empty( $value ) ) {
			$fields[] = array(
				'label' => $label,
				'value' => esc_html( $value )
			);
		}
	}
	
	return $fields;
}
