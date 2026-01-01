export var Core = async (action, formData) =>{
    try{
        const response = await fetch(`../../../index.php?action=${action}`, {
            body:formData,
            method:'POST'
        });
        const json_response = await response.json();

        //console.log(json_response)
        return json_response;

    }catch(err){
        console.log(err);
    }
}