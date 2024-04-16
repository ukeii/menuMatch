function viewMore(button) {
    const calendarBox = button.closest(".calendarBox");
    const infoBox = document.getElementById("infoBox");

    // Extraire les données stockées dans les attributs data-*
    const name = button.getAttribute("data-name");
    const description = button.getAttribute("data-description");
    const otherDetail = button.getAttribute("data-other");
    const origine = button.getAttribute("data-origine");

    // Mettre à jour le contenu de infoBox avec les données de la recette
    infoBox.innerHTML = `
        <h1>${name}</h1>
        <p>${description}</p>
        <p>${otherDetail}</p>
        <p>Origin: ${origine}</p>
        <button onclick="closeInfoBox()">X</button>
    `;

    calendarBox.style.display = "none";
    infoBox.style.display = "flex";
}

// Ajouter une fonction pour fermer infoBox et afficher de nouveau calendarBox
function closeInfoBox() {
    document.getElementById("infoBox").style.display = "none";
    document.getElementById("calendarBox").style.display = "flex";
}
