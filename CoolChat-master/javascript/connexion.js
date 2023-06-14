// Récupère le bouton s'inscrire par son ID
const signUpButton = document.getElementById('signUp');

// Idem pour se connecter
const signInButton = document.getElementById('signIn');

// Idem pour conteneur
const container = document.getElementById('container');

// Réagit lorsque le bouton s'inscrire est cliqué
signUpButton.addEventListener('click', () => {
  // Ajoute la classe 'right-panel-active' au conteneur
  // Active le panneau droit et déplace le contenu vers la droite avec une animation
  container.classList.add('right-panel-active');
});

// Idem avec se connecter
signInButton.addEventListener('click', () => {
// Suit la meme logique que plus haut
  container.classList.remove('right-panel-active');
});
