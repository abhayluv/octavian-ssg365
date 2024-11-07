/*-------left-panel-bottom-user-profile-logout--------*/

$(document).ready(function() {
    $(".userinfo-dots a").click(function() {
      $('.userprofile-logout').slideToggle(300);
    });
    $('body').click(function(evt){    
      if($(evt.target).closest('.userinfo-dots a, .userprofile-logout').length)
      return;
      $('.userprofile-logout').slideUp(300);
    });
 });

/*----------------*/

/*-------left-panel-top-switchbox-popup--------*/

$(document).ready(function() {
    $(".switch-acc").click(function() {
      $('.switch-box').slideToggle(300);
    });
    $('body').click(function(evt){    
      if($(evt.target).closest('.switch-acc, .switch-box').length)
      return;
      $('.switch-box').slideUp(300);
    });
 });

/*----------------*/

/*-------left-panel-bottom-Support-popup--------*/

$(document).ready(function() {
    $(".support-box").click(function() {
        $('.support-main').slideToggle(300);
    });
    $('body').click(function(evt){    
        if($(evt.target).closest('.support-box, .support-main').length)
        return;
        $('.support-main').slideUp(300);
    });
});


$('.support-h a').on('click', function(){
    $('.support-main').slideUp(300);
});

$('a.support-start-conv').on('click', function(){
    $('.support-main').slideUp(300);
});

/*----------------*/


$(".support-btns a.support-start-conv, .search-form .search-dark-icon").click(function(){
    $("html").addClass("leftpopup");
});

$(".veri-btn button.btn, button.btn-close, .modal-colse-btn button.btn-white, .modbtnclose" ).click(function(){
    $("html").removeClass("leftpopup");
});



const mobileBreakpoint = window.matchMedia("(max-width: 1199px )");

$(document).ready(function(){
    $(".menu-toggle").click(function(){
        if (mobileBreakpoint.matches) {
            $(".dash-nav").toggleClass("mobile-show");
            $("body").toggleClass("mobile-show-body");
            $("html").toggleClass("mobile-show-html");
            $(".menu-ovelay").toggleClass("show-overlay");
        } else {
            $(".dash").toggleClass("dash-compact");
        }
    });
});


/*---left-panel-inputfile-browser popup------*/

function support_conv(event) {
    var fileName = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("support-conv-browser");
    var previewImg = document.createElement("img");
    previewImg.setAttribute("src", fileName);
    preview.innerHTML = "";
    preview.appendChild(previewImg);
 }
 function support_drag() {
    document.getElementById('SupportUploadFile').parentNode.className = 'draging dragBox';
 }
 function support_drop() {
    document.getElementById('SupportUploadFile').parentNode.className = 'dragBox';
 }

 /*-------------*/

 /* --- Start:: Common Js --- */
 function TimeoutText(id, delay=2000){
    setTimeout(() => {
        $('#'+id).text('');
    }, delay);
 }

 function scrollTo(id, time=1000){
    $([document.documentElement, document.body]).animate({
        scrollTop: $("#"+id).offset().top
    }, time);
 }

 function MsgVal(key='default'){
    let data = [];
    data['default']      = 'Please select this field';
    data['coach_select'] = 'Please select coach';
    return data[key];
 }

 function SuccessMsg(msg){
    Toastify({
        text: msg,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#4fbe87",
    }).showToast();
 }

 function ErrorMsg(msg){
    Toastify({
        text: msg,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#f27474",
    }).showToast();
 }

 function validateEmail(email){
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
 }
 /* --- End:: Common Js --- */


