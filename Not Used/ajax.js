// Rainforest theme
$(document).ready(function() {
    $('#rainforest').click(function() {
        $.ajax('selecttheme.php', {  
            success: testMe,
            error: ajaxError,
            data: {action: 'rainforest'}
        });
    });
});

function testMe(data) {
    alert("I work yay!");
}

// Castle theme
/*$(document).ready(function() {
  $("#castle").click(function() {
    alert("castle");
   });
});*/

// Pirate theme

// Ajax error
function ajaxError(jqxhr, type, error) {
  var msg = "An Ajax error occurred!\n\n";
  if (type == 'error') {
    if (jqxhr.readyState == 0) {
      // Request was never made - security block?
      msg += "Looks like the browser security-blocked the request.";
    } else {
      // Probably an HTTP error.
      msg += 'Error code: ' + jqxhr.status + "\n" + 
             'Error text: ' + error + "\n" + 
             'Full content of response: \n\n' + jqxhr.responseText;
    }
  } else {
    msg += 'Error type: ' + type;
    if (error != "") {
      msg += "\nError text: " + error;
    }
  }
  alert(msg);
}