/*let myHeading = document.querySelector('h1');
myHeading.textContent = 'Bonjour, monde !';



let myHead = document.querySelector('h2');

let myVariable = 3;

//myHead.textContent = myVariable === 3;
//myHead.textContent = myVariable == 4;
//myHead.textContent = myVariable !== 3;
myHead.textContent = myVariable !== 4;

document.querySelector('html').addEventListener('click', function() {
    alert('Aïe, batard  arrêtez de cliquer !!');
});
*/


let myImage = document.querySelector('img');

myImage.addEventListener('click', function() {
    let mySrc = myImage.getAttribute('src');
    if (mySrc === 'firefox-icon.png') {
      myImage.setAttribute('src', 'firefox2.png');
    } else {
      myImage.setAttribute('src', 'firefox-icon.png');
    }
});

let myButton = document.querySelector('button');
let myHeading = document.querySelector('h1');


function setUserName() {
    let myName = prompt('Veuillez saisir votre nom.');
    localStorage.setItem('nom', myName);
    myHeading.textContent = 'Mozilla est cool, ' + myName;
  }
  if (!localStorage.getItem('nom')) {
    setUserName();
  } else {
    let storedName = localStorage.getItem('nom');
    myHeading.textContent = 'Mozilla est cool, ' + storedName;
  }






/*function multiply(num1,num2) 
{
    let result = num1 * num2;
    return result;
  }

multiply(4, 7);
multiply(20, 20);
multiply(0.5, 3);
*/

