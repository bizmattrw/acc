function fetch(type, str) {
    if (str == "") {
        //document.getElementById(type).innerHTML = "<option></option>";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                $('#' + type).removeAttr("disabled");
                //$('#' + type).html(this.responseText);
                document.getElementById(type).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxget.php?q="+str+"&type="+type, true);
        xmlhttp.send();
    }
}

function readImageURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $("#image").removeAttr("hidden");
            $("#image").fadeIn(6000);
            $('#image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}