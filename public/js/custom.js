(function(){
  'use strict';
  
  function confirmDel(event) {
    event.preventDefault();
    const token = document.getElementsByName("_token")[0].value;
    console.log(token);
    if (confirm('Are you sure you want to DELETE this user?')) {
      // let ajax = new XMLHttpRequest();
      $.ajax({
        url: event.target.parentNode.href,
        type: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': token
        },
        success: function(result) {
          window.location.href = "users";
        },
        error: function(err) {
          console.log('error deleting user:' + err);
        }
    });
    } else {
      return false;
    }
  }

  if (document.querySelector('.user-delete')) {
    let btnDelete = document.querySelectorAll('.user-delete');

    for (let i = 0; i < btnDelete.length; i++) {
      btnDelete[i].addEventListener('click', confirmDel, false);
      
    }
  }
  
})(window, document);