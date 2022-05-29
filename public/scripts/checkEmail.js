const baseUrl = 'http://localhost/';
$(document).ready(() => { 
  if ($('#email').val() == ''){
      $('#submit_btn').prop('disabled', true);
    }

  $('#email').blur(function () {

    if ($('#email').val() !== ''){
      const url = baseUrl + 'UserController/checkEmail';
    
      $.get(url, { 'email': $('#email').val() },  (rawData) => {
        let result = JSON.parse(JSON.stringify(rawData));
        showCheckIconEmail(result['isUsed']);
      });
    }else{
      $('#submit_btn').prop('disabled', true);
    } 
  });
  
  function showCheckIconEmail(flag) {
    $('#error-img-container').css('display', 'flex');
    if (flag) {
      setErrorEmailStyle();
    } else {
      setOkEmailStyle();
    }
  };
});

function setErrorEmailStyle(){
  $('#error-img-container').css('background-color','brown');
  $('#error-img-container').css('border','solid 3px red');
  $('#okEmailCheck').css('display', 'none');
  $('#okMsgEmailCheck').css('display', 'none');
  $('#errorEmailCheck').css('display', 'block');
  $('#errorMsgEmailCheck').css('display', 'block');
  $('#submit_btn').prop('disabled', true);
}

function setOkEmailStyle() {
  $('#error-img-container').css('background-color','green');
      $('#error-img-container').css('border','solid 3px black');
      $('#okEmailCheck').css('display', 'block');
      $('#okMsgEmailCheck').css('display', 'block');
      $('#errorEmailCheck').css('display', 'none');
      $('#errorMsgEmailCheck').css('display', 'none');
      $('#submit_btn').prop('disabled', false);
}