<?php
defined('ABSPATH') or die("you do not have access to this page!");
add_filter( 'cmplz_pages_load_types', 'cmplz_filter_dataleak_pages_1', 10, 1 );
function cmplz_filter_dataleak_pages_1( $pages ) {
	$regions = cmplz_get_regions_by_dataleak_type(1);
	foreach ($regions as $region) {
		$pages[$region]['dataleak']['document_elements'] = array(
			array(
				'content' => cmplz_sprintf(_x('Date: %s', 'Legal document dataleak', 'complianz-gdpr'), '[publish_date]'),
			),
			array(
				'content' => _x('RE: Information regarding personal data breaches', 'Legal document dataleak', 'complianz-gdpr'),
			),
			array(
				'content' => _x('Dear Sir/Madam,', 'Legal document dataleak', 'complianz-gdpr'),
			),
			array(
				'content' => _x('With this letter, I would like to inform you of a recently discovered security incident in our organization.', 'Legal document dataleak', 'complianz-gdpr'),
			),
			array(
				'content' => _x('In that incident, personal data was lost and there is no current back-up copy of that personal data.', 'Legal document dataleak', 'complianz-gdpr'),
				'condition' => array(
					'type-of-dataloss-' . $region => 1,
				)
			),
			array(
				'content' => _x('As a result of that incident, we cannot rule out the possibility that unauthorized persons have had access to your personal data. ', 'Legal document dataleak', 'complianz-gdpr'),
				'condition' => array(
					'type-of-dataloss-' . $region => 2,
				)
			),
			array(
				'content' => _x('We have therefore notified the national supervisory authority. As we expect possible adverse consequences for your privacy, we also inform you as a data subject. We would like to provide you with the following information in order to limit the possible consequences for you:', 'Legal document dataleak', 'complianz-gdpr'),
				'callback_condition' => 'cmplz_dataleak_has_to_be_reported',

			),
			array(
				'title' => _x('Explanation of the nature of the breach:', 'Legal document dataleak', 'complianz-gdpr'),
				'content' => '[what-occurred-' . $region . ']',
				'condition' => array('risk-of-data-loss-' . $region => 3),
			),
			array(
				'title' => _x('Possible consequences:', 'Legal document dataleak', 'complianz-gdpr'),
				'content' => '[consequences-' . $region . ']',
				'condition' => array('risk-of-data-loss-' . $region => 3),
			),
			array(
				'title' => _x('Measures we have taken:', 'Legal document dataleak', 'complianz-gdpr'),
				'content' => '[measures-' . $region . ']',
				'condition' => array('risk-of-data-loss-' . $region => 3),
			),
			array(
				'content' => _x('Despite these measures we have taken, the security breach may have adverse consequences for your privacy. To limit these as much as possible, we recommend that you take a number of measures.', 'Legal document dataleak', 'complianz-gdpr'),
			),
			array(
				'title' => _x('Measures a person involved can take to minimise damage:', 'Legal document dataleak', 'complianz-gdpr'),
				'content' => '[measures_by_person_involved-' . $region . ']',
				'condition' => array('risk-of-data-loss-' . $region => 3),
			),
			array(
				'content' => _x('We hope that this letter has provided you with sufficient information about the security incident and its consequences. We are continuously working to improve security and counteract the possible consequences of this breach. We would like to apologize for any inconvenience you have experienced to date.', 'Legal document dataleak', 'complianz-gdpr'),
			),
			array(
				'content' => cmplz_sprintf(_x('If you would like more information about the data breach, please send a message to %s', 'Legal document dataleak', 'complianz-gdpr'), '[email_company]'),
			),
			array(
				'content' => _x('Kind regards, ', 'Legal document dataleak', 'complianz-gdpr'),
			),
			array(
				'content' => '[organisation_name]<br>
                    [address_company]<br>
                    [country_company]<br>
                    ' . _x('Website:', 'Legal document dataleak', 'complianz-gdpr') . ' [domain] <br>
                    ' . _x('Email:', 'Legal document dataleak', 'complianz-gdpr') . ' [email_company] <br>
                    [telephone_company]',
			),
		);
	}
	return $pages;
}
