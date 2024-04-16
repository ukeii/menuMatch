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
            let cardId = this.id.split('-')[1];

            if (change > 100) {
                sendSwipeData(cardId, 'like');
            } else if (change < -100) {
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
                    console.log("plus de cartes")
                }
            });
        }
    });
    // Gestion du clic sur le bouton "like"
    $('.button.like').on('click', function() {
        var $currentCard = $('.card:visible').first();
        $currentCard.animate({
            left: '+=150' 
        }, 200, function() {
            sendSwipeData($currentCard.attr('id').split('-')[1], 'like');
            $currentCard.hide('slow', function() {
                $(this).remove();
                showNextCard();
            });
        });
    });

    // Gestion du clic sur le bouton "dislike"
    $('.button.dislike').on('click', function() {
        var $currentCard = $('.card:visible').first();
        $currentCard.animate({
            left: '-=150'
        }, 200, function() {
            sendSwipeData($currentCard.attr('id').split('-')[1], 'dislike');
            $currentCard.hide('slow', function() {
                $(this).remove();
                showNextCard();
            });
        });
    });

    // Gestion du clic sur le bouton "favorite"
    $('.button.favorite').on('click', function() {
        var $currentCard = $('.card:visible').first();
        $currentCard.animate({
            left: '+=150'
        }, 200, function() {
            sendSwipeData($currentCard.attr('id').split('-')[1], 'favorite');
            $currentCard.hide('slow', function() {
                $(this).remove();
                showNextCard();
            });
        });
    });
    
});



function sendSwipeData(cardId, action) {
    $.ajax({
        url: '../POST/sendSwipeData_post.php', 
        type: 'POST',
        data: {
            cardId: cardId,
            action: action
        },
        success: function(response) {
            console.log(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}


//------------------------------------------------------------------------------------------------------------