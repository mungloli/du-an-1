function check_option(el){
    let divConten=el.parentElement.parentElement;
    let inputChild= divConten.querySelectorAll(".inputChild");
    if(el.checked){
        inputChild.forEach(element => {
            element.removeAttribute("disabled");
            element.classList.remove('bg-gray-200');
        });

    }else{
        console.log('123');
        inputChild.forEach(element => {
            element.setAttribute("disabled","true");
            element.classList.add('bg-gray-200');
        });
    }
}
