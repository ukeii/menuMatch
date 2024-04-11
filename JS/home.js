//REPORT DISPLAY

const report = document.getElementById("report");

document.getElementById("options").addEventListener("click", function () {
    if (report.style.display == "block") {
        report.style.display = "none";
    } else {
        report.style.display = "block";
    }
});


//------------------------------------------------------------------------------------------------------------
//SWIPE CARD

$(function () {
    $('.card').draggable({
        axis: "x",
        revert: true,
        revertDuration: 200,
        stop: function (event, ui) {
            let change = ui.position.left;
            let cardId = this.id.split('-')[1]; // Extrait l'ID de la recette à partir de l'ID de la carte

            if (change > 100) { // Swipe vers la droite pour "like"
                sendSwipeData(cardId, 'like');
            } else if (change < -100) { // Swipe vers la gauche pour "dislike"
                sendSwipeData(cardId, 'dislike');
            }

            let $thisCard = $(this);
            let $nextCard = $thisCard.next('.card');

            // Faire disparaître et supprimer la carte actuelle
            $thisCard.hide('slow', function () {
                $(this).remove();
                // Afficher la carte suivante
                if ($nextCard.length) {
                    $nextCard.show('slow');
                } else {
                    // Peut-être afficher un message si il n'y a plus de cartes
                    console.log("plus de cartes")
                }
            });
        }
    });
});

function sendSwipeData(cardId, action) {
    $.ajax({
        url: '../POST/sendSwipeData_post.php', // Remplacez par le chemin vers votre script PHP
        type: 'POST',
        data: {
            cardId: cardId,
            action: action
        },
        success: function(response) {
            console.log(response); // Traitement en cas de succès
        },
        error: function(xhr, status, error) {
            console.error(error); // Traitement en cas d'erreur
        }
    });
}


//------------------------------------------------------------------------------------------------------------