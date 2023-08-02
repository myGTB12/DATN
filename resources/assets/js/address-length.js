"use strict";

(function () {
    document.addEventListener("DOMContentLoaded", function () {
        const tdElements = document.querySelectorAll(".truncate-text");

        tdElements.forEach((tdElement) => {
            if (tdElement.textContent.length > 15) {
                tdElement.textContent =
                    tdElement.textContent.slice(0, 15) + "...";
            }
        });
    });
})();
