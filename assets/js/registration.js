// Gestion du formulaire d'inscription avec champs conditionnels
function toggleShopFields() {
    console.log('toggleShopFields appelée'); // Debug
    
    const checkbox = document.getElementById('hasOnlineShop');
    const shopContainer = document.getElementById('shop-fields');
    
    console.log('Checkbox trouvée:', checkbox); // Debug
    console.log('Container trouvé:', shopContainer); // Debug
    
    if (checkbox && shopContainer) {
        if (checkbox.checked) {
            console.log('Case cochée - affichage des champs'); // Debug
            // Afficher le conteneur de boutique
            shopContainer.style.display = 'block';
            
            // Rendre les champs requis
            const shopFields = shopContainer.querySelectorAll('input, select, textarea');
            shopFields.forEach(field => {
                field.required = true;
            });
        } else {
            console.log('Case non cochée - masquage des champs'); // Debug
            // Masquer le conteneur de boutique
            shopContainer.style.display = 'none';
            
            // Enlever l'obligation et vider les champs
            const shopFields = shopContainer.querySelectorAll('input, select, textarea');
            shopFields.forEach(field => {
                field.required = false;
                field.value = ''; // Vider les champs
            });
        }
    } else {
        console.log('Éléments non trouvés'); // Debug
    }
}

// Initialiser au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM chargé'); // Debug
    toggleShopFields();
    
    // Ajouter l'événement au checkbox
    const checkbox = document.getElementById('hasOnlineShop');
    if (checkbox) {
        checkbox.addEventListener('change', toggleShopFields);
        console.log('Événement ajouté au checkbox'); // Debug
    }
});
