jQuery(document).ready(function(){
  var time = new Date();
  $(".dateofbirth").attr("max",check_date(time));
  
  function check_date(date){
    var d = new Date(date);
    month_select = '' + (d.getMonth() + 1);
    date_select = '' + d.getDate();
    year_select = d.getFullYear();
    if(month_select.length < 2){
      month_select = '0' + month_select;
    }
    if (date_select.length < 2){
      date_select = '0' + date_select;
    }
    var a =year_select + "-" + month_select + "-" + date_select;
    return a;
  };
  
  // 
  $('.selectpicker').selectpicker();
  // language update 07/01
  $("#language-select").click(function(){
    $("#language").removeAttr("data-toggle");
  });
  // date start and finish update 08/01
  var date_start = $("input[name='date_from']");
  var date_finish = $("input[name='date_to']");
  date_start.change(function(){
    date_finish.attr("min",$(this).val());
  });
  $("#birthday").datepicker({
    maxDate: new Date()
  });
});
