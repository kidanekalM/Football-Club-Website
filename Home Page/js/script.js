const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})



  // Initialize the image carousel for merchandise
  const storeCarousel = document.querySelector('.store-carousel');
  const storeItems = document.querySelectorAll('.store-item');
  const prevButton = document.querySelector('.prev-button');
  const nextButton = document.querySelector('.next-button');
  let currentIndex = 0;
  
  function showCurrentItem() {
    storeItems.forEach(item => item.classList.remove('active'));
    storeItems[currentIndex].classList.add('active');
  }
  
  function prevItem() {
    currentIndex--;
    if (currentIndex < 0) {
      currentIndex = storeItems.length - 1;
    }
    showCurrentItem();
  }
  
  function nextItem() {
    currentIndex++;
    if (currentIndex >= storeItems.length) {
      currentIndex = 0;
    }
    showCurrentItem();
  }
  
  prevButton.addEventListener('click', prevItem);
  nextButton.addEventListener('click', nextItem);
  
  // Add event listener to the Shop Now button
  const shopNowButton = document.querySelector('.store-button');
  shopNowButton.addEventListener('click', () => {
    // Replace with your own URL
    window.location.href = 'https://example.com/shop';
  });
  
  
    /////// Merch ends here



    /////Flaming Text

const flame = document.querySelector('.flaming-text::before');
let isFlameMovingRight = true;

function moveFlame() {
  if (isFlameMovingRight) {
    flame.style.clipPath = 'polygon(0% 0%, 100% 50%, 0% 100%)';
  } else {
    flame.style.clipPath = 'polygon(100% 0%, 100% 100%, 0% 50%)';
  }
  isFlameMovingRight = !isFlameMovingRight;
}

setInterval(moveFlame, 1000);


////// Team Card
const teamCard = document.querySelectorAll('.team');
const teamCard1 = teamCard[0];
const teamCard2 = teamCard[1];
if (teamCard1 != null){
    const teamcard1Teams = teamCard1.querySelectorAll('img')
    teamCard1.addEventListener('mouseover', () => {
        teamcard1Teams[0].classList.add('hovered1');
        teamcard1Teams[1].classList.add('hovered2');
      });
    teamCard1.addEventListener('mouseleave', () => {
        teamcard1Teams[0].classList.remove('hovered1');
        teamcard1Teams[1].classList.remove('hovered2');
      });
     
    
    // team1[0].classList.add("hovered1");
    // team1[1].classList.add("hovered1");
    const teamcard2Teams = teamCard2.querySelectorAll('img');
    teamCard2.addEventListener('mouseover', () => {
            teamcard2Teams[0].classList.add('hovered1');
            teamcard2Teams[1].classList.add('hovered2');
      });
      teamCard2.addEventListener('mouseleave', () => {
        teamcard2Teams[0].classList.remove('hovered1');
        teamcard2Teams[1].classList.remove('hovered2');
  });
 
    // team2[0].classList.add("hovered2");
    // team2[1].classList.add("hovered2");
}

