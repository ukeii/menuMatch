// script.js
document.addEventListener('DOMContentLoaded', function () {
    const deleteIcons = document.querySelectorAll('.deleteFavorite i');
    deleteIcons.forEach(function (icon) {
        icon.addEventListener('click', function () {
            const postId = this.closest('.post').dataset.id;
            deleteFavorite(postId);
        });
    });
});

function deleteFavorite(postId) {
    fetch('../POST/delete_favorite.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + encodeURIComponent(postId)
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.querySelector('.post[data-id="' + postId + '"]').remove();
            } else {
                alert("Erreur lors de la suppression du favori.");
            }
        })
        .catch(error => console.error('Erreur:', error));
}
