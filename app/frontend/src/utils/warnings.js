import { slideInRight } from "../components/alert_animations.js";
import { slideOutRight } from "../components/alert_animations.js";

export var warnings = json =>{
    
    const alert_modal = document.querySelector('.alert-modal');
    const alert = document.querySelector('.alert');

    if(json){
        
        alert_modal.style.display = 'block';
    
        if(json.success){
            
            if(json.message){
                slideInRight(alert, json.message);
    
                setTimeout(()=>{
                    slideOutRight(alert);
                }, 2000);
            }
    
            if(json.redirect){
                setTimeout(()=>{
                    window.location.href = json.redirect;
                }, 2000);
            }
            
    
        }else{
            if(json.message){
                alert.classList.add('alert-error');
                slideInRight(alert, json.message);
                setTimeout(()=>{
                    slideOutRight(alert);
                }, 2000);
            }
        }
    }

}



