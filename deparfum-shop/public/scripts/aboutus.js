window.addEventListener('scroll', function() {
  var fixedElement = document.getElementById('fixedElement');
  var scrollPosition = window.scrollY;
  var switchPoint = 3565; 

  if (scrollPosition >= switchPoint) {
    fixedElement.style.position = 'absolute';
    fixedElement.style.top = switchPoint + 'px';
  
  } else {
    fixedElement.style.position = 'fixed';
    fixedElement.style.top = '0';
  }
});
