document.addEventListener("DOMContentLoaded", ()=>{

    //modal change password
    const changePasswordShowModal=document.querySelector(".changePasswordShowModal");
    const changePasswordModalWrapper=document.querySelector(".changePasswordModalWrapper");
    const changePasswordCloseModal=document.querySelector(".changePasswordCloseModal");

    if(changePasswordShowModal){

        changePasswordShowModal.addEventListener("click", ()=>{
            
            changePasswordModalWrapper.classList.remove("d-none");
        });
        
        
        changePasswordCloseModal.addEventListener("click", ()=>{
            changePasswordModalWrapper.classList.add("d-none");
        });
    }
});