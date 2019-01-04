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
});
