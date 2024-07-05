document.getElementById('menu_bouton').addEventListener('click', function() {
    var dropdown = document.getElementById('menu_deroulant');
    if (dropdown.style.display === 'none' || dropdown.style.display === '') {
        dropdown.style.display = 'flex'; 
    } else {
        dropdown.style.display = 'none';
    }
});
