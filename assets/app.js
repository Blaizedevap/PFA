import './bootstrap.js';
import 'https://cdn.jsdelivr.net/npm/chart.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');


// var stripe = Stripe('pk_test_51PqMC8Dfh9KWC5uPUt1cRB0s5BeoFdkL8CRBGZUGciZXhURttoxRvZGVSB1NbDS5r3g31cvyrTqfuMYQmAWvA4Ou00w8xMeLkW')
// var checkoutButton = document.getElementById('checkout');
// checkoutButton.addEventListener('click',function(){

//     fetch('/checkoutSC',{
//         method: 'POST',
//     }).then(function(response){
//         return response.json();
//     }).then(function(session){
//         return stripe.redirectToCheckout({sessionId: session.id});
//     }).then(function(result){
//         if(result.error){
//             alert(result.error.message);

//         }
//     }).catch(function(error){
//         console.error('error:',error);
//     });
// });


const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['tres satisfait', 'satisfait', 'moyen', 'no satifait',],
    datasets: [{
      label: '# of Votes',
      data: [12, 19, 20, 5,],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

// footer
    const el = document.getElementById("Decouver");
    el.onclick= function(){
        alert("Nouvaute pas encore disponible merci");
    }

// Sélectionner les éléments
const modal = document.getElementById("modal");
const openButton = document.getElementById("openFormButton");
const closeButton = document.getElementsByClassName("close")[0];

// Ouvrir la modale
openButton.onclick = function() {
    modal.style.display = "block";
}

// Fermer la modale
closeButton.onclick = function() {
    modal.style.display = "none";
}

// Fermer la modale en cliquant en dehors de celle-ci
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}
