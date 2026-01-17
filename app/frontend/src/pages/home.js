import { core } from "../core/core.js";
import { printArtworks } from "../utils/print_artworks.js";

var getFeaturedArtworks = async()=>{
    const server_response =  await core('getAllArtworks', null);
    printArtworks(null, server_response);
}
getFeaturedArtworks();