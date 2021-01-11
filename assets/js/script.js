const sendForm = ( formId ) =>{
    
    const elements = Object.values(document.getElementById(formId).elements);
    let valid = 0;
    let field = '';
    let m = ''
    elements.forEach((e)=>{
        if( e.name !='' && e.value === '' ){
            valid++;
            field = e.name.toUpperCase();
            m = 'Enter the '+ field;
        }else if(e.name =='password' && e.value.length < 8){
            valid++;
            field = e.name.toUpperCase();
            m = field+ ' password must be 8 characters or more';
        }          
    });
    if( valid === 0){

        $('#'+formId).submit();

    }else{
        const message = '<div class="alert alert-warning" role="alert">'+m+'</div>';
        $('#errores-js').html(message);
        return false;
    }

}