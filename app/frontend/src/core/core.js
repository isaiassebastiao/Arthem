export var core = async (action, form_data) =>{
    try{
        const response = await fetch(`../../../index.php?action=${action}`, {
            body:form_data,
            method:'POST'
        });
        const json_response = await response.json();
        return json_response;

    }catch(err){
        console.log(err);
    }
}