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

//---------------------------------------------------------------------------------------

document.addEventListener('DOMContentLoaded', function () {
    const deleteIcons = document.querySelectorAll('.deleteChoice i');
    deleteIcons.forEach(function (icon) {
        icon.addEventListener('click', function () {
            const postId = this.closest('.choiceRow').dataset.id;
            deleteChoice(postId);
        });
    });
});

function deleteChoice(postId) {
    fetch('../POST/delete_choice.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + encodeURIComponent(postId)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Use the `choiceRow` class and `data-id` attribute for selecting the element to remove
            document.querySelector('.choiceRow[data-id="' + postId + '"]').remove();
        } else {
            alert("Erreur lors de la suppression du favori.");
        }
    })
    .catch(error => console.error('Erreur:', error));
}

