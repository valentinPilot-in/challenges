<?php
/*
 * This document is intentionally not translatable, as it is intended to be for US citizens, and should therefore always be in English
 *
 * */
defined('ABSPATH') or die("you do not have access to this page!");

$this->pages['us']['privacy-statement']['document_elements'] = array(
    'last-updated' => array(
        'content' => '<i>' . cmplz_sprintf('This privacy statement was last changed on %s, last checked on %s, and applies to citizens and legal permanent residents of the United States.', '[publish_date]', '[checked_date]') . '</i><br>',
    ),
    'inleiding' => array(
      'p' => false,
        'content' =>
            '<p>'. cmplz_sprintf('In this privacy statement, we explain what we do with the data we obtain about you via %s. We recommend you carefully read this statement. In our processing we comply with the requirements of privacy legislation. That means, among other things, that:', '[domain]') .
            '<ul>
                <li>we clearly state the purposes for which we process personal data. We do this by means of this privacy statement;</li>
                <li>we aim to limit our collection of personal data to only the personal data required for legitimate purposes;</li>
                <li>we first request your explicit consent to process your personal data in cases requiring your consent;</li>
                <li>we take appropriate security measures to protect your personal data and also require this from parties that process personal data on our behalf;</li>
                <li>we respect your right to access your personal data or have it corrected or deleted, at your request.</li>
            </ul></p>' .
            'If you have any questions, or want to know exactly what data we keep of you, please contact us.',
    ),

    //this has to be above the processors, as processors are shown for both 1 and 3. It's condition is then "Not 2"
    // Processors
    array(
        'title' => 'Sharing with other parties',
        'content' => 'We only share or disclose this data to other recipients for the following purposes:',
        'condition' => array('share_data_other' => 'NOT 2'),
    ),

    array(
        'numbering' => false,
        'content' =>
            "<b>Purpose of the data transfer:</b>&nbsp;[purpose]<br>
             <b>Country or state in which this service provider is located:</b>&nbsp;[country]<br>",
        'condition' => array(
            'processor' => 'loop',
            'share_data_other' => 'NOT 2',
        ),
    ),

    array(
        'numbering' => false,
        'content' =>
            "<b>Purpose of the data transfer:</b>&nbsp;[purpose]<br>
             <b>Country or state in which this third-party is located:</b>&nbsp;[country]<br>",
        'condition' => array(
            'thirdparty' => 'loop',
            'share_data_other' => '1',
        ),
    ),

    array(
        'title' => 'Disclosure practices',
        'content' => 'We disclose personal information if we are required by law or by a court order, in response to a law enforcement agency, to the extent permitted under other provisions of law, to provide information, or for an investigation on a matter related to public safety.',
    ),



    array(
        'title' => 'How we respond to Do Not Track signals & Global Privacy Control ',
        'content' => 'Our website responds to and supports the Do Not Track (DNT) header request field. If you turn DNT on in your browser, those preferences are communicated to us in the HTTP request header, and we will not track your browsing behavior.',
        'condition' => array('respect_dnt' => 'yes'),
    ),


    array(
        'title' => 'How we respond to Do Not Track signals & Global Privacy Control ',
        'content' => 'Our website does not respond to and does not support the Do Not Track (DNT) header request field.',
        'condition' => array('respect_dnt' => 'no'),
    ),


    array(
        'title' => 'Cookies',
        'content' => cmplz_sprintf('Our website uses cookies. For more information about cookies, please refer to our Cookie Policy on our %s[cookie-statement-title]%s webpage.', '<a href="[cookie-statement-url]">', '</a>')."&nbsp;",
    ),

    array(
        'content' => 'We have concluded a data processing agreement with Google.',
        'callback_condition' => 'cmplz_accepted_processing_agreement',
    ),

    array(
        'content' => 'Google may not use the data for any other Google services.',
        'callback_condition' => 'cmplz_statistics_no_sharing_allowed',
    ),

    array(
        'content' => 'The inclusion of full IP addresses is blocked by us.',
        'callback_condition' => 'cmplz_no_ip_addresses',
    ),

    array(
        'title' => 'Security',
        'content' => 'We are committed to the security of personal data. We take appropriate security measures to limit abuse of and unauthorized access to personal data. This ensures that only the necessary persons have access to your data, that access to the data is protected, and that our security measures are regularly reviewed.'
    ),
    array(
        'content' => 'The security measures we use consist of:',
        'condition' => array('secure_personal_data' => 2),
    ),
    array(
        'content' => '[which_personal_data_secure]',
        'condition' => array('secure_personal_data' => 2),
    ),
    array(
        'title' => 'Third party websites',
        'content' => 'This privacy statement does not apply to third party websites connected by links on our website. We cannot guarantee that these third parties handle your personal data in a reliable or secure manner. We recommend you read the privacy statements of these websites prior to making use of these websites.',
    ),
    array(
        'title' => 'Amendments to this privacy statement',
        'content' => 'We reserve the right to make amendments to this privacy statement. It is recommended that you consult this privacy statement regularly in order to be aware of any changes. In addition, we will actively inform you wherever possible.',
    ),
    array(
        'title' => 'Accessing and modifying your data',
        'content' => 'If you have any questions or want to know which personal data we have about you, please contact us. Please make sure to always clearly state who you are, so that we can be certain that we do not modify or delete any data of the wrong person. We shall provide the requested information only upon receipt of a verifiable consumer request. You can contact us by using the information below. You have the following rights:',
    ),

    array(
        'subtitle' => 'Right to know what personal information is being collected about you',
        'p' => false,
        'content' => '<ol class="alphabetic">
                        <li>A consumer shall have the right to request that a business that collects personal information about the consumer disclose to the consumer the following:
                        <ol>
                            <li>The categories of personal information it has collected about that consumer.</li>
                            <li>The categories of sources from which the personal information is collected.</li>
                            <li>The business or commercial purpose for collecting or selling personal information.</li>
                            <li>The categories of third parties with whom the business shares personal information.</li>
                            <li>The specific pieces of personal information it has collected about that consumer.</li>
                        </ol></li>
                       </ol>',
        'condition' => array(
            'california' => 'yes',
        ),
    ),

    array(
        'subtitle' => 'The right to know whether personal information is sold or disclosed and to whom',
        'p' => false,
        'content' => '<ol class="alphabetic">
                        <li>A consumer shall have the right to request that a business that sells the consumer’s personal information, or that discloses it for a business purpose, disclose to that consumer:
                        <ol>
                        <li>The categories of personal information that the business collected about the consumer.</li>
                        <li>The categories of personal information that the business sold about the consumer and the categories of third parties to whom the personal information was sold, by category or categories of personal information for each third party to whom the personal information was sold.</li>
                        <li>The categories of personal information that the business disclosed about the consumer for a business purpose.</li>
                       </ol></li>
                      </ol>',
        'condition' => array(
            'california' => 'yes',
        ),
    ),

    array(
        'subtitle' => 'The Right to equal service and price, even if you exercise your privacy rights',
        'content' => 'We shall not discriminate against a consumer because the consumer exercised any of the consumer’s privacy rights, including, but not limited to, by:',
        'condition' => array(
            'california' => 'yes',
        ),
    ),
    array(
        'p' => false,
        'content' => '<ol class="alphabetic">
                        <li>Denying goods or services to the consumer.</li>
                        <li>Charging different prices or rates for goods or services, including through the use of discounts or other benefits or imposing penalties.</li>
                        <li>Providing a different level or quality of goods or services to the consumer, if the consumer exercises the consumer’s privacy rights.</li>
                        <li>Suggesting that the consumer will receive a different price or rate for goods or services or a different level or quality of goods or services.
However, nothing prohibits us from charging a consumer a different price or rate, or from providing a different level or quality of goods or services to the consumer, if that difference is reasonably related to the value provided to the consumer by the consumer’s data.</li>
                      </ol>',
        'condition' => array(
            'california' => 'yes',
        ),
    ),
    array(
        'p' => false,
        'subtitle' => 'The right to delete any personal information',
        'content' => '<ol class="alphabetic">
                        <li>A consumer shall have the right to request that a business delete any personal information about the consumer which the business has collected from the consumer.</li>
                        <li>A business that receives a verifiable request from a consumer to delete the consumer’s personal information pursuant to subdivision (a) of this section shall delete the consumer’s personal information from its records and direct any service providers to delete the consumer’s personal information from their records.</li>
                        <li>A business or a service provider shall not be required to comply with a consumer’s request to delete the consumer’s personal information if it is necessary for the business or service provider to maintain the consumer’s personal information in order to:
                        <ol>
                        <li>Complete the transaction for which the personal information was collected, provide a good or service requested by the consumer, or reasonably anticipated within the context of a business’s ongoing business relationship with the consumer, or otherwise perform a contract between the business and the consumer.</li>
                        <li>Detect security incidents, protect against malicious, deceptive, fraudulent, or illegal activity; or prosecute those responsible for that activity.</li>
                        <li>Debug to identify and repair errors that impair existing intended functionality.</li>
                        <li>(Exercise free speech, ensure the right of another consumer to exercise his or her right of free speech, or exercise another right provided for by law.</li>
                        <li>Comply with the California Electronic Communications Privacy Act pursuant to Chapter 3.6 (commencing with Section 1546) of Title 12 of Part 2 of the Penal Code.</li>
                        <li>Engage in public or peer-reviewed scientific, historical, or statistical research in the public interest that adheres to all other applicable ethics and privacy laws, when the businesses’ deletion of the information is likely to render impossible or seriously impair the achievement of such research, if the consumer has provided informed consent.</li>
                       <li>To enable solely internal uses that are reasonably aligned with the expectations of the consumer based on the consumer’s relationship with the business.</li>
                       <li>Comply with a legal obligation.</li>
                       <li>Otherwise use the consumer’s personal information, internally, in a lawful manner that is compatible with the context in which the consumer provided the information.</li>
                       </ol></li>
                      </ol>',
        'condition' => array(
            'california' => 'yes',
        ),
    ),

    array(
        'p' => false,
        'subtitle' => 'You have the following rights with respect to your personal data',
        'content' => '<ol class="alphabetic">
                        <li>You may submit a request for access to the data we process about you.</li>
                        <li>You may object to the processing.</li>
                        <li>You may request an overview, in a commonly used format, of the data we process about you.</li>
                        <li>You may request correction or deletion of the data if it is incorrect or not or no longer relevant, or to ask to restrict the processing of the data..</li>
                      </ol>
                      ',
        'condition' => array(
            'california' => 'no',
        ),
    ),

    array(
        'title' => ' Right to opt out',
        'content' => cmplz_sprintf('You shall have the right, at any time, to direct us not to sell your personal information to a third party. For more information about the possibility of submitting an opt-out request, please refer to our %s[cookie-statement-title]%s page.', '<a href="[cookie-statement-url]">', '</a>'),
        'callback_condition' => 'cmplz_sold_data_12months',
        'condition' => array(
            'purpose_personaldata' => 'selling-data-thirdparty',
            'california' => 'yes',
        ),
    ),

    array(
        'title' => 'Selling of personal data to third parties',
        'content' => 'A list of the categories of personal information we have sold to a third party in the preceding 12 months:',
        'callback_condition' => 'cmplz_sold_data_12months',
        'condition' => array(
            'california' => 'yes',
        ),
    ),

    array(
        'title' => 'Selling and disclosure of personal data to third parties',
        'content' => 'We have not sold consumers’ personal data in the preceding 12 months.',
        'callback_condition' => 'NOT cmplz_sold_data_12months',
        'condition' => array(
            'california' => 'yes',
        ),
    ),

    array(
        'content' => '[data_sold_us]',
        'condition' => array(
            'purpose_personaldata' => 'selling-data-thirdparty',
            'california' => 'yes',
        ),
    ),

    array(
        'content' => 'A list of the categories we have disclosed for a business purpose in the preceding 12 months:',
        'callback_condition' => 'cmplz_disclosed_data_12months',
        'condition' => array(
            'california' => 'yes',
        ),

    ),
    array(
        'content' => 'We have not disclosed consumers’ personal information for a business purpose in the preceding 12 months.',
        'callback_condition' => 'NOT cmplz_disclosed_data_12months',
        'condition' => array(
	        'california' => 'yes',
        ),
    ),
    array(
        'content' => '[data_disclosed_us]',
        'condition' => array(
            'california' => 'yes',
        ),
    ),

    array(
        'title' => 'Financial incentives',
        'content' => cmplz_sprintf('We offer financial incentives, including payments to consumers as compensation, for the collection of personal information, the sale of personal information, or the deletion of personal information. We may also offer a different price, rate, level, or quality of goods or services if that price or difference is directly related to the value provided to the consumer by the consumer’s data. More information about the material terms of our financial incentive program can be found at the %sterms & agreements%s page and on our %s[cookie-statement-title]%s page. We may enter a consumer into a financial incentive program only if the consumer gives us prior opt-in consent, and which may be revoked by the consumer at any time.', '[financial-incentives-terms-url]', '[/financial-incentives-terms-url]', '<a href="[cookie-statement-url]">', '</a>'),
        'condition' => array(
            'financial-incentives' => 'yes',
            'california' => 'yes',
        ),
    ),

    array(
        'title' => 'Children',
        'content' => 'Our website is not designed to attract children and it is not our intent to collect personal data from children under the age of consent in their country of residence. We therefore request that children under the age of consent do not submit any personal data to us.',
        'condition' => array('targets-children' => 'no'),
    ),

    array(
        'title' => 'Children',
        'content' => cmplz_sprintf("For our privacy statement regarding children, please see our dedicated %sChildren's Privacy Statement%s", '<a href="[privacy-statement-children-url]">', '</a>'),
        'condition' => array('targets-children' => 'yes'),
    ),

    array(
        'title' => 'Contact details',
        'content' => '[organisation_name]<br>
        [address_company]<br>
        [country_company]<br>
        Website: [domain] <br>
        Email: [email_company] <br>
        [free_phonenr]<br>
        [telephone_company]',
    ),

    /* Dit zijn de privacy policies die door wp worden aangeboden per plugin */
    array(
        'title' => 'Annex',
        'numbering' => false,
        'content' => '[custom_privacy_policy_text]',
        'callback_condition' => 'cmplz_has_custom_privacy_policy',
    ),

// End privacy statement array
);
