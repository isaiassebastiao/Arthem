const artists = [...document.querySelectorAll('.artists')];

artists.forEach(artist=>{
    artist.addEventListener('click', ()=>{
        //chamar modal...

        console.log(artist);
    });
});