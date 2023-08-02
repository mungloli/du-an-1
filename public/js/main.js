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


// var list_li=document.querySelectorAll('.list_li');
// function sidebar_active(index){
//         list_li.forEach(el =>{
//             console.log("abc");
//             el.classList.remove('border-r-green-900');
//         })
//         list_li[index].classList.add('bg-green-600');
//     }
//     sidebar_active(0);
// list_li.forEach((element,index)=>{
//     element.addEventListener('click',e=>{
//         console.log("a");
//        sidebar_active(index);
//     })
// }
// )

