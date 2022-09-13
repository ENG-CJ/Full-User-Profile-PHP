let out=document.getElementById("logout");
out.addEventListener("click",logout);


function logout(e){
    alert("hello")

        let data={
            action : "logout"
           
        };
        $.ajax({

            method : "POST",
            dataType : "JSON",
            url : "./login_api.php",
            data : data,
            success : function(response){
                    let dataRes=response.data;
                    let status = response.status;
                  
            },
            error : function(response){
                let text = response['responseText']
                let dataRes=response.data;
                    let status = response.status;
                    if (status){
                        DisplayMessage("error",dataRes);
                    }
                   
                   
            }


        })
       
}