function openPopup(tab) {
  var popup = document.getElementById("popup");
  popup.style.display = "block";

  if (tab === 'signin') {
    showTab('signin-tab');
  } else {
    showTab('signup-tab');
  }
}

function closePopup() {
  var popup = document.getElementById("popup");
  popup.style.display = "none";
  clearForm();
  clearSuccessMessage();
}

function showTab(tabName) {
  var tabs = document.getElementsByClassName("tab-content");
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].style.display = "none";
  }

  document.getElementById(tabName).style.display = "block";
}

window.onclick = function (event) {
  var popup = document.getElementById("popup");
  if (event.target == popup) {
    popup.style.display = "none";
    clearForm();
    clearSuccessMessage();
  }
}

function submitForm(event) {
  event.preventDefault();

  var formData = {
    first_name: $('#first-name').val(),
    last_name: $('#last-name').val(),
    email: $('#email1').val(),
    username: $('#username').val(),
    password: $('#password1').val(),
    account_type: $('#account-type').val()
  };

  console.log('Form Data:', formData);

  $.ajax({
    type: 'POST',
    url: 'signup_processor.php',
    data: formData,
    success: function(response) {
      console.log('Server response:', response);
      var jsonResponse = JSON.parse(response);

      if (jsonResponse.hasOwnProperty("success")) {
        openPopup('signin');
        displaySuccessMessage(jsonResponse.success); 
        clearForm();
      } else if (jsonResponse.hasOwnProperty("error")) {
        displayErrorMessage(jsonResponse.error);
      }
    },
    error: function(_, status, error) {
      console.error('AJAX request failed:', status, error);
    }
  });
}

function login(event) {
  event.preventDefault();

  var formData = {
    email: $('#email2').val(), 
    password: $('#password2').val() 
  };

  console.log('Login Data:', formData);

  $.ajax({
    type: 'POST',
    url: 'login_processor.php', 
    data: formData,
    success: function(response) {
      console.log('Server response:', response);
      var jsonResponse = JSON.parse(response);

      if (jsonResponse.hasOwnProperty("success")) {
        var accountType = jsonResponse.account_type;

        if (accountType === "Admin" || accountType === "admin") {
          window.location.href = "adminDash.php";
        } else {
          window.location.href = "home.php";
        }

        clearLoginForm();
      } else if (jsonResponse.hasOwnProperty("error")) {
        displayLoginErrorMessage(jsonResponse.error);
      }
    },
    error: function(_, status, error) {
      console.error('AJAX request failed:', status, error);
      displayLoginErrorMessage("An error occurred. Please try again later."); 
    }
  });
}

function displayLoginErrorMessage(message) {
  var errorMessageElement = $('#loginErrorMessage');
  errorMessageElement.text(message);
  errorMessageElement.show(); 
  $('.login-error').text(message);
}


function clearLoginForm() {
  $('#email').val('');
  $('#password').val('');
  $('.login-error').text('');
}


function displayErrorMessage(errorMessage) {
  $('.error').text(errorMessage + ". Please choose a different one.");
}

function displaySuccessMessage(successMessage) {
  $('.success').text(successMessage);
}

function clearForm() {
  $('#first-name').val('');
  $('#last-name').val('');
  $('#email').val('');
  $('#email1').val('');
  $('#username').val('');
  $('#password').val('');
  $('#password1').val('');
  $('#account-type').val('');
  $('.error').text('');
}

function clearSuccessMessage() {
  $('.success').text('');
}

function toggleDropdown() {
    var dropdownContent = document.getElementById("logoutDropdown");
    if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
    } else {
        dropdownContent.style.display = "block";
    }
}

