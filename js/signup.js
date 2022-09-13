errorColor = "#C73E1D";
successColor = "#42ba96";


$("#signup").on("click", signup);



function signup(e) {
    e.preventDefault();
    if ($("#username").val() == "" || $("#email").val() == "" || $("#password").val() == "")
        SetTost("User Info Is Required", errorColor);
    else
        RegisterUser();
}


function RegisterUser() {


    let formData = new FormData();
    formData.append("username", $("#username").val());
    formData.append("password", $("#password").val());
    formData.append("email", $("#email").val());
    realFile = "";
    // formData.append("image", $("#user_image")[0].files[0]);
    formData.append("action", "register");
    responseFromServer(formData,(response)=>{
        console.log(response);
    })
}

function responseFromServer(data, Callback) {
    $.ajax({
        method: "post",
        dataType: "json",
        data: data,
        url: "./api/signup_api.php",
        processData: false,
        contentType: false,
        success: (response) => {
            Callback(response);
        },
        error: (response) => {
            console.log(response);
        }
    })
}
function SetTost(message, background_Color) {
    Toastify({
        text: message, duration: 3000,
        // destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity: "right", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: background_Color,
            fontFamily: "poppins",
            borderRadius: "4px"
        },
        onClick: function () { } // Callback after click
    }).showToast();
}




function load(){
    const dataTransfer = new DataTransfer();
dataTransfer.items.add("E:\\xamp\\htdocs\\user_profile\\uploads\\default.png");//your file(s) reference(s)
document.getElementById('user_image').files = dataTransfer.files;
}