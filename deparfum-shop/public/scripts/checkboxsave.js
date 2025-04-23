document.getElementById('apply-button').addEventListener('click', function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var checkedCheckboxes = [];

    var priceMin = document.getElementById('price_min').value;
    var priceMax = document.getElementById('price_max').value;
    localStorage.setItem('priceMin', priceMin);
    localStorage.setItem('priceMax', priceMax);

    checkboxes.forEach(function(checkbox) {
      if (checkbox.checked) {
        checkedCheckboxes.push(checkbox.value);
      }
    });
    localStorage.setItem('checkedCheckboxes', JSON.stringify(checkedCheckboxes));
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    var priceMin = localStorage.getItem('priceMin');
    var priceMax = localStorage.getItem('priceMax');
    if (priceMin && priceMax) {
      document.getElementById('price_min').value = priceMin;
      document.getElementById('price_max').value = priceMax;
    }
    var checkedCheckboxes = JSON.parse(localStorage.getItem('checkedCheckboxes'));
    if (checkedCheckboxes) {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach(function(checkbox) {
        if (checkedCheckboxes.includes(checkbox.value)) {
          checkbox.checked = true;
        }
      });
    }
  });

  // window.addEventListener('beforeunload', function() {
  //   localStorage.removeItem('priceMin');
  //   localStorage.removeItem('priceMax');
  //   localStorage.removeItem('checkedCheckboxes');
  //   window.location.href = window.location.href;
  // });
