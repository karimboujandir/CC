// Ajoute un l'icon de menu à l'en-tête
$('#header').prepend('<div id="menu-icon"><span class="first"></span><span class="second"></span><span class="third"></span></div>');

// Réagit au clic sur l'icône du menu
$("#menu-icon").on("click", function(){
    // Fait apparaître ou disparaître le menu en le glissant avec une animation
    $("nav").slideToggle();

    // Ajoute/supprime la classe "active" à l'icône du menu
    $(this).toggleClass("active");
});