$(document).ready(function () {
 //-------------------------------------------------------Validation on Reset Password-----------------------------------------------------------------------//

    $("#txt_NewPassword").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_CompComName_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z0-9 @.]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_CompComName_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#txt_NewPassword').on("cut copy paste", function (e) {
        e.preventDefault();
    });
    $("#txt_ConfirmPassword").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_CompComName_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z0-9 @.]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_CompComName_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#txt_ConfirmPassword').on("cut copy paste", function (e) {
        e.preventDefault();
    });

//-------------------------------------------------------Validation on Reset Password End-----------------------------------------------------------------------//

    $("#txt_CompComName").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_CompComName_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_CompComName_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#txt_CompComName').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $("#txt_companyAddress").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_companyAddress_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_companyAddress_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#txt_companyAddress').on("cut copy paste", function (e) {
        e.preventDefault();
    });

   
    //-------------------------------------------------------Validation on Email for Key Managerial Person Details-----------------------------------------------------------------------//
    $("#txt_keyname").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_keyname_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_keyname_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#txt_keyname').on("cut copy paste", function (e) {
        e.preventDefault();
    });
    $("#txt_keydesig").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_keydesig_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_keydesig_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#txt_keydesig').on("cut copy paste", function (e) {
        e.preventDefault();
    });
    //----------------------------------------------for Contact No (Mobile No.) ----------------------------------------------------------------------//
    $("#txt_keyContactNo").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_keyContactNo_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[0-9]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_keyContactNo_lblError").html("Only Number are allowed.");
        }
        return isValid;
    });
    $('#txt_keyContactNo').on("cut copy paste", function (e) {
        e.preventDefault();
    });
    $('#txt_keyContactNo').keypress(function (e) {
        if (this.value.length == 0 && e.which == 48) {
            return false;
        }
    });

    $("#txt_keyEmailid").keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#txt_keyEmailid_lblError").html("");

        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z0-9 @.]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_keyEmailid_lblError").html("Only Alphabets and Numbers allowed.");
        }

        return isValid;
    });

    $('#txt_keyEmailid').on("cut copy paste", function (e) {
        e.preventDefault();
    });
    //-------------------------------------------------------Validation on Email for Authorised Representative Details-----------------------------------------------------------------------//

    $("#txt_Repname").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_Repname_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_Repname_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });

    $('#txt_Repname').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $("#txt_RepDesig").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_RepDesig_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_RepDesig_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });

    $('#txt_RepDesig').on("cut copy paste", function (e) {
        e.preventDefault();
    });
    //----------------------------------------------for Contact No (Mobile No.) ----------------------------------------------------------------------//
    $("#txt_RepContactNo").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_RepContactNo_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[0-9]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_RepContactNo_lblError").html("Only Number are allowed.");
        }
        return isValid;
    });
    $('#txt_RepContactNo').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $('#txt_RepContactNo').keypress(function (e) {
        if (this.value.length == 0 && e.which == 48) {
            return false;
        }
    });


    $("#txt_RepEmailid").keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#txt_RepEmailid_lblError").html("");

        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z0-9 @.]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_RepEmailid_lblError").html("Only Alphabets and Numbers allowed.");
        }

        return isValid;
    });

    $('#txt_RepEmailid').on("cut copy paste", function (e) {
        e.preventDefault();
    });
//=============================================================Validation for Procuring Entity Details====================================//

    $("#txt_ProcuringEntityAddress").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_ProcuringEntityAddress_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z0-9- ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_ProcuringEntityAddress_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#txt_ProcuringEntityAddress').on("cut copy paste", function (e) {
        e.preventDefault();
    });



    $("#txt_Procuring_PINCode").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_Procuring_PINCode_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[0-9]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_Procuring_PINCode_lblError").html("Only Number are allowed.");
        }
        return isValid;
    });
    $('#txt_Procuring_PINCode').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $('#txt_Procuring_PINCode').keypress(function (e) {
        if (this.value.length == 0 && e.which == 48) {
            return false;
        }
    });


    $("#txt_concernPersonName").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_concernPersonName_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_concernPersonName_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#txt_concernPersonName').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $("#txt_ConcernPersonDesignation").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_ConcernPersonDesignation_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_ConcernPersonDesignation_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });

    $('#txt_ConcernPersonDesignation').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $("#txt_ConcernPersonContactNumber").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_ConcernPersonContactNumber_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[0-9]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_ConcernPersonContactNumber_lblError").html("Only Number are allowed.");
        }
        return isValid;
    });
    $('#txt_ConcernPersonContactNumber').on("cut copy paste", function (e) {
        e.preventDefault();
    });
    $('#txt_ConcernPersonContactNumber').keypress(function (e) {
        if (this.value.length == 0 && e.which == 48) {
            return false;
        }
    });

    $("#txt_peEmailid").keypress(function (e) {
        var keyCode = e.keyCode || e.which;

        $("#txt_peEmailid_lblError").html("");

        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z0-9 @.]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_peEmailid_lblError").html("Only Alphabets and Numbers allowed.");
        }

        return isValid;
    });
    $('#txt_peEmailid').on("cut copy paste", function (e) {
        e.preventDefault();
    });

