$( "#datepicker" ).datepicker({
dateFormat:"dd/mm/yy",
changeMonth: true,
changeYear: true,
maxDate: 0,
yearRange: '1950:'+ new Date().getFullYear()
});
