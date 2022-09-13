let log=document.getElementById("login");

log.addEventListener("click",Login);



function Login(e){
    let email = document.getElementById("email").value;
    let pass = document.getElementById("password").value;

    if (isEmpty(email,pass))
        DisplayMessage("error","Fill Required Information")
    
    else
       {
        let data={
            action : "search_user",
            email : email,
            password : pass
        };
        $.ajax({

            method : "POST",
            dataType : "JSON",
            url : "./login_api.php",
            data : data,
            success : function(response){
                    let dataRes=response.data;
                    let status = response.status;
                    if (status){
                        clear(
                            document.getElementById("email"),
                            document.getElementById("password"),
                           )
                       window.location="welcome.php"
                     
                    }else
                    DisplayMessage("error",dataRes);
            },
            error : function(response){
                let text = response['responseText']
                let dataRes=response.data;
                    let status = response.status;
                    if (status){
                        DisplayMessage("error",dataRes);
                    }
                    DisplayMessage("error",text);
                   
            }


        })
       }
}



function DisplayMessage(type, message){

    let msg= document.getElementById("message");
    let divElement = document.querySelector(".spans");
    if (type=="error");
      {
        msg.innerHTML=message
        divElement.classList.add("show");
        setTimeout(()=>{
           divElement.classList.remove("show")
        },4000)
      }
}

// validate
function isEmpty(email,password){
    if (email=="" || password=="")
    return true;
    else
    return false;
}

function clear(email,password){
    email.value="";
    password.value="";
}