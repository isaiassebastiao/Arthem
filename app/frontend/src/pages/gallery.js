import { core } from "../core/core.js";
import { printArtworks } from "../utils/print_artworks.js";

var getAllArtworks = async()=>{
    const server_response = await core('getAllArtworks', null);
    console.log(server_response)
    printArtworks(server_response, null);
}

getAllArtworks();