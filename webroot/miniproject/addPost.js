function clearFields(){

    var confirmation = confirm("Are you sure you want to clear all the fields in this post? (You can't revert back to the previous text).");
    if(confirmation == true)
    {
        document.getElementById("title").value = "";
        document.getElementById("blogText").value = "";
        return true;
    }
    return false;
}

document.getElementById('post').addEventListener('click',post);
document.getElementById('preview').addEventListener('click',post);

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
