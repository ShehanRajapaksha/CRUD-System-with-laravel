function filterResults() {
    let href = 'all-listings?';
    let title = document.getElementById("simple-search").value;
    
    if (!isNaN(title) && title.length) {
      href += '&filter[zip_code]=' + title;
    } else if (title.length) {
      href += '&filter[title]=' + title;
    }
    
    let url = "http://127.0.0.1:8000/" + href;
    document.location.href = url;
  }
  
  document.getElementById("filter").addEventListener("click", filterResults)
  
  document.getElementById('simple-search').addEventListener('keyup', function() {
    if (event.keyCode === 13) {
      filterResults();
    }
  })
  