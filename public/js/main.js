"use strict";

if (window.location.pathname === "/addproduct") {
  function submitValidation() {
    const form = document.querySelector(".needs-validation");
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  }

  function singleInputValidation() {
    Array.from(document.querySelectorAll("[required]")).forEach((input) => {
      input.addEventListener(
        "focusout",
        (event) => {
          event.target.parentElement.classList.add("was-validated");
        },
        false
      );
    });
  }

  function typeSwitcher() {
    document
      .querySelector("#productType")
      .addEventListener("change", (event) => {
        document
          .querySelectorAll("#productDescription input")
          .forEach((element) => {
            element.removeAttribute("required");
          });

        document
          .querySelectorAll("option:not(:first-child)")
          .forEach((option) => {
            document
              .querySelector("#" + option.value.toLowerCase() + "Description")
              .classList.add("d-none");
          });

        if (event.target.value) {
          const field = document.querySelector(
            "#" + event.target.value.toLowerCase() + "Description"
          );
          field.classList.remove("d-none");
          field.querySelectorAll("input").forEach((element) => {
            element.setAttribute("required", "");
          });
        }

        singleInputValidation();
      });
  }

  function skuValidator() {
    const temp = (target) => {
      const validator = document.querySelector("#skuValidator");
      validator.classList.remove("d-none");
      fetch("/api/read-product?sku=" + target.value)
        .then((response) => response.json())
        .then((json) => {
          setTimeout(() => {
            validator.classList.add("d-none");
            if (json.hasOwnProperty("sku")) {
              target.setCustomValidity("This SKU already exists");
              document.querySelector("#skuFeedback").textContent =
                "This SKU already exists.";
            } else {
              target.setCustomValidity("");
              document.querySelector("#skuFeedback").textContent =
                "Please provide an SKU.";
            }
          }, 200);
        });
    };

    const sku = document.querySelector("#sku");
    sku.addEventListener(
      "focusout",
      (event) => {
        temp(event.target);
        event.target.addEventListener("input", (event) => {
          temp(event.target);
        });
      },
      { once: true }
    );

  }

  submitValidation();
  singleInputValidation();
  typeSwitcher();
  skuValidator();
}
