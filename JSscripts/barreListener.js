var searchInput = document.getElementById('input_recherche');
searchInput.addEventListener('input', function() {
    var searchText = searchInput.value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Do something with the response
        }
    };
    xhr.open('GET', 'search.php?q=' + searchText, true);
    xhr.send();
});