//=============================================================Validation for Tender Details====================================//
   
    $("#txt_tenderNumber").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_tenderNumber_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z0-9_-]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_tenderNumber_lblError").html("Only alphabets and numeric are allowed.");
        }
        return isValid;
    });
    $('#txt_tenderNumber').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $('#txt_tenderNumber').keypress(function (e) {
        if (this.value.length == 0 && e.which == 48) {
            return false;
        }
    });


    $("#tenderDetail_ProcuringItemDescription").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#tenderDetail_ProcuringItemDescription_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#tenderDetail_ProcuringItemDescription_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });
    $('#tenderDetail_ProcuringItemDescription').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $("#txt_grievancedetails").keypress(function (e) {
        debugger;
        var keyCode = e.keyCode || e.which;
        $("#txt_grievancedetails_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[a-zA-Z ]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_grievancedetails_lblError").html("Only Alphabets are allowed.");
        }
        return isValid;
    });

    //$('#txt_grievancedetails').keypress(function () {
    //    if (this.value.length <= 200)
    //        $("#txt_grievancewords_lblError").html("Word Must be less than 200.");
    //        return false;
    //});

    $('#txt_grievancedetails').on("cut copy paste", function (e) {
        e.preventDefault();
    });

    $("#txt_evtrs").keypress(function (e) {
        var keyCode = e.keyCode || e.which;
        $("#txt_evtrs_lblError").html("");
        //Regex for Valid Characters i.e. Alphabets and Numbers.
        var regex = /^[0-9]+$/;
        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#txt_evtrs_lblError").html("Only Number are allowed.");
        }
        return isValid;
    });
    $('#txt_evtrs').on("cut copy paste", function (e) {
        e.preventDefault();
    });
});


/* ===================================================================================Validatton for tender pdf file start==========================================*/
function validate(id) {
    return tender_filevalidate(id);

}
function correspond_validate(id) {
    return correspondfile_Validation(id);
}

function tender_filevalidate(id) {
    var tender_file_err = 'tender_file_err';
    var tender_upload_cv = $('#' + id);
    $("#" + tender_file_err).html("");
    var status = false;
    var msg = "";
    var allowedFiles = [".pdf"];
    var fileUpload = $("#" + id);
    var filvalue = $("#" + id).val();
    var filvaluearr = filvalue.split('.');
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    if (!regex.test(fileUpload.val().toLowerCase())) {
        msg += "Please upload files having extensions .pdf\n";
        $("#" + id).val("");
        status = false;
    }
    if (filvaluearr.length > 2) {
       
        msg += " does not contain Multiple .(dot)";
        $("#" + id).val("");
        status = false;
    }
    if (msg != "") {
        tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please upload (.pdf) file but ' + msg + ' </p></span>');
    } else {
        $("#" + tender_file_err).html("");
    }
    return status;
}

/* ===================================================================================Validatton for tender pdf file End==========================================*/

