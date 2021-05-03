function cccGovUkDetails() {
  const cookieCategories = document.getElementsByClassName(
    "govuk-cookiecontrol-radios"
  );
  const cookieCategoryForms = document.getElementsByClassName(
    "cookie-category-form"
  );

  setTimeout(function () {
    if (cookieCategories) {
      for (var i = 0; i < cookieCategories.length; i++) {
        var categoryState = CookieControl.getCategoryConsent(i);
        if (categoryState === true) {
          document.getElementById("accept-" + i).checked = true;
        } else if (categoryState === false) {
          document.getElementById("reject-" + i).checked = true;
        }
      }
    }
  }, 1000);

  setTimeout(function () {
    if (cookieCategoryForms) {
      for (var i = 0; i < cookieCategoryForms.length; i++) {
        cookieCategoryForms[i].addEventListener("submit", function (e) {
          e.preventDefault();
          var categoryIndex = parseInt(this.dataset.index);

          if (
            document.getElementById("accept-" + categoryIndex).checked ===
              true ||
            document.getElementById("reject-" + categoryIndex).checked === true
          ) {
            if (
              document.getElementById("accept-" + categoryIndex).checked ===
              true
            ) {
              CookieControl.changeCategory(categoryIndex, true);
            } else if (
              document.getElementById("reject-" + categoryIndex).checked ===
              true
            ) {
              CookieControl.changeCategory(categoryIndex, false);
            }
          }
        });
      }
    }
  }, 1000);
}

window.addEventListener("load", (event) => {
  cccGovUkDetails();
});
