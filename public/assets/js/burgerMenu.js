export function burgerMenu(){

    let burgerMenu = document.getElementById('navbar-burger');

    let overlay = document.getElementById('navbar-menu');
    
    burgerMenu.addEventListener('click', function() {
      this.classList.toggle("close");
      overlay.classList.toggle("overlay");
      console.log("click-burger");
    });
    

    
}