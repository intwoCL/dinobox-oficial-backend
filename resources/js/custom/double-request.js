// Prevenir double request
$('.form-prevent').on('submit', function(){
  $('.button-prevent').attr('disabled','true');
  $('.spinner').show();
});