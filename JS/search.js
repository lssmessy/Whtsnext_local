$('button#search').on('click',function(){

var text=$('input#search_text').val();
if($.trim(text)!='')
{
	$.post('AJAX/name.php',{search_text:text}, function(data){
	$('div#result').show();
			$('div#result').text(data);
	});

}
});
$('button#clear').on('click',function(){
$('input#search_text').val('');

});

