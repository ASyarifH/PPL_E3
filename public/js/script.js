$(document).ready(function () {
  $('#form').submit(function (event) {
    event.preventDefault();

    // ambil value dari input
    var email = $('#email').val();
    var password = $('#password').val();

    // validasi input
    var error = false;
    if (email.length === 0) {
      $('#email').addClass('is-invalid');
      $('#email').after('<span class="text-danger">email harus diisi</span>');
      error = true;
    }
    if (password.length === 0) {
      $('#password').addClass('is-invalid');
      $('#password').after('<span class="text-danger">Password harus diisi</span>');
      error = true;
    }
    if (!error) {
      // $('#form-input')[0].submit();
      window.location.replace('index.html');
    }
  });
});
