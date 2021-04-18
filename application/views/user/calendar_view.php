
<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />

<script src="https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js"></script>
<script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>
<script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>
<script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>

<div id="menu">
	<span id="menu-navi">
		<button type="button" id="todayButton" class="btn btn-default btn-sm move-today" data-action="move-today">Today</button>
		<button type="button" class="btn btn-default btn-sm move-day" data-action="move-prev">
			<i class="calendar-icon ic-arrow-line-left" data-action="move-prev">arrow left</i>
		</button>
		<button type="button" class="btn btn-default btn-sm move-day" data-action="move-next">
			<i class="calendar-icon ic-arrow-line-right" data-action="move-next">arrow right</i>
		</button>
	</span>
	<span id="renderRange" class="render-range"></span>
</div>


<div id="calendar" style="height: 800px;"></div>

<script type="text/javascript">
	document.getElementById("todayButton").addEventListener("click", showToday);
	var Calendar = tui.Calendar;
	var chooseCalendar;
	function showToday() {
		
		var calendarToday = new tui.Calendar('#calendar', {
    defaultView: 'day' // daily view option
});
		
	}


		calendar = new Calendar('#calendar', {
			defaultView: 'month',
			taskView: true,
			template: {
				monthDayname: function(dayname) {
					return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>';
				},
				monthMoreClose: function() {
					return '<i class="fa fa-close"></i>';
				},

				monthDayname: function(dayname) {
					return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>';
				},
				weekDayname: function(dayname) {
					return '<span class="calendar-week-dayname-name">' + dayname.dayName + '</span><br><span class="calendar-week-dayname-date">' + dayname.date + '</span>';
				},
			}
		});
	






	// calendar.createSchedules([
	// {
	// 	id: '1',
	// 	calendarId: '1',
	// 	title: 'my schedule',
	// 	category: 'time',
	// 	dueDateClass: '',
	// 	start: '2018-01-18T22:30:00+09:00',
	// 	end: '2018-01-19T02:30:00+09:00'
	// },
	// {
	// 	id: '2',
	// 	calendarId: '1',
	// 	title: 'second schedule',
	// 	category: 'time',
	// 	dueDateClass: '',
	// 	start: '2018-01-18T17:30:00+09:00',
	// 	end: '2018-01-19T17:31:00+09:00',
 //        isReadOnly: true    // schedule is read-only
 //    }
 //    ]);


// 	calendar.on('beforeCreateSchedule', function(event) {
// 		var startTime = event.start;
// 		var endTime = event.end;
// 		var isAllDay = event.isAllDay;
// 		var guide = event.guide;
// 		var triggerEventName = event.triggerEventName;
// 		var schedule;

// 		if (triggerEventName === 'click') {
//         // open writing simple schedule popup
//         //schedule = {...};
//         alert("one clik");
//     } else if (triggerEventName === 'dblclick') {
//         // open writing detail schedule popup
//        // schedule = {...};
//        alert("double clik");
//    }

//    calendar.createSchedules([schedule]);
// });

</script>


