let serchobj = location.search.split('=').pop();

const access_key= 'OafkYE6ayycDb6U_U-Rw0sl-NVOoVK6DdXaX9vFqmqI';

const serch_photo= `https://api.unsplash.com/search/photos?client_id=${access_key}&query=${serchobj}&per_page=50`;

const random_photo= `https://api.unsplash.com/photos/random?client_id=${access_key}&count=30`;

const gallery = document.querySelector('.gallery');

let allImages;
let courentimg = 0;


const likeButton = document.querySelector('.like-button');
const popImage = document.querySelector('.popimage');

// Add a click event listener to the "Like" button
likeButton.addEventListener('click', function () {
  
  const imageUrl = popImage.src;
  console.log(imageUrl);

//   window.open(imageUrl, '_blank');

fetch('index.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: 'imageUrl=' + encodeURIComponent(imageUrl),
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));
});

const getImages = () => {
    fetch(random_photo)
    .then(res => res.json())
    .then(data => {
        allImages = data;
        makeImages(allImages);
    });
}

const sImages = () => {
    fetch(serch_photo)
    .then(res => res.json())
    .then(data => {
        allImages = data.results;
        makeImages(allImages);
    });
}

const makeImages = (data) => {
    console.log(data);
    data.forEach((item, index)=> {
        let img= document.createElement('img');
        img.src = item.urls.regular;
        img.className = 'gallery-im';

        gallery.appendChild(img);

        // pop image

        img.addEventListener('click',() => {
            courentimg = index;
            showpopup(item);

        })
    })
}

const showpopup = (item) => {
    let popup = document.querySelector('.pop');
    const downloadbut = document.querySelector('.download');
    const closebut = document.querySelector('.close');
    const image = document.querySelector('.popimage');


    popup.classList.remove('hide');
    downloadbut.href = item.links.html;
    image.src = item.urls.regular;

    closebut.addEventListener('click', () => {
        popup.classList.add('hide');
    })


}
if(serchobj == '')
{
    getImages();
}
else
{
    sImages();
}


const prebut = document.querySelector('.pimage');
const nextbut = document.querySelector('.nimage');

nextbut.addEventListener('click', () => {
    if(courentimg > 0)
    {
        courentimg--;
        showpopup(allImages[courentimg]);
    }
})

prebut.addEventListener('click', () => {
    if(courentimg < allImages.length - 1)
    {
        courentimg++;
        showpopup(allImages[courentimg]);
    }
})

      function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
let l = document.getElementById('loader');

//const myTimeout = setTimeout(myGreeting, 5000);

let vid = document.getElementById("myVideo");

vid.onloadeddata = function myGreeting() {
  l.style.display = "none";
}