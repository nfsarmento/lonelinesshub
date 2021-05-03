<?php
$ccc_options = get_option('civic_cookiecontrol_settings_v9');
$ccc_options_title = isset($ccc_options['titleText']) ? $ccc_options['titleText'] : "";
$ccc_options_intro = isset($ccc_options['introText']) ? $ccc_options['introText'] : "";
$ccc_options_optionalCookiesName = isset($ccc_options['optionalCookiesName']) ? $ccc_options['optionalCookiesName'] : [];
$ccc_options_optionalCookiesLabel = isset($ccc_options['optionalCookiesLabel']) ? $ccc_options['optionalCookiesLabel'] : [];
$ccc_options_optionalCookiesDescription =  isset($ccc_options['optionalCookiesDescription']) ? $ccc_options['optionalCookiesDescription'] : [];
$ccc_options_acceptRecommended =  isset($ccc_options['acceptRecommended']) ? $ccc_options['acceptRecommended'] : "";
$ccc_options_onText =  isset($ccc_options['onText']) ? $ccc_options['onText'] : "";
$ccc_options_offText = isset($ccc_options['offText']) ? $ccc_options['offText'] : "";
$ccc_options_initialState = isset($ccc_options['initialState']) ? $ccc_options['initialState'] : "";
$count_inside = 0;
$output = "";

if ($ccc_options_initialState === "GOVUK") :
  $output .= '<div class="ccc-govuk-block-group ccc-govuk-shortcode">    
    <h2  data-ccc-govuk-details="ccc-gov-uk-title" class="govuk-heading-m">' . $ccc_options_title . '</h2>
    <p   data-ccc-govuk-details="ccc-gov-uk-description" class="govuk-body">' . $ccc_options_intro . '</p>
  </div>';

  if ($ccc_options_optionalCookiesName) {
    foreach ($ccc_options_optionalCookiesName as $i => $val) {

      $output .= '<h3 data-ccc-govuk-details="ccc-gov-uk-category-title-' . $count_inside . '" class="govuk-heading-s">' . $ccc_options_optionalCookiesLabel[$i] . '</h3>
    <form class="cookie-category-form" action="" method="post" novalidate="" data-index="' . $count_inside . '">  
    <div class="govuk-form-group">
      <fieldset class="govuk-fieldset">
        <legend data-ccc-govuk-details="ccc-gov-uk-category-description-' . $count_inside . '" class="govuk-fieldset__legend govuk-fieldset__legend--s">' . $ccc_options_optionalCookiesDescription[$i] . '</legend>
        <div class="govuk-cookiecontrol-radios govuk-radios govuk-radios--inline">
              <div class="govuk-radios__item">
                <input class="govuk-radios__input" id="accept-' . $count_inside . '" name="cookieChoice' . $count_inside . '" type="radio" value="accept">
                <label data-ccc-govuk-details="ccc-gov-uk-category-accept-' . $count_inside . '" class="govuk-label govuk-radios__label" for="accept-' . $count_inside . '">' . $ccc_options_onText . '</label>          
              </div>
              <div class="govuk-radios__item">
                <input class="govuk-radios__input" id="reject-' . $count_inside . '" name="cookieChoice' . $count_inside . '" type="radio" value="reject">
                <label data-ccc-govuk-details="ccc-gov-uk-category-reject-' . $count_inside . '" class="govuk-label govuk-radios__label" for="reject-' . $count_inside . '">' . $ccc_options_offText . '</label>          
              </div>
        </div>
      </fieldset>
    </div>
    <button data-ccc-govuk-details="ccc-gov-uk-category-accept-recommended-' . $count_inside . '" class="govuk-button" data-module="govuk-button">' . $ccc_options_acceptRecommended . '</button>
  </form>';
      $count_inside++;
    }
  }
endif;
