import { Core } from "../core/core.js";
import { printArtworks } from "../utils/print_artworks.js";

var getAllArtworks = async()=>{
    const server_response = await Core('getAllArtworks', null);
    printArtworks(server_response, null);
}

getAllArtworks();