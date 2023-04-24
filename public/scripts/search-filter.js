document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('category');
    const allCards = Array.from(document.getElementsByClassName('card'));

    categorySelect.addEventListener('change', function (event) {
        const selectedCategory = event.target.value;

        allCards.forEach(card => {
            const articleLink = card.querySelector('a');
            const articleId = articleLink.href.split('&id=')[1];
            const categoryId = articleLink.getAttribute('data-category-id');

            if (selectedCategory === '' || selectedCategory === categoryId) {
                card.style.display = 'inline-block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});