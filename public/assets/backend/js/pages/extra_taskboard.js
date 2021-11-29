//[ Javascript]

$(function () {
    "use strict";
    
		// Make the dashboard widgets sortable Using jquery UI
		  $('.connectedSortable').sortable({
			placeholder         : 'sort-highlight',
			connectWith         : '.connectedSortable',
			handle              : '.box-header, .nav-tabs',
			forcePlaceholderSize: true,
			zIndex              : 999999
		  });
		  $('.connectedSortable .box-header, .connectedSortable .nav-tabs-custom').css('cursor', 'move');

		// jQuery UI sortable for the todo list
		  $('.todo-list').sortable({
			placeholder         : 'sort-highlight',
			handle              : '.handle',
			forcePlaceholderSize: true,
			zIndex              : 999999
		  });	

		/* The todo list plugin */
		  $('.todo-list').todoList({
			onCheck  : function () {
			  window.console.log($(this), 'The element has been checked');
			},
			onUnCheck: function () {
			  window.console.log($(this), 'The element has been unchecked');
			}
		  });
	
  }); // End of use strict