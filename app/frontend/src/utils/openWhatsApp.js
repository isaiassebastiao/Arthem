
export var openWhatsApp = async artwork_array=>{

    artwork_array.forEach(artwork=>{
        
        const number = "244" + artwork.phone_number;
        
        const message = `
        
        Olá, ${artwork.nome}! 
        
        Tenho interesse na obra: "${artwork.title}" 
        
        Preço: ${artwork.price} AOA
        
        Podemos conversar sobre a compra ?
        `;

        const url = `https://wa.me/${number}?text=${encodeURIComponent(message)}`;

        window.open(url, "_blank");
    });
}