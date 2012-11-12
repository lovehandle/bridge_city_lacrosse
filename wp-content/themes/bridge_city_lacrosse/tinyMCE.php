<?php

add_action('admin_head', 'add_custom_buttons');
function add_custom_buttons() { 
wp_print_scripts( 'quicktags'); ?>
		
<script type='text/javascript'>
	
		
		edButtons[edButtons.length] = new edButton('tws_quote',
		
			'Quote',
			'[quote] ',
			' [/quote] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_hr',
		
			'HR',
			'[hr] ',
			''
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_intro',
		
			'Intro Text',
			'[intro] ',
			'[/intro]'
		
		);
				
		edButtons[edButtons.length] = new edButton('tws_pullquoteleft',
		
			'Quote Left',
			'[pullquoteleft] ',
			'[/pullquoteleft]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_pullquoteright',
		
			'Quote Right',
			'[pullquoteright] ',
			'[/pullquoteright]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_alert_standard',
		
			'Alert Standard',
			'[alert_standard] ',
			'[/alert_standard]'
		
		);		
		
		edButtons[edButtons.length] = new edButton('tws_alert_green',
		
			'Alert Green',
			'[alert_green] ',
			'[/alert_green]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_alert_red',
		
			'Alert Red',
			'[alert_red] ',
			'[/alert_red]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_alert_blue',
		
			'Alert Blue',
			'[alert_blue] ',
			'[/alert_blue]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_alert_yellow',
		
			'Alert Yellow',
			'[alert_yellow] ',
			'[/alert_yellow]'
		
		);
		
		
		edButtons[edButtons.length] = new edButton('tws_highlight_text',
		
			'Highlight Text',
			'[highlight_text] ',
			'[/highlight_text]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_half_first',
		
			'1/2 First',
			'[one_half_first] ',
			'[/one_half_first]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_half',
		
			'1/2',
			'[one_half] ',
			'[/one_half]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_third_first',
		
			'1/3 First',
			'[one_third_first] ',
			'[/one_third_first]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_third',
		
			'1/3',
			'[one_third] ',
			'[/one_third]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_fourth_first',
		
			'1/4 First',
			'[one_fourth_first] ',
			'[/one_fourth_first]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_fourth',
		
			'1/4',
			'[one_fourth] ',
			'[/one_fourth]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_fifth_first',
		
			'1/5 First',
			'[one_fifth_first] ',
			'[/one_fifth_first]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_fifth',
		
			'1/5',
			'[one_fifth] ',
			'[/one_fifth]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_sixth_first',
		
			'1/6 First',
			'[one_sixth_first] ',
			'[/one_sixth_first]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_one_sixth',
		
			'1/6',
			'[one_sixth] ',
			'[/one_sixth]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_two_third_first',
		
			'2/3 First',
			'[two_third_first] ',
			'[/two_third_first]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_two_third',
		
			'2/3',
			'[two_third] ',
			'[/two_third]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_three_fourth_first',
		
			'3/4 First',
			'[three_fourth_first] ',
			'[/three_fourth_first]'
		
		);
				
		edButtons[edButtons.length] = new edButton('tws_three_fourth',
		
			'3/4',
			'[three_fourth] ',
			'[/three_fourth]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_two_fifth_first',
		
			'2/5 First',
			'[two_fifth_first] ',
			'[/two_fifth_first]'
		
		);
				
		edButtons[edButtons.length] = new edButton('tws_two_fifth',
		
			'2/5',
			'[two_fifth] ',
			'[/two_fifth]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_three_fifth_first',
		
			'3/5 First',
			'[three_fifth_first] ',
			'[/three_fifth_first]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_three_fifth',
		
			'3/5',
			'[three_fifth] ',
			'[/three_fifth]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_four_fifth_first',
		
			'4/5 First',
			'[four_fifth_first] ',
			'[/four_fifth_first]'
		
		);
			
		edButtons[edButtons.length] = new edButton('tws_four_fifth',
		
			'4/5',
			'[four_fifth] ',
			'[/four_fifth]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_button',
		
			'Active Btn',
			'[button] ',
			'[/button]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_map',
		
			'Active Map Btn',
			'[active_button_map link="#"] ',
			'[/active_button_map]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_mail',
		
			'Active Mail Btn',
			'[active_button_mail link="#"] ',
			'[/active_button_mail]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_drink',
		
			'Active Drink Btn',
			'[active_button_drink link="#"] ',
			'[/active_button_drink]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_book',
		
			'Active Book Btn',
			'[active_button_book link="#"] ',
			'[/active_button_book]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_ipod',
		
			'Active iPod Btn',
			'[active_button_ipod link="#"] ',
			'[/active_button_ipod]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_gallery',
		
			'Active Gallery Btn',
			'[active_button_gallery link="#"] ',
			'[/active_button_gallery]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_headphones',
		
			'Active Headphones Btn',
			'[active_button_headphones link="#"] ',
			'[/active_button_headphones]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_download',
		
			'Active Download Btn',
			'[active_button_download link="#"] ',
			'[/active_button_download]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_active_button_information',
		
			'Active Information Btn',
			'[active_button_information link="#"] ',
			'[/active_button_information]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_button_reverse',
		
			'Reverse Btn',
			'[button_reverse] ',
			'[/button_reverse]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_blue_button_map',
		
			'Reverse Map Btn',
			'[blue_button_map link="#"] ',
			'[/blue_button_map]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_reverse_button_mail',
		
			'Reverse Mail Btn',
			'[reverse_button_mail link="#"] ',
			'[/reverse_button_mail]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_reverse_button_drink',
		
			'Reverse Drink Btn',
			'[reverse_button_drink link="#"] ',
			'[/reverse_button_drink]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_reverse_button_book',
		
			'Reverse Book Btn',
			'[reverse_button_book link="#"] ',
			'[/reverse_button_book]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_reverse_button_ipod',
		
			'Reverse iPod Btn',
			'[reverse_button_ipod link="#"] ',
			'[/reverse_button_ipod]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_reverse_button_gallery',
		
			'Reverse Gallery Btn',
			'[reverse_button_gallery link="#"] ',
			'[/reverse_button_gallery]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_reverse_button_headphones',
		
			'Reverse Headphones Btn',
			'[reverse_button_headphones link="#"] ',
			'[/reverse_button_headphones]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_reverse_button_download',
		
			'Reverse Download Btn',
			'[reverse_button_download link="#"] ',
			'[/reverse_button_download]'
		
		);
		
		edButtons[edButtons.length] = new edButton('tws_reverse_button_information',
		
			'Reverse Information Btn',
			'[reverse_button_information link="#"] ',
			'[/reverse_button_information]'
		
		);
		

	</script>
<?php }	

?>