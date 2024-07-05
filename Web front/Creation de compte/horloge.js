function actualiserHorloge() {
    const maintenant = new Date();
    
    // On garde seulement le mois, la date et l'année
    const date = maintenant.getDate().toString().padStart(2, '0');
    const mois = (maintenant.getMonth() + 1).toString().padStart(2, '0');
    const annee = maintenant.getFullYear();
    
    // On garde seulement les heures et les minutes
    const heures = maintenant.getHours().toString().padStart(2, '0');
    const minutes = maintenant.getMinutes().toString().padStart(2, '0');
    
    const chaineDate = `${date}/${mois}/${annee}`;
    const chaineHeure = `${heures}:${minutes}`;
    
    document.getElementById('horloge').textContent = `${chaineDate} ${chaineHeure}`;
}

// Mettre à jour l'horloge chaque minute au lieu de chaque seconde
setInterval(actualiserHorloge, 60000);

// Appeler la fonction une fois pour éviter un délai initial d'une minute
actualiserHorloge();
