/**
 * Form Basic Inputs
 */

"use strict";

(function () {
    document
        .getElementById("cancelEditButton")
        .addEventListener("click", function () {
            window.location.href = "http://localhost:8000/station/stations";
        });

    document.addEventListener("DOMContentLoaded", function () {
        var statusCheckbox = document.getElementById("statusCheckBox");
        if (statusCheckbox) {
            statusCheckbox.addEventListener("change", function () {
                if (this.checked) {
                    this.value = 1;
                } else {
                    this.value = 0;
                }
            });
        }
    });

    const alwaysOpenCheckbox = document.getElementById("alwayOpenCheckBox");
    const openingTimeInput = document.querySelector(
        'input[name="start_business_time"]'
    );
    const closingTimeInput = document.querySelector(
        'input[name="end_business_time"]'
    );

    // Function to show/hide the inputs based on the checkbox state
    function toggleOpeningAndClosingTimeInputs() {
        if (openingTimeInput && closingTimeInput) {
            if (alwaysOpenCheckbox.checked) {
                openingTimeInput.parentElement.parentElement.style.display =
                    "none";
                closingTimeInput.parentElement.parentElement.style.display =
                    "none";
            } else {
                openingTimeInput.parentElement.parentElement.style.display =
                    "block";
                closingTimeInput.parentElement.parentElement.style.display =
                    "block";
            }
        }
    }

    // Set initial state
    toggleOpeningAndClosingTimeInputs();

    // Add event listener to the checkbox
    if (alwaysOpenCheckbox) {
        alwaysOpenCheckbox.addEventListener(
            "change",
            toggleOpeningAndClosingTimeInputs
        );
    }
})();
