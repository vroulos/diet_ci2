<?php 
/**
 * 
 */
class Calendar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('calendar');
		
	}

	public function show(){

	$prefs = array(
        'start_day'    => 'saturday',
        'month_type'   => 'long',
        'day_type'     => 'short',
        'show_next_prev'  => TRUE,
        'next_prev_url'   => 'http://localhost/diet_ci2/index.php/calendar/show'
);

	$data = array('2' =>'http://localhost/diet_ci2/calendar/show/2006/6/2' , );


$this->load->library('calendar', $prefs);

//echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));


$data = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));

$this->load->view('dietitian/login/logind_view', $data, FALSE);


echo $this->calendar->generate(2006, 6, $data);

	}

	public function index() {
$data = array(
'year' => $this->uri->segment(3),
'month' => $this->uri->segment(4)
);

// Creating template for table
$prefs['template'] = '
{table_open}<table cellpadding="1" cellspacing="2">{/table_open}

{heading_row_start}<tr>{/heading_row_start}

{heading_previous_cell}<th class="prev_sign"><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
{heading_next_cell}<th class="next_sign"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

{heading_row_end}</tr>{/heading_row_end}

//Deciding where to week row start
{week_row_start}<tr class="week_name" >{/week_row_start}
//Deciding  week day cell and  week days
{week_day_cell}<td >{week_day}</td>{/week_day_cell}
//week row end
{week_row_end}</tr>{/week_row_end}

{cal_row_start}<tr>{/cal_row_start}
{cal_cell_start}<td>{/cal_cell_start}

{cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

{cal_cell_no_content}{day}{/cal_cell_no_content}
{cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

{cal_cell_blank}&nbsp;{/cal_cell_blank}

{cal_cell_end}</td>{/cal_cell_end}
{cal_row_end}</tr>{/cal_row_end}

{table_close}</table>{/table_close}
';

$prefs['day_type'] = 'short';
$prefs['show_next_prev'] = true;
$prefs['next_prev_url'] = 'http://localhost/diet_ci2/calendar/show';

// Loading calendar library and configuring table template
$this->load->library('calendar', $prefs);
// Load view page
$this->load->view('calendar_show', $data);
}


}

 ?>