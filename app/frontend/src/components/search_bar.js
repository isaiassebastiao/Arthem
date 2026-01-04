import { fillTable } from "../pages/artist_dashboard.js";

export var searchBar = artworks =>{
    
    search_bar.oninput = ()=>{

        const value = search_bar.value.toLowerCase();

        const search_result = artworks.filter(artwork => artwork.title.toLowerCase().includes(value));

        //console.clear();
        //console.log(search_result);

        fillTable(search_result);
    }

}