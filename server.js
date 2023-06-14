// Importation des modules requis
const WebSocket = require('ws');
const mysql = require('mysql');
const session = require('express-session');
const express = require('express');
const app = express();

// Configure les paramètres de connexion à la bd
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'Coolchat'
});

// Connecte l'application à la bd
db.connect((err) => {
  if (err) {
    console.error('Erreur de connexion à la base de données :', err);
  } else {
    console.log('Connecté à la base de données');
  }
});

let clientMessages = [];

// Configuration de session
const sessionMiddleware = session({
  secret: 'clef-secrete-bien-securisee',
  resave: false,
  saveUninitialized: true
});

// Utilise le middleware de session dans l'application Express
app.use(sessionMiddleware);

// Crée un serveur WebSocket à partir de l'application Express
const server = app.listen(9999, () => {
  console.log('Server started on port 9999');
});

const wss = new WebSocket.Server({ server });

const clients = [];

// Middleware pour gérer les connexions WebSocket
wss.on('connection', function connection(ws, req) {
  // Utilise le middleware de session pour accéder aux données de session
  sessionMiddleware(req, {}, () => {
    clients.push(ws);

    // Reçoit les messages du client WebSocket
    ws.on('message', function incoming(message) {
      console.log('received: %s', message);

      // Ajoute le nom d'utilisateur au message
      const messageWithUsername = `Karim: ${message}`;

      // Requête SQL pour insérer le message dans la bd
      const sql = 'INSERT INTO messages (username, message, user_id) VALUES (?, ?, ?)';
      db.query(sql, ["karim", message, "karim"], (err, result) => {
        if (err) {
          console.error('Erreur lors de l\'enregistrement du message :', err);
        } else {
          console.log('Message enregistré dans la base de données');
        }

        // Stocke le message côté client
        clientMessages.push(messageWithUsername);

        // Diffuse le message à tous les connectés
        broadcast(messageWithUsername);
      });
    });

    // Envoie un message de bienvenue au client WebSocket
    ws.send('Bienvenue sur CoolChat, ' + "user" + '!');
  });
});

// Diffuse un message à tous les clients connectés
function broadcast(message) {
  clients.forEach(function (client) {
    client.send(message);
  });
}
