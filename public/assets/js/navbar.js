export function createNavBar(){
    let navbarDiv = document.getElementById('navbar');

    let content = `
    <div id="navbar-title">
        <h2>COGIP</h2>
    </div>
    <div id="navbar-burger">
        <span></span>
    </div>
  
    <div id="navbar-menu">
        <ul>
            <li><a href="./">Home</a></li>
            <li><a href="./invoices.php">Invoices</a></li>
            <li><a href="./companies.php">Companies</a></li>
            <li><a href="./contacts.php">Contacts</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Login</a></li>
        </ul>
    </div>


    `;

    navbarDiv.innerHTML += content;

}

// <div id="navbar-buttons">
// <button type="button">Sign up</button>
// <button type="button">Login</button>
// </div>