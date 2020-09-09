<?php

namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class SideMenu extends Widget_Base
{

    public function get_name()
    {
        return 'two-level-side-menu';
    }

    public function get_title()
    {
        return 'Two Level Side Menu';
    }

    public function get_icon()
    {
        return 'fa fa-font';
    }

    public function get_categories()
    {
        return ['basic'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'concert_title_first',
            [
                'label' => __('First Upcoming Concert Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Label', 'plugin-name'),
            ]
        );
        $this->add_control(
            'concert_description_first',
            [
                'label' => __('First Upcoming Concert Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Description', 'plugin-name'),
            ]
        );
        $this->add_control(
            'ticket_button_link_first',
            [
                'label' => __('First Ticket Button URL', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'plugin-domain'),
                'default' => [
                    'url' => '',
                ]
            ]
        );
        $this->add_control(
            'concert_date_closest',
            [
                'label' => __('First Upcoming Concert Date', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
            ]
        );
        $this->add_control(
            'concert_title_second',
            [
                'label' => __('Second Upcoming Concert Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Label', 'plugin-name'),
            ]
        );
        $this->add_control(
            'ticket_button_link_second',
            [
                'label' => __('Second Ticket Button URL', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'plugin-domain'),
                'default' => [
                    'url' => '',
                ]
            ]
        );
        $this->add_control(
            'concert_date_second',
            [
                'label' => __('Second Upcoming Concert Date', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
            ]
        );
        $this->add_control(
            'concert_title_third',
            [
                'label' => __('Third Upcoming Concert Title', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Label', 'plugin-name'),
            ]
        );
        $this->add_control(
            'concert_date_third',
            [
                'label' => __('Third Upcoming Concert Date', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
            ]
        );
        $this->add_control(
            'ticket_button_link_third',
            [
                'label' => __('Third Ticket Button URL', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'plugin-domain'),
                'default' => [
                    'url' => '',
                ]
            ]
        );


        // $this->add_control(
        // 	'button_link',
        // 	[
        // 		'label' => __( 'Button url', 'plugin-domain' ),
        // 		'type' => \Elementor\Controls_Manager::URL,
        // 		'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
        // 		'default' => [
        // 			'url' => '',
        // 		]
        // 	]
        // );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $concert_date_exploded_first = explode("-", $settings['concert_date_closest']);
        $concert_date_exploded_second = explode("-", $settings['concert_date_second']);
        $concert_date_exploded_third = explode("-", $settings['concert_date_third']);

        function getDateMonthString($raw_date)
        {
            switch ($raw_date):
                case "01":
                    return "Jan";
                case "02":
                    return "Feb";
                case "03":
                    return "Mar";
                case "04":
                    return "Apr";
                case "05":
                    return "May";
                case "06":
                    return "Jun";
                case "07":
                    return "Jul";
                case "08":
                    return "Aug";
                case "09":
                    return "Sep";
                case "10":
                    return "Oct";
                case "11":
                    return "Nov";
                case "12":
                    return "Dec";
                default:
                    echo "Error with concert month";
            endswitch;
        }

        function getDateDayStringRaw($raw_date)
        {
            return $raw_date[2];
        }

        function getDateMonth($raw_date)
        {
            return $raw_date[1];
        }

        function getDateDayString($raw_date)
        {
            return substr($raw_date, 0, 2);
        }

        $first_date_month_raw = getDateMonth($concert_date_exploded_first);
        $second_date_month_raw = getDateMonth($concert_date_exploded_second);
        $third_date_month_raw = getDateMonth($concert_date_exploded_third);

        $first_date_day_raw = getDateDayStringRaw($concert_date_exploded_first);
        $second_date_day_raw = getDateDayStringRaw($concert_date_exploded_second);
        $third_date_day_raw = getDateDayStringRaw($concert_date_exploded_third);


        // Final, processed & usable data for bottom sticky nav
        $first_date_month = getDateMonthString($first_date_month_raw);
        $second_date_month = getDateMonthString($second_date_month_raw);
        $third_date_month = getDateMonthString($third_date_month_raw);

        $first_date_day = getDateDayString($first_date_day_raw);
        $second_date_day = getDateDayString($second_date_day_raw);
        $third_date_day = getDateDayString($third_date_day_raw);

?>


        <div id="menu-container">

            <!-- menu-wrapper -->
            <ul class="menu-list accordion">
                <li id="nav0" class="">
                    <a class="menu-link" href="/"><span class="menu-link-no-accordion">Home</span></a>
                </li>
                <li id="nav1" class="toggle accordion-toggle">
                    <span class="icon-plus"></span>
                    <a class="menu-link" href="/tickets-events/">Tickets & Events</a>
                    <i class="fas fa-arrow-down"></i>
                </li>
                <!-- accordion-toggle -->
                <ul class="menu-submenu accordion-content">
                    <li><a class="head" href="/current-season">2020-21 Season</a></li>
                    <li><a class="head" href="/tickets-events/event-tickets">Event Tickets</a></li>
                    <li><a class="head" href="#">Season Tickets</a></li>
                    <li><a class="head" href="#">Calendar</a></li>
                    <li><a class="head" href="#">Streaming Service</a></li>
                </ul>
                <!-- menu-submenu accordon-content-->
                <li id="nav2" class="toggle accordion-toggle">
                    <a class="menu-link" href="/plan-your-visit">Plan Your Visit</a>
                    <i class="fas fa-arrow-down"></i>
                </li>
                <!-- accordion-toggle -->
                <ul class="menu-submenu accordion-content">
                    <li><a class="head" href="/plan-your-visit/plan-your-visit-before">Before You Get Here</a></li>
                    <li><a class="head" href="/plan-your-visit/plan-your-visit-getting">Getting Here</a></li>
                    <li><a class="head" href="/plan-your-visit/plan-your-visit-while">While You're Here (Symphony 101)</a></li>
                </ul>
                <!-- menu-submenu accordon-content-->
                <li id="nav3" class="toggle accordion-toggle">
                    <a class="menu-link" href="/community-outreach">Education / Community Engagement</a>
                    <i class="fas fa-arrow-down"></i>
                </li>
                <!-- accordion-toggle -->
                <ul class="menu-submenu accordion-content">
                    <li><a class="head" href="#">Donate</a></li>
                    <li><a class="head" href="#">Volunteer</a></li>
                    <li><a class="head" href="#">Education Outreach</a></li>
                    <li><a class="head" href="#">SCSO in the Community</a></li>
                </ul>
                <!-- menu-submenu accordon-content-->
                <li id="nav4" class="toggle accordion-toggle">
                    <a class="menu-link" href="/about-us">About Us</a>
                    <i class="fas fa-arrow-down"></i>
                </li>
                <!-- accordion-toggle -->
                <ul class="menu-submenu accordion-content">
                    <li><a class="head" href="/about-us/our-history">Our History</a></li>
                    <li><a class="head" href="/about-us/meet-the-music-director">Meet the Music Director</a></li>
                    <li><a class="head" href="#">Our Musicians</a></li>
                    <li><a class="head" href="#">Guest Artists</a></li>
                    <li><a class="head" href="#">Composer of the Year</a></li>
                    <li><a class="head" href="#">Staff</a></li>
                    <li><a class="head" href="/about-us/board-directors">Board of Directors</a></li>
                    <li><a class="head" href="#">Our Sponsors</a></li>
                    <li><a class="head" href="#">Auditions/Employment Opportunities</a></li>
                    <li><a class="head" href="#">Join Us</a></li>
                </ul>
                <!-- menu-submenu accordon-content-->
                <a class="menu-link" href="#">
                    <li id="nav5" class="">
                        <span class="menu-link-no-accordion">News & Media</span>
                    </li>
                </a>
                <a class="menu-link" href="#">
                    <li id="nav6" class="">
                        <span class="menu-link-no-accordion">Contact Us</span>
                    </li>
                </a>
                <a class="menu-link" href="/support-us">
                    <li id="nav7" class="">
                        <span class="menu-link-no-accordion">Support Us</span>
                    </li>
                </a>
            </ul>
            <div id="sticky-navbar">
                <a href="#"><i class="fal fa-play"></i></a>
                <a href="#"><i class="fal fa-search"></i></a>
                <div class="button-wrapper"><button onclick="window.location.href='/support-us'" class="donate-nav">Donate</button></div>
                <div class="button-wrapper"><button onclick="window.location.href='/tickets-events/event-tickets'" class="tickets-nav">Tickets</button></div>
                <div id="menu-wrapper-container">
                    <div id="menu-wrapper">
                        <span class="burger-title">MENU</span>
                        <span class="burger-title-on-click">CLOSE</span>
                        <div class="burger ten">
                            <span></span>
                            <span></span>
                        </div>
                        <!-- hamburger-menu -->
                    </div>
                </div>
            </div>
            <!-- menu-list accordion-->
            <div id="social-icons">
                <a href="https://www.facebook.com/SiouxCitySymphony/"><span>FACEBOOK</span><i class="fab fa-facebook-square"></i></a>
                <a href="https://www.instagram.com/siouxcitysymphony/"><span>INSTAGRAM</span><i class="fab fa-instagram"></i></a>
                <a href="https://twitter.com/siouxcitysymph?lang=en"><span>TWITTER</span><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <!-- menu-container -->


        <!-- Bottom sticky nav - upcoming three shows -->
        <div id="bottom-sticky-nav-container">
            <div class="bottom-sticky-nav-row">
                <div id="bottom-sticky-nav">
                    <div class="circle-date">
                        <span><?php echo $first_date_month; ?></span>
                        <h3><?php echo $first_date_day; ?></h3>
                    </div>
                </div>
                <div class="bottom-sticky-nav-row-main-text">
                    <h3><?php echo $settings['concert_title_first']; ?></h3>
                    <i id="transition-section-arrow" class="fas fa-arrow-up" aria-hidden="true"></i>
                </div>
            </div>
            <div class="accordion-bottom-nav">
                <p>
                    <?php echo $settings['concert_description_first']; ?>
                </p>
                <button onclick="window.location.href='<?php echo $settings['ticket_button_link_first']['url']; ?>'" id="first-bottom-button">Tickets<i id="ticket-button-arrow" class="fas fa-arrow-right" style="margin-left:7px;font-weight:100;" aria-hidden="true"></i></button>
            </div>

            <!-- --------------------------- -->

            <div class="bottom-sticky-nav-row">
                <div id="bottom-sticky-nav">
                    <div class="circle-date">
                        <span><?php echo $second_date_month; ?></span>
                        <h3><?php echo $second_date_day; ?></h3>
                    </div>
                </div>
                <div class="bottom-sticky-nav-row-main-text">
                    <h3><?php echo $settings['concert_title_second']; ?></h3>
                    <button onclick="window.location.href='<?php echo $settings['ticket_button_link_second']['url']; ?>'">Tickets<i id="ticket-button-arrow" class="fas fa-arrow-right" style="margin-left:7px;font-weight:100;" aria-hidden="true"></i></button>
                </div>
            </div>

            <!-- --------------------------- -->

            <div class="bottom-sticky-nav-row">
                <div id="bottom-sticky-nav">
                    <div class="circle-date">
                        <span><?php echo $third_date_month; ?></span>
                        <h3><?php echo $third_date_day; ?></h3>
                    </div>
                </div>
                <div class="bottom-sticky-nav-row-main-text">
                    <h3><?php echo $settings['concert_title_third']; ?></h3>
                    <button onclick="window.location.href='<?php echo $settings['ticket_button_link_third']['url']; ?>'">Tickets<i id="ticket-button-arrow" class="fas fa-arrow-right" style="margin-left:7px;font-weight:100;" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <!-- Bottom sticky nav - upcoming three shows -->

        <!-- Header Logo -->
        <a id="scso-header-logo" href="/"><img src="http://charming-zoo.flywheelsites.com/wp-content/uploads/2020/08/scso-logo-full-white.png" /></a>
        <!-- Header Logo -->


        <!-- \\ SIDE MENU -->

<?php

    }

    protected function _content_template()
    {
    }
}