/* ===================================================================================Validatton for Correspond pdf file start==========================================*/
function correspondfile_Validation(id) {
    debugger;
    var correspondfile_err = 'correspond_file_err';
    var tender_upload_cv = $('#' + id);
    $("#" + correspondfile_err).html("");
    var status = false;
    var msg = "";
    var allowedFiles = [".pdf"];
    var fileUpload = $("#" + id);
    var filvalue = $("#" + id).val();
    var filvaluearr = filvalue.split('.');
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    if (!regex.test(fileUpload.val().toLowerCase())) {
        msg += "Please upload files having extensions .pdf\n";
        $("#" + id).val("");
        status = false;
    }
    if (filvaluearr.length > 2) {

        msg += " does not contain Multiple .(dot)";
        $("#" + id).val("");
        status = false;
    }
    if (msg != "") {
        tender_upload_cv.parent().after('<span id=' + correspondfile_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please upload (.pdf) file but ' + msg + ' </p></span>');
    } else {
        $("#" + correspondfile_err).html("");
    }
    return status;
}
/* ===================================================================================Validatton for Correspond pdf file End==========================================*/
function validation() {
    debugger;
    var txt_IsCentrallyFunded = false;
    if ($("input[name='procuringEntityDetail.SetIsCentrallyFunded.IsCentrallyFunded1']:checked").val() == "true") {
        $("#IscentrallyFundedhndId").val($("#procuringEntityDetail_SetIsCentrallyFunded_IsCentrallyFunded1").val());
        txt_IsCentrallyFunded = $("#procuringEntityDetail_SetIsCentrallyFunded_IsCentrallyFunded1").val();
    } else if ($("input[name='procuringEntityDetail.SetIsCentrallyFunded.IsCentrallyFunded2']:checked").val() == "false") {
        $("#IscentrallyFundedhndId").val($("#procuringEntityDetail_SetIsCentrallyFunded_IsCentrallyFunded2").data-val());
        txt_IsCentrallyFunded = $("#procuringEntityDetail_SetIsCentrallyFunded_IsCentrallyFunded2").val();
    } else {
        txt_IsCentrallyFunded
    }
    var txt_tenderPertainTo = $("#central_state_Id").val();
    var txt_procuringministryid= $("#procuringministryid").val();
    var txt_ProcuringId = $("#procuringid").val();
    var txt_ProcuringMinistryName = $("#txt_ProcuringMinistryName").val();
    var txt_concernProcuringName = $("#txt_ConcernProcuringName").val();
    var txt_stateid = $("#stateid").val();
    var txt_districtidBD = $("#districtidBD").val();
    var txt_EntityAddress = $("#txt_ProcuringEntityAddress").val();
    var txt_key_PINCode = $("#txt_Procuring_PINCode").val();
    var txt_PersonName = $("#txt_concernPersonName").val();
    var txt_PersonDesignation = $("#txt_ConcernPersonDesignation").val();
    var txt_PersonContactNumber = $("#txt_ConcernPersonContactNumber").val();
    var txt_rep_PE_Emailid = $("#txt_peEmailid").val();
    var tempContainer1 = txt_tenderPertainTo + txt_IsCentrallyFunded + txt_procuringministryid + txt_ProcuringId + txt_ProcuringMinistryName + txt_concernProcuringName
        + txt_stateid + txt_districtidBD + txt_EntityAddress + txt_key_PINCode + txt_PersonName + txt_PersonDesignation + txt_PersonContactNumber
        + txt_rep_PE_Emailid;
    var shaObj = new jsSHA(tempContainer1, "ASCII");
    var TempIput = shaObj.getHash("SHA-256", "HEX");
    $("#procuringEntityhdnId").val(TempIput);


}

/** Updated Validation */
//     function validate() {
//     return validate_file();
//     }

//     function validate_file() {
//         alert('Naresh');
//     debugger;
//     var tender_file_err = 'tender_file_err';
//     $("#" + tender_file_err).html("");
//     var tender_upload_cv = $('#photograph');
//     var file1 = $('#photograph')[0].files[0];
//     var file = $('#photograph')[0].files[0].name;
//     var ext = file.split('.');
//     var extLength = ext.length;
//     var extension = ext[0];
//     ext = ext[ext.length - 1].toLowerCase();
//     alert(ext+" "+extLength+" "+extension);
//     switch (ext) {
//         case 'jpg':
//             tender_upload_cv.val("")
//             tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> do not  upload (.jpg,.jpeg,.png,.bmp,.gif,.txt) File</p></span>');
//             return false;
//             break;
//         case 'jpeg':
//             tender_upload_cv.val("")
//             tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> do not  upload (.jpg,.jpeg,.png,.bmp,.gif,.txt) File</p></span>');
//             return false;
//         case 'png':
//             tender_upload_cv.val("")
//             tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> do not  upload (.jpg,.jpeg,.png,.bmp,.gif,.txt) File</p></span>');
//             return false;
//         case 'gif':
//             tender_upload_cv.val("")
//             tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> do not  upload (.jpg,.jpeg,.png,.bmp,.gif,.txt) File</p></span>');
//             return false;
//             break;
//         case 'bmp':
//             tender_upload_cv.val("")
//             tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> do not  upload (.jpg,.jpeg,.png,.bmp,.gif,.txt) File</p></span>');
//             return false;
//             break;
//         case 'ini':
//             tender_upload_cv.val("")
//             tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> do not  upload (.jpg,.jpeg,.png,.bmp,.gif,.txt) File</p></span>');
//             return false;
//             break;
//         default:
//             if (ext == "pdf") {
//                 if (extLength == 2) {
//                     var fileType = file1.type; // holds the file types
//                     var match = ["application/pdf"]; // defined the file types
//                     var fileSize = file1.size; // holds the file size
//                     var maxSize = 2 * 1024 * 1024; // defined the file max size

//                     // Checking the Valid Image file types  
//                     if (!((fileType == match[0]) || (fileType == match[1]))) {
//                         tender_upload_cv.val("");
//                         tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please select a valid (.pdf) file.</p></span>');
//                         return false;
//                     } else {
//                         $("#" + tender_file_err).html("");
//                     }
//                     // Checking the defined image size
//                     if (fileSize > maxSize) {
//                         tender_upload_cv.val("");
//                         tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> Please select a file less than 2mb of size.</p></span>');
//                         return false;
//                     } else {
//                         $("#" + tender_file_err).html("");
                       
//                     }
//                 } else {
//                     tender_upload_cv.val("")
//                     tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> do not  upload (.jpg,.jpeg,.png,.bmp,.gif,.txt) File</p></span>');
//                     return false;
//                 }
//                 this.value = '';
//             } else {
//                 tender_upload_cv.val("")
//                 tender_upload_cv.parent().after('<span id=' + tender_file_err + '><p class="text-danger"><i class="fa fa-times" aria-hidden="true"></i> do not  upload (.jpg,.jpeg,.png,.bmp,.gif,.txt) File</p></span>');
//                 return false;
//             }
//     }

// }