// Fait connexion WebSocket avec le serveur
const socket = new WebSocket('ws://localhost:9999');

// Réagi lorsque la connexion est établie
socket.onopen = function() {
    console.log('Connecté au serveur WebSocket');
};

// Réagi lorsque des messages sont reçus
socket.onmessage = function(event) {
    // Crée une nouvelle <div> pour afficher le message
    const message = document.createElement('div');

    // Définir le texte du message
    message.textContent = event.data;

    // Ajoute le message à la liste des messages
    document.getElementById('messages').appendChild(message);

    // Obtenir le nom d'utilisateur à partir du message
    const username = event.data.split(':')[0];

    // Appliquer style css en fonction de l'utilisateur
    if (username != null) {
        message.classList.add('sent');
    } else {
        message.classList.add('received');
    }
};

// Réagi lorsque le formulaire est soumis
document.getElementById('formulaire').addEventListener('submit', function(event) {
    // Empêcher le comportement par défaut du formulaire
    event.preventDefault();

    // Récupérer le message
    const message = document.getElementById('message').value;

    // Envoye le message 
    socket.send(message);

    // Efface le contenu du champ de saisie
    document.getElementById('message').value = '';
});
