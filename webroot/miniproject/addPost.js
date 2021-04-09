function clearFields(){
    var confirmation = confirm("Are you sure you want to clear all the fields in this post? (You can revert back to the previous text)");
    if(confirmation == true)
    {
        return true;
    }
    return false;
}

document.getElementById('post').addEventListener('click',post);

function post(event){
    if(document.getElementById("title").value == ""){
        event.preventDefault();
        document.getElementById("title").style.border = "3pt red solid";
    }
    
    if(document.getElementById("blogText").value == ""){
        event.preventDefault();
        document.getElementById("blogText").style.border = "3pt red solid";
    }

}
