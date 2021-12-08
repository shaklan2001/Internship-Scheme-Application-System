$(document).ready(function() {
    $('#complianceTbl').DataTable({
        "pageLength": 10,
        'info': true,
        "order": [
            //[0, "desc"]
        ]
    });
    $('#userTable').DataTable({
        "pageLength": 10,
        'info': true,
        "order": [
            //[0, "desc"]
        ]
    });
    $(".alert").fadeTo(2000, 600).slideUp(600, function() {
        $(".alert").slideUp(600);
      });
});

/*$('#ssi-upload4').ssi_uploader({
    //url: "{{route('Upload-Complince-Doc')}}",
    inForm: true,
    preview: true,
    dropZone: false,
    allowed: ["pdf"]
}); */

function formSubmit() {
    //event.preventDefault();
    var route = $('#AddActForm').attr('action');
    var formData = $("#AddActForm").serialize();

    var ajaxReq = PostAjaxRequest(route, formData);

    OnSuccess = function(rtnData) {
        // ReloadActsLists(rtnData)
        // $('#addAct').modal({
        //     hide: true
        // });
        $('#addAct').modal('hide');
        $('#act').append("<option value="+rtnData['act_id']+">"+rtnData['act_name']+"</option>").trigger("change");
    }

    OnError = function(rtnData) {
        var errorMsgs = rtnData.responseJSON.errors;
        ShowValidationErrors(errorMsgs);
    }

    PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);

    // $.ajax({
    //     type: "POST",
    //     url: route,
    //     data: $("#AddActForm").serialize(),
    //     success: function(rtnData) {

    //     },
    //     error: function(rtnData) {

    //         var errorMsgs = rtnData.responseJSON.errors;
    //         ShowValidationErrors(errorMsgs);
    //         // console.log(errorMsgs);

    //         // if (errorMsgs.act) {
    //         //     $('#invalid-act').html(errorMsgs.act[0]).removeClass('d-none');
    //         // }
    //         // if (errorMsgs.description) {
    //         //     $('#invalid-description').html(errorMsgs.description[0]).removeClass('d-none');
    //         // }
    //     }
    // });
}

// function formSubmit() {
//     //alert('heeeeee');
//     //event.preventDefault();
//     var route = $('#AddActForm').attr('action');
//     var formData = $("#AddActForm").serialize();
//     var nameValue = document.getElementById("actName").value;

//     var ajaxReq = PostAjaxRequest(route, formData);

//     OnSuccess = function(rtnData) {
//         //ReloadActsLists(rtnData)
//         $('#addAct').modal('hide');
//         $('#act').append("<option value="+rtnData['act_id']+">"+rtnData['act_name']+"</option>").trigger("change");
//     }

//     OnError = function(rtnData) {
//         var errorMsgs = rtnData.responseJSON.errors;
//         ShowValidationErrors(errorMsgs);
//     }

//     PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);


// }
//form Description
function submitFormDescription() {
    //alert('submitFormDescription');
    //event.preventDefault();
    var route = $('#AddActFormDes').attr('action');
    var formData = $("#AddActFormDes").serialize();
    var actDescription = document.getElementById("description").value;

    var ajaxReq = PostAjaxRequest(route, formData);

    OnSuccess = function(rtnData) {
        //console.log(rtnData);
        $('#addActDesc').modal('hide');
        $('#act_desc').html("");
        $('#act_desc').append("<option value="+rtnData['act_desc_id']+">"+rtnData['act_description']+"</option>").trigger("change");
    }

    OnError = function(rtnData) {
        var errorMsgs = rtnData.responseJSON.errors;
        ShowValidationErrors(errorMsgs);
    }

    PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);


}

function UploadModel(URL, data, divId) {
    var ajaxReq = GetAjaxRequest(URL, data);
    OnSuccess = function(rtnData) {
        $('#' + divId).html(rtnData);
        $('#addSuggetionsFile').modal({
            show: true
        });
    }

    OnError = function(rtnData) {
        var errorMsgs = rtnData.responseJSON.errors;
        ShowValidationErrors(errorMsgs);
    }

    PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);
}

function complinceStatus() {
    var route = $('#complinceStatus').attr('action');
    var formData = $("#complinceStatus").serialize();

    var ajaxReq = PostAjaxRequest(route, formData);

    OnSuccess = function(rtnData) {
        $('#complinceStatus').submit();
    }

    OnError = function(rtnData) {
        var errorMsgs = rtnData.responseJSON.errors;
        ShowValidationErrors(errorMsgs);
    }

    PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);
}

function ReloadActsLists(actData) {
    var actListRoutes = "{{route('Acts')}}";
    var ajaxReq = GetAjaxRequest(actListRoutes, null);
    OnSuccess = function(rtnData) {}

    OnError = function(rtnData) {
        var errorMsgs = rtnData.responseJSON.errors;
        ShowValidationErrors(errorMsgs);
    }
    PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);
}

