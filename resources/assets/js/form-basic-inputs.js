/**
 * Form Basic Inputs
 */

'use strict';

(function () {
  document.getElementById('cancelEditButton').addEventListener('click', function() {
    window.location.href = "http://localhost:8000/admin/station/stations";
  });

  document.addEventListener('DOMContentLoaded', function() {
    var statusCheckbox = document.getElementById('statusCheckBox');
    if (statusCheckbox) {
        statusCheckbox.addEventListener('change', function() {
            if (this.checked) {
                this.value = 1;
            } else {
                this.value = 0;
            }
        }); 
    }
  });
})();
