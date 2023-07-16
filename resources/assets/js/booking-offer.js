"use strict";

(function () {
    // Retrieve the "dd" elements for calculation
    const perNightPrice = document.getElementById("per_night_price");
    const serviceCharge = document.getElementById("service_charge");
    const insuranceFee = document.getElementById("insurance_fee");
    const totalInput = document.getElementById("total_input");
    // Calculate the sum
    const sum =
        parseInt(perNightPrice.dataset.value) +
        parseInt(serviceCharge.dataset.value) +
        parseInt(insuranceFee.dataset.value);
    console.log(1234);
    document.getElementById("total").textContent = "$" + sum.toFixed(2);
    totalInput.value = sum;
})();
