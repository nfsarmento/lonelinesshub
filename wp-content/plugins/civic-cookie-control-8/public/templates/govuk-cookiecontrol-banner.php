<?php

$ccc_options = get_option('civic_cookiecontrol_settings_v9');
$ccc_options_title = isset($ccc_options['titleText']) ? $ccc_options['titleText'] : "";
$ccc_options_intro = isset($ccc_options['introText']) ? $ccc_options['introText'] : "";
$ccc_options_privacyName = isset($ccc_options['privacyName']) ? $ccc_options['privacyName'] : "";
$ccc_options_privacyDescription =  isset($ccc_options['privacyDescription']) ? $ccc_options['privacyDescription'] : "";
$ccc_options_privacyURL = isset($ccc_options['privacyURL']) ? $ccc_options['privacyURL'] : "";
$ccc_options_acceptSettings = isset($ccc_options['acceptSettings']) ? $ccc_options['acceptSettings'] : "";
$ccc_options_rejectSettings =  isset($ccc_options['rejectSettings']) ? $ccc_options['rejectSettings'] : "";
$ccc_options_closeLabel =  isset($ccc_options['closeLabel']) ? $ccc_options['closeLabel'] : "";
$ccc_options_altLanguages =  isset($ccc_options['altLanguages']) ? "true" : "false";

?>


<div id="ccc-cookie-banner-govuk" data-ccc-alternativeLang="<?php echo $ccc_options_altLanguages; ?>" class=" fixed-top ccc-govuk-block-group cookie-banner govuk-!-padding-top-4 govuk-!-padding-bottom-2" role="region" aria-label="cookie banner">
  <div class="cookie-banner--main govuk-width-container govuk-body">
    <div class="govuk-grid-row">
      <div class="govuk-grid-column-two-thirds">
        <h2 data-ccc-govuk="ccc-gov-uk-title" id="cookie-banner-heading" class="govuk-heading-m"><?php echo $ccc_options_title; ?></h2>
        <p data-ccc-govuk="ccc-gov-uk-description" class="govuk-body"><?php echo $ccc_options_intro; ?></p>
        <p class="govuk-body">
          <span data-ccc-govuk="ccc-gov-uk-statement-description"><?php echo $ccc_options_privacyDescription;  ?></span> <a data-ccc-govuk="ccc-gov-uk-statement-name" class="cookie-policy govuk-link" href="<?php echo $ccc_options_privacyURL; ?>"><?php echo $ccc_options_privacyName; ?></a>
        </p>

        <button data-ccc-govuk="ccc-gov-uk-accept-settings" value="accept" name="cookieChoice" class="govuk-button cookie-banner-button--accept govuk-\!-margin-bottom-4 govuk-\!-margin-right-4" data-module="govuk-button">
          <?php echo $ccc_options_acceptSettings; ?>
        </button>

        <button data-ccc-govuk="ccc-gov-uk-reject-settings" value="reject" name="cookieChoice" class="govuk-button cookie-banner-button--reject govuk-\!-margin-bottom-4" data-module="govuk-button">
          <?php echo $ccc_options_rejectSettings; ?>
        </button>
      </div>
    </div>
  </div>

  <div class="cookie-banner--accept govuk-width-container govuk-body cbg-hidden" tabindex="-1">
    <p class="govuk-!-margin-top-1 govuk-!-margin-bottom-3">
      <span data-ccc-govuk="ccc-gov-uk-statement-description-accept"><?php echo $ccc_options_privacyDescription;  ?></span> <a data-ccc-govuk="ccc-gov-uk-statement-name-accept" class="cookie-policy govuk-link" href="<?php echo $ccc_options_privacyURL; ?>"><?php echo $ccc_options_privacyName; ?></a>
    </p>

    <button data-ccc-govuk="ccc-gov-uk-close-label-accept" value="hide-accept" name="confirmationHide" class="govuk-button cookie-banner-accept--hide govuk-link govuk-!-margin-top-1  govuk-!-margin-bottom-3" data-module="govuk-button">
      <?php echo $ccc_options_closeLabel; ?>
    </button>

  </div>

  <div class="cookie-banner--reject govuk-width-container govuk-body cbg-hidden" tabindex="-1">
    <p class="govuk-\!-margin-top-1 govuk-\!-margin-bottom-3">
      <span data-ccc-govuk="ccc-gov-uk-statement-description-reject"><?php echo $ccc_options_privacyDescription;  ?></span> <a data-ccc-govuk="ccc-gov-uk-statement-name-reject" class="cookie-policy govuk-link" href="<?php echo $ccc_options_privacyURL; ?>"><?php echo $ccc_options_privacyName; ?></a>
    </p>

    <button data-ccc-govuk="ccc-gov-uk-close-label-reject" value="hide-reject" name="confirmationHide" class="govuk-button cookie-banner-reject--hide govuk-link govuk-!-margin-top-1  govuk-!-margin-bottom-3" data-module="govuk-button">
      <?php echo $ccc_options_closeLabel; ?>
    </button>

  </div>

</div>

<noscript>
  <style type="text/css">
    .cookie-banner {
      display: none;
    }
  </style>

  <div class="ccc-govuk-block-group cookie-banner-noscript govuk-!-padding-top-4 govuk-!-padding-bottom-2" role="region" aria-label="cookie banner">
    <div class="cookie-banner--main govuk-width-container govuk-body">
      <div class="govuk-grid-row">
        <div class="govuk-grid-column-two-thirds">
          <h2 id='cookie-banner-heading' class="govuk-heading-m"><?php echo $ccc_options_title; ?></h2>
          <p class="govuk-body"><?php echo $ccc_options_intro; ?></p>
          <p class="govuk-body">
            You can <a class="cookie-policy govuk-link" href="<?php echo $ccc_options_privacyURL; ?>"> read more about our cookies</a>
          </p>
          <form method="post" action="/set-cookie-message" novalidate>
            <button value="accept" name="cookieChoice" class="govuk-button cookie-banner-button--accept govuk-!-margin-bottom-4 govuk-!-margin-right-4" data-module="govuk-button">
              <?php echo $ccc_options_acceptSettings; ?>
            </button>

            <button value="reject" name="cookieChoice" class="govuk-button cookie-banner-button--reject govuk-!-margin-bottom-4" data-module="govuk-button">
              <?php echo $ccc_options_rejectSettings; ?>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</noscript>