function ShowValidationErrors(errorMsgs) {
    $.each(errorMsgs, function(key, value) {
        $('#invalid-' + key).html(value).removeClass('d-none');
    });
}

function loadAttachmentsModal(URL, data, divId) {
    var route = URL;
    var data = { 'id': data };
    var ajaxReq = GetAjaxRequest(route, data);
    OnSuccess = function(rtnData) {
        $('#' + divId).html(rtnData);
        $('#uploadedFiles').modal({
            show: true
        });
    }
    OnError = function(rtnData) {}

    PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);
}

function loadStatusModal(URL, id, divId) {
    var route = URL;
    var data = { 'id': id };
    var ajaxReq = GetAjaxRequest(route, data);
    OnSuccess = function(rtnData) {
        $('#' + divId).html(rtnData);
        $('#addComplinceStates').modal({
            show: true
        });
    }
    OnError = function(rtnData) {}

    PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);
}

function GetList(route, divId, hideDivId) {
    var ajaxReq = GetAjaxRequest(route, null);
    OnSuccess = function(rtnData) {
        $('#' + divId).html(rtnData).removeClass('d-none');
        $('#' + hideDivId).addClass('d-none');
        $('#departmentList').addClass('d-none');
    }

    OnError = function(rtnData) {
        var errorMsgs = rtnData.responseJSON.errors;
        ShowValidationErrors(errorMsgs);
    }
    PerformAjaxCall(ajaxReq, OnSuccess, OnError, null);
}


// //for sticky div
// window.onscroll = function() {
//     StickyDivComplianceMeter();
// };

/*--------------------------------------------------------------------------------------------*/

/* AJAX Requests - START **/

function GetAjaxRequest(URL, ParamData) {

    var request = MakeAjaxRequest(URL, ParamData, "GET", false)

    return request;
}

function GetAsyncAjaxRequest(URL, ParamData) {

    var request = MakeAjaxRequest(URL, ParamData, "GET", true)

    return request;
}

function PostAjaxRequest(URL, ParamData) {

    var request = MakeAjaxRequest(URL, ParamData, "POST", false)

    return request;
}

function PostAsyncAjaxRequest(URL, ParamData) {

    var request = MakeAjaxRequest(URL, ParamData, "POST", true)

    return request;
}

function MakeAjaxRequest(URL, ParamData, MethodType, IsAsync = true) {

    var request;

    //if (MethodType == "POST") {
    request = $.ajax({
        async: IsAsync,
        method: MethodType,
        url: URL,
        data: ParamData
    });
    //}
    //else {
    //    request = $.ajax({
    //        async: IsAsync,
    //        method: MethodType,
    //        url: URL,
    //        dataType: "json",
    //        data: ParamData
    //    });
    //}
    return request;
}

function GetAjaxRequestFileUpload(URL, ParamData, MethodType = "GET", IsAsync = true) {

    var request;

    //if (MethodType == "POST") {
    request = $.ajax({
        async: IsAsync,
        method: MethodType,
        url: URL,
        contentType: false,
        processData: false,
        data: ParamData
    });
    //}
    //else {
    //    request = $.ajax({
    //        async: IsAsync,
    //        method: MethodType,
    //        url: URL,
    //        dataType: "json",
    //        data: ParamData
    //    });
    //}
    return request;
}

function PerformAjaxCall(AjaxRequest, OnDone, OnFail, Always) {

    AjaxRequest
        .done(OnDone)
        .fail(OnFail)
        .always(Always);
}
/* AJAX Requests - END **/

/*--------------------------------------------------------------------------------------------*/
function LoadPage(elementId, pageURL) {
    $("#" + elementId).load(pageURL, function(e) {
        //RemoveOverlay();
        //$('body').removeClass("body-overflow-hidden");
    });
}

function ShowLoader() {
    $(".loader-overlay").fadeIn();
    //$("body").addClass("load-blur");
}

function HideLoader() {

    //$("body").removeClass("load-blur");
    $(".loader-overlay").fadeOut();
}

/* Ishan */

function Search(searchElementID, searchInElementID) {

    $("#" + searchElementID).on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("." + searchInElementID + ">a").filter(function() {
            $($(this).parent()).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

}

function ShowDepartmentsOnClick() {

    $(".show-dept").on("click", function() {

        var currentElement = $(this);
        var mscode = currentElement.data("mscode");

        var divDept = $(".divDept_"+mscode);

        if(divDept.hasClass("shown")) {
            divDept.slideUp(300, function() {
                $(this).removeClass("shown");
                currentElement.html("Show Departments");
            });
        }
        else {
            divDept.slideDown(300, function() {
                $(this).addClass("shown");
                currentElement.html("Hide Departments");
            });
        }
    });

}

function LoadCounters() {

    $('.counter').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        },
            {
                duration: 1000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(formatNumber(Math.round(now * 100) / 100));
                }
            });
    });
}

