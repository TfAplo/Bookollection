const categories = document.querySelectorAll('.categorie');

categories.forEach(categorie => {
  const toggle = categorie.querySelector('.toggle');
  const contenu = categorie.querySelector('.contenu');

  toggle.addEventListener('click', () => {
    categories.forEach(c => {
      if (c !== categorie) {
        c.classList.remove('actif');
        c.querySelector('.contenu').style.maxHeight = null;
      }
    });

    categorie.classList.toggle('actif');

    if (categorie.classList.contains('actif')) {
      contenu.style.maxHeight = contenu.scrollHeight + 'px';
    } else {
      contenu.style.maxHeight = null;
    }
  });
});
