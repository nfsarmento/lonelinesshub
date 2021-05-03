(function () {
  function cccGovUkChangeLanguage() {
    const cookieControlConfig = CookieControl.config();
    const cookieControlConfigTextTitle = cookieControlConfig?.text?.title;
    const cookieControlConfigTextIntro = cookieControlConfig?.text?.intro;
    const cookieControlConfigStatementDescription =
      cookieControlConfig?.statement?.description;
    const cookieControlConfigStatementName =
      cookieControlConfig?.statement?.name;
    const cookieControlConfigStatementUrl = cookieControlConfig?.statement?.url;
    const cookieControlConfigOnText = cookieControlConfig?.text?.on;
    const cookieControlConfigOffText = cookieControlConfig?.text?.off;
    const cookieControlConfigAcceptSettings =
      cookieControlConfig?.text?.acceptSettings;
    const cookieControlConfigRejectSettings =
      cookieControlConfig?.text?.rejectSettings;
    const cookieControlCloseLabel = cookieControlConfig?.text?.closeLabel;
    const cookieControlOptionalCookies = cookieControlConfig?.optionalCookies;
    const cookieControlAcceptRecommended =
      cookieControlConfig?.text?.acceptRecommended;

    function cccGovUkDataChange(data, newVal) {
      const cccGovUkTitleBanner = document.querySelector(data);
      newVal = newVal ? newVal : "";
      cccGovUkTitleBanner ? (cccGovUkTitleBanner.innerHTML = newVal) : null;
    }

    function cccGovUkHrefChange(data, newHref) {
      const cccGovUkTitleHref = document.querySelector(data);
      newHref = newHref ? newHref : "";
      cccGovUkTitleHref
        ? cccGovUkTitleHref.setAttribute("href", newHref)
        : null;
    }

    document.querySelector(".govuk-heading-m").innerHTML = "test";
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-title"]',
      cookieControlConfigTextTitle
    );
    cccGovUkDataChange(
      '[data-ccc-govuk-details="ccc-gov-uk-title"]',
      cookieControlConfigTextTitle
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-description"]',
      cookieControlConfigTextIntro
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-description-accept"]',
      cookieControlConfigStatementDescription
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-description-reject"]',
      cookieControlConfigStatementDescription
    );
    cccGovUkDataChange(
      '[data-ccc-govuk-details="ccc-gov-uk-description"]',
      cookieControlConfigTextIntro
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-description"]',
      cookieControlConfigStatementDescription
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-name"]',
      cookieControlConfigStatementName
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-name-accept"]',
      cookieControlConfigStatementName
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-name-reject"]',
      cookieControlConfigStatementName
    );

    cccGovUkHrefChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-name"]',
      cookieControlConfigStatementUrl
    );
    cccGovUkHrefChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-name-accept"]',
      cookieControlConfigStatementUrl
    );
    cccGovUkHrefChange(
      '[data-ccc-govuk="ccc-gov-uk-statement-name-reject"]',
      cookieControlConfigStatementUrl
    );

    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-accept-settings"]',
      cookieControlConfigAcceptSettings
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-reject-settings"]',
      cookieControlConfigRejectSettings
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-close-label-accept"]',
      cookieControlCloseLabel
    );
    cccGovUkDataChange(
      '[data-ccc-govuk="ccc-gov-uk-close-label-reject"]',
      cookieControlCloseLabel
    );

    cookieControlOptionalCookies.forEach((element, i) => {
      cccGovUkDataChange(
        '[data-ccc-govuk-details="ccc-gov-uk-category-description-' + i + '"]',
        element.description
      );
      cccGovUkDataChange(
        '[data-ccc-govuk-details="ccc-gov-uk-category-title-' + i + '"]',
        element.label
      );
      cccGovUkDataChange(
        '[data-ccc-govuk-details="ccc-gov-uk-category-accept-' + i + '"]',
        cookieControlConfigOnText
      );
      cccGovUkDataChange(
        '[data-ccc-govuk-details="ccc-gov-uk-category-reject-' + i + '"]',
        cookieControlConfigOffText
      );
      cccGovUkDataChange(
        '[data-ccc-govuk-details="ccc-gov-uk-category-accept-recommended-' +
          i +
          '"]',
        cookieControlAcceptRecommended
      );
    });
  }

  window.addEventListener("load", (event) => {
    const cccChangeLanguageData = document.querySelector(
      '[data-ccc-alternativelang="true"]'
    );

    if (cccChangeLanguageData) {
      setTimeout(function () {
        cccGovUkChangeLanguage();
      }, 500);
    }
  });
})();
