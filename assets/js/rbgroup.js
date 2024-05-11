//----------------
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
};

function alphaOnly(event) {
    if (event.charCode!=0) {
        var regex = new RegExp("^[a-zA-Z]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
};


 function validateImage() {
    var imagesizedisplay = $("#maxsizedisplay").val();
    var imagesize = $("#maxsizefileupload").val();
    var formData = new FormData();
 
    var file = document.getElementById("report-screenshot").files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert("Please select a valid image file");
        document.getElementById("report-screenshot").value = '';
        return false;
    }
    if (file.size > (1024000 * parseInt(imagesize))) {
        alert("Max Upload size is "+imagesizedisplay+" only");
        document.getElementById("report-screenshot").value = '';
        return false;
    }
    return true;
}

function validateProImage(name) {
    var imagesizedisplay = $("#maxsizedisplay").val();
    var imagesize = $("#maxsizefileupload").val();
      
    var formData = new FormData();
 
    var file = document.getElementById(name).files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert("Please select a valid image file");
        document.getElementById(name).value = '';
        return false;
    }
    if (file.size > (1024000 * parseInt(imagesize))) {
        alert("Max Upload size is "+imagesizedisplay+" only");
        document.getElementById(name).value = '';
        return false;
    }
    return true;
}

//---------------validateBrochure
function validateBrochure(name) {
    var formData = new FormData();
    
    var file = document.getElementById(name).files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "pdf") {
        alert("Please select a valid Brochure file");
        document.getElementById(name).value = '';
        return false;
    }
    if (file.size > 2048000) {
        alert("Max Upload size is 2MB only");
        
        document.getElementById(name).value = '';
        return false;
    }
    return true;
}