function formatNumber(num) {
    var x = num;
    x = x.toString();
    var afterPoint = '';
    // if (x.indexOf('.') > 0)
    //     afterPoint = x.substring(x.indexOf('.'), x.length);
    x = Math.floor(x);
    x = x.toString();
    var lastThree = x.substring(x.length - 3);
    var otherNumbers = x.substring(0, x.length - 3);
    if (otherNumbers != '')
        lastThree = ',' + lastThree;
    var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;

    return res;
}

// Manjesh Audit Code


var isShift = false;
function keyUP(keyCode) {
    if (keyCode == 16)
        isShift = false;
}
  function isValidInput(keyCode) {
if (keyCode == 16)
    isShift = true;
return ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 219 && keyCode <= 221)||
    (keyCode >= 65 && keyCode <= 90) || keyCode == 8 || keyCode == 9  || keyCode == 46 || keyCode == 13 || keyCode == 110 ||
    (keyCode >= 96 && keyCode <= 105) || keyCode == 189 || keyCode == 37 || keyCode == 39 || keyCode == 191 || keyCode == 32 ||((keyCode == 190 ||keyCode == 188) && isShift==false))
}

/*--------------------------------------------------------------------------------------------*/

/* Load DropDown By Id - START **/

function LoadDropDown(Id, DropDownId, URL, ParamData, DoneMsg, ErrorMsg) {
    var alrtmsg = "";

    if (Id == 0 || Id == "") {
        DropDownId.html(GetSelectList(null)).trigger("change");
    }
    else {
        var resolvedURL = URL;

        var OnLoaded = function (data) {
            if (data.List.length == 0) {
                alert(DoneMsg + "\n");
            }
            else {
                DropDownId.html(GetSelectList(data)).trigger("change");
            }
        };
        var OnLoadFail = function (jqXHR, textStatus) {
            alert(ErrorMsg + "\n");
            DropDownId.html(GetSelectList(null)).trigger("change");
        };
        var fnAlways = null;

        var ajaxreq = GetAjaxRequest(resolvedURL, ParamData);
        PerformAjaxCall(ajaxreq, OnLoaded, OnLoadFail, fnAlways);
    }
}
function LoadTeamLeaseDropDown(Id, DropDownId, URL, ParamData, DoneMsg, ErrorMsg) {
    var alrtmsg = "";

    if (Id == 0 || Id == "") {
        DropDownId.html(GetSelectList(null)).trigger("change");
    }
    else {
        var resolvedURL = URL;

        var OnLoaded = function (data) {
            if (data.List.length == 0) {
                DropDownId.html("<option value='0'>Not Applicable</option>").trigger("change");
                //alert(DoneMsg + "\n"); //<option value=''>-Select-</option>
            }
            else {
                DropDownId.html(GetSelectList(data)).trigger("change");
            }
        };
        var OnLoadFail = function (jqXHR, textStatus) {
            alert(ErrorMsg + "\n");
            DropDownId.html(GetSelectList(null)).trigger("change");
        };
        var fnAlways = null;

        var ajaxreq = GetAjaxRequest(resolvedURL, ParamData);
        PerformAjaxCall(ajaxreq, OnLoaded, OnLoadFail, fnAlways);
    }
}

function LoadDropDownForActionReport(Id, DropDownId, URL, ParamData, DoneMsg, ErrorMsg) {
    var alrtmsg = "";

    if (Id == 0 || Id == "") {
        DropDownId.html(GetSelectList(null)).trigger("change");
        DropDownId.hide(300);
    }
    else {
        var resolvedURL = URL;

        var OnLoaded = function (data) {
            //debugger;
            if (data.List.length == 0) {
                //alert(DoneMsg + "\n");
                DropDownId.hide(300);
            }
            else {
                DropDownId.html(GetSelectList(data)).trigger("change");
                debugger;
                if (DropDownId.css("display") == "none") {
                    DropDownId.show(300);
                }
            }
        };
        var OnLoadFail = function (jqXHR, textStatus) {
            alert(ErrorMsg + "\n");
            DropDownId.html(GetSelectList(null)).trigger("change");
        };
        var fnAlways = null;

        var ajaxreq = GetAjaxRequest(resolvedURL, ParamData);
        PerformAjaxCall(ajaxreq, OnLoaded, OnLoadFail, fnAlways);
    }
}

function GetSelectList(data) {

    var items = [];
    items.push("<option value=''>-Select-</option>");

    if (data != null) {
        $.each(data.List, function () {
            items.push("<option value='" + this.Value + "'>" + this.Text + "</option>");
        });
    }

    var selectitems = items.join(' ');

    return selectitems;
}
/* Load DropDown By Id - End **/